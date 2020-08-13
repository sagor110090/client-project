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
        <div class="container">
            <div class="register-box-body">
                <p class="login-box-msg"> Seller Register</p>

                <form action="signup.php" method="POST">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="firstname" placeholder="Firstname"
                            value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>"
                            required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="lastname" placeholder="Lastname"
                            value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email" placeholder="Email"
                            value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="repassword" placeholder="Retype password"
                            required>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i
                                    class="fa fa-pencil"></i> Sign Up</button>
                        </div>
                    </div>
                </form>
                <br>
                <a href="login.php">I already have a membership</a><br>
                <a href="index.php"><i class="fa fa-home"></i> Home</a>
            </div>
        </div>

    </div>

    <?php include 'includes/scripts.php'?>
</body>

</html>