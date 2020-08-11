<?php include 'includes/session.php';?>
<?php
$conn = $pdo->open();

$slug = $_GET['product'];

try {

    $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
    $stmt->execute(['slug' => $slug]);
    $product = $stmt->fetch();

} catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
}

//page view
$now = date('Y-m-d');
if ($product['date_view'] == $now) {
    $stmt = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
    $stmt->execute(['id' => $product['prodid']]);
} else {
    $stmt = $conn->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
    $stmt->execute(['id' => $product['prodid'], 'now' => $now]);
}

?>
<?php include 'includes/header.php';?>



<body class="home-12 home-20 home-medical">
    <!-- main layout start from here -->
    <!--====== PRELOADER PART START ======-->

    <!-- <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div> -->

    <!--====== PRELOADER PART ENDS ======-->
    <div id="main">
        <?php
include 'includes/navbar.php';
?>



        <div class="content-wrapper">
            <div class="container">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <img src="<?php echo (!empty($product['photo'])) ? 'images/' . $product['photo'] : 'images/noimage.jpg'; ?>"
                                        width="100%" class="zoom"
                                        data-magnify-src="images/large-<?php echo $product['photo']; ?>">
                                    <br><br>
                                    <form class="form-inline" id="productForm">
                                        <div class="form-group">
                                            <div class="input-group col-sm-5">

                                                <span class="input-group-btn">
                                                    <button type="button" id="minus"
                                                        class="btn btn-default btn-flat btn-lg"><i
                                                            class="fa fa-minus"></i></button>
                                                </span>
                                                <input type="text" name="quantity" id="quantity"
                                                    class="form-control input-lg" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" id="add"
                                                        class="btn btn-default btn-flat btn-lg"><i
                                                            class="fa fa-plus"></i>
                                                    </button>
                                                </span>
                                                <input type="hidden" value="<?php echo $product['prodid']; ?>"
                                                    name="id">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-lg btn-flat"><i
                                                    class="fa fa-shopping-cart"></i> Add to Cart</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <h1 class="page-header"><?php echo $product['prodname']; ?></h1>
                                    <h3><b>&#36; <?php echo number_format($product['price'], 2); ?></b></h3>
                                    <p><b>Category:</b> <a
                                            href="category.php?category=<?php echo $product['cat_slug']; ?>"><?php echo $product['catname']; ?></a>
                                    </p>
                                    <p><b>Description:</b></p>
                                    <p><?php echo $product['description']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        <?php $pdo->close();?>
    </div>


    <!--====== Vendors js ======-->
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>

    <!-- Main Activation JS -->
    <script src="assets/js/main.js"></script>
    <?php include 'includes/scripts.php';?>
    <script>
    $(function() {
        $('#add').click(function(e) {
            e.preventDefault();
            var quantity = $('#quantity').val();
            quantity++;
            $('#quantity').val(quantity);
        });
        $('#minus').click(function(e) {
            e.preventDefault();
            var quantity = $('#quantity').val();
            if (quantity > 1) {
                quantity--;
            }
            $('#quantity').val(quantity);
        });

    });
    </script>

    <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</body>

</html>