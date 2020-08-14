<?php include 'includes/session.php';?>
<?php
$where = '';
if (isset($_GET['category'])) {
    $catid = $_GET['category'];
    $where = 'WHERE category_id =' . $catid;
}

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "ecomm";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    die('Could not Connect My Sql:' . mysql_error());
}

if (isset($_POST['save'])) {
    $big_text = $_POST['big_text'];
    $small_text = $_POST['small_text'];
    $image = $_FILES['image']['name'];
    $sql = "INSERT INTO slider (big_text, small_text, image) VALUES ('$big_text', '$small_text', '$image')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);

    $target = "images/" . basename($image);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }

}

?>
<?php include 'includes/header.php';?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php';?>
        <?php include 'includes/menubar.php';?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Slider
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Slider</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php
if (isset($_SESSION['error'])) {
    echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
    unset($_SESSION['success']);
}
?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <form action="slider.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="big_text">Big text</label>
                                    <input id="big_text" class="form-control" type="text" name="big_text">
                                </div>
                                <div class="form-group">
                                    <label for="small_text">Small text</label>
                                    <input id="small_text" class="form-control" type="text" name="small_text">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input id="image" class="form-control" type="file" name="image">
                                </div><button type='submit' name='save' class='btn btn-success'>Save</button>

                            </form>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <?php include 'includes/footer.php';?>

    </div>
    <!-- ./wrapper -->

    <?php include 'includes/scripts.php';?>
    <script>
    $(function() {
        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            $('#edit').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            $('#delete').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.photo', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.desc', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            getRow(id);
        });

        $('#select_category').change(function() {
            var val = $(this).val();
            if (val == 0) {
                window.location = 'products.php';
            } else {
                window.location = 'products.php?category=' + val;
            }
        });

        $('#addproduct').click(function(e) {
            e.preventDefault();
            getCategory();
        });

        $("#addnew").on("hidden.bs.modal", function() {
            $('.append_items').remove();
        });

        $("#edit").on("hidden.bs.modal", function() {
            $('.append_items').remove();
        });

    });

    function getRow(id) {
        $.ajax({
            type: 'POST',
            url: 'products_row.php',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $('#desc').html(response.description);
                $('.name').html(response.prodname);
                $('.prodid').val(response.prodid);
                $('#edit_name').val(response.prodname);
                $('#catselected').val(response.category_id).html(response.catname);
                $('#edit_price').val(response.price);
                CKEDITOR.instances["editor2"].setData(response.description);
                getCategory();
            }
        });
    }

    function getCategory() {
        $.ajax({
            type: 'POST',
            url: 'category_fetch.php',
            dataType: 'json',
            success: function(response) {
                $('#category').append(response);
                $('#edit_category').append(response);
            }
        });
    }
    </script>
</body>

</html>