<?php include 'includes/header.php';?>
<?php include 'includes/navbar.php';?>
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "ecomm";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    die('Could not Connect My Sql:' . mysql_error());
}

if (isset($_POST['signup'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $now = date('Y-m-d');
    $sql = "INSERT INTO users (email, password, firstname, lastname, role, created_on) VALUES ('$email', '$password', '$firstname', '$lastname', 'user', '$now')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>


<body class="hold-transition register-page">
    <div class="register-box">
        <?php
if (isset($_SESSION['error'])) {
    echo "
          <div class='callout callout-danger text-center'>
            <p>" . $_SESSION['error'] . "</p>
          </div>
        ";
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "
          <div class='callout callout-success text-center'>
            <p>" . $_SESSION['success'] . "</p>
          </div>
        ";
    unset($_SESSION['success']);
}
?>

        <style>
        .feature-info-style-02 {
            background: #ffffff;
            padding: 35px;
            overflow: hidden;
            position: relative;
            -webkit-box-shadow: 5px 5px 24px 0px rgba(2, 45, 98, 0.1);
            box-shadow: 5px 5px 24px 0px rgba(2, 45, 98, 0.1);
            border-radius: 5px;
            cursor: pointer;
        }

        .feature-info-style-02 .feature-info-icon {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-bottom: 15px;
            position: inherit;
            top: 0;
        }

        .section-title {
            margin-bottom: 50px;
        }

        .section-title p {
            /*font-size: 18px;
        font-weight: 500; */
            margin-bottom: 0;
            line-height: 1.5;
            text-align: justify;
        }

        .space-pt {
            padding: 100px 0 0;
        }

        .ml-4,
        .mx-4 {
            margin-left: 1.5rem !important;
        }

        .bg-primary {
            background-color: #18610f !important;
        }



        .card-body {

            width: 60%;
        }

        .divider-text {
            position: relative;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .divider-text span {
            padding: 7px;
            font-size: 12px;
            position: relative;
            z-index: 2;
        }

        .divider-text:after {
            content: "";
            position: absolute;
            width: 100%;
            border-bottom: 1px solid #ddd;
            top: 55%;
            left: 0;
            z-index: 1;
        }

        .btn-facebook {
            background-color: #405D9D;
            color: #fff;
        }

        .btn-twitter {
            background-color: #42AEEC;
            color: #fff;
        }
        </style>
        <!-- Breadcrumb Area start -->

        <section class="section-padding bg-dark inner-header"
            style="background-image: url('images/Contact Us.jpg');height: 289px;">
            <div class="container">
                <div class="row">

                </div>
            </div>
        </section>

        <div class="card bg-light container">
            <article class="card-body mx-auto" style=" margin:40px 0px">
                <h4 class="card-title mt-3 text-center " style=" color:green">Create Seller Account</h4>
                <p class="text-center mb-3">Get started with your free account</p>
                <!--<p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>-->
                <form action="signup.php" method="POST">



                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input type="text" class="form-control" name="firstname" placeholder="Firstname"
                            value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>"
                            required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input type="text" class="form-control" name="lastname" placeholder="Lastname"
                            value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>" required>
                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input type="email" class="form-control" name="email" placeholder="Email"
                            value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                    </div> <!-- form-group// -->




                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input type="password" class="form-control" name="repassword" placeholder="Retype password"
                            required>
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i
                                class="fa fa-pencil"></i> Sign Up</button>
                    </div> <!-- form-group// -->
                    <p class="text-center">Have an account? <a href="">Log In</a> </p>
                </form>
            </article>
        </div> <!-- card.// -->
    </div>

    <?php include 'includes/scripts.php'?>
</body>

</html>