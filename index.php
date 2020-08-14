<?php include 'includes/session.php';?>
<?php
$output = '';

$conn = $pdo->open();

// $stmt = $conn->prepare("SELECT * FROM products ");
$stmt = $conn->prepare("SELECT * FROM products order by RAND() ");
$stmt->execute();
$slider = $conn->prepare("SELECT * FROM slider order by RAND() ");
$slider->execute();
// print_r($stmt);

include 'includes/header.php';
?>


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
        <!-- Slider Arae Start -->
        <div class="slider-area">
            <div class="slider-active-3 owl-carousel slider-hm8 owl-dot-style">
                <?php foreach ($slider as $row) {?>
                <!-- Slider Single Item Start -->
                <div class="slider-height-10 d-flex align-items-start justify-content-start bg-img"
                    style="background-image: url(<?='admin/images/' . $row['image']?>);">
                    <div class="container">
                        <div class="slider-content-16 slider-animated-1 text-left">
                            <h1 class="animated">
                                <?=$row['big_text']?><br />
                                <strong></strong>
                            </h1>
                            <p class="animated"><?=$row['small_text']?></p>
                            <a href="#" class="shop-btn animated">SHOP NOW</a>
                        </div>
                    </div>
                </div>
                <!-- Slider Single Item End -->
                <?php }?>

            </div>
        </div>
        <!-- Slider Arae End -->
        <br />
        <!-- Banner Area Start -->
        <div class="banner-3-area mt-30px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-res-xs-30 mb-res-sm-30">


                        <div class="banner-wrapper">
                            <a href="covid_products.html"><img src="img/Covid 19 Products (1).jpg" alt="" /></a>
                            <br /><br />
                            <h2 style="text-align:center;font-weight:bold">Covid-19 Products</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-res-xs-30 mb-res-sm-30">

                        <div class="banner-wrapper">
                            <a href="vehicles.html"><img src="img/E- Vehicles (1).jpg" alt="" /></a>
                            <br /><br />
                            <h2 style="text-align:center;font-weight:bold">E-Vehicles</h2>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                        <div class="banner-wrapper">
                            <a href="#"><img src="img/offers Zone.jpg" alt="" /></a>
                            <br />
                            <br />
                            <h2 style="text-align:center;font-weight:bold">Offers Zone</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->



        <!-- Banner Area Start -->
        <!--  <div class="banner-3-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-res-xs-30 mb-res-sm-30">
                            <div class="banner-wrapper">
                                <a href="shop-4-column.html"><img src="assets/images/banner-image/48.jpg" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="banner-wrapper">
                                <a href="shop-4-column.html"><img src="assets/images/banner-image/49.jpg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        <!-- Banner Area End -->


        <!-- Hot deal area Start -->
        <section class="hot-deal-area mt-30px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section Title -->
                        <div class="section-title">
                            <h2>Covid-19 Products</h2>
                        </div>
                        <!-- Section Title End-->
                    </div>
                </div>
                <div class="banner-inner-area d-flex">
                    <div class="banner-left">
                        <div class="banner-wrapper">
                            <a href="shop-4-column.html"><img src="images/Covid-19.jpg" alt="" /></a>
                        </div>
                    </div>
                    <!-- New Arrivals Area Start -->
                    <div class="banner-right">
                        <!-- New Product Slider Start -->
                        <div class="new-product-slider-2 owl-carousel owl-nav-style owl-nav-style-5">
                            <?php
$i = 0;
foreach ($stmt as $row) {
    $i++;
    if ($i == 10) {
        break;
    }

    ?>

                            <div class="product-inner-item">
                                <article class="list-product mb-30px">
                                    <div class="img-block">
                                        <a href="product.php?product=<?=$row['slug']?>" class="thumbnail">
                                            <img class="first-img" src="images/<?=$row['photo']?>" alt="" />
                                        </a>

                                    </div>
                                    <ul class="product-flag">
                                        <li class="new">New</li>
                                    </ul>
                                    <div class="product-decs text-center">
                                        <a class="inner-link" href="shop-4-column.html"><span>
                                                <?=$row['name']?></span></a>


                                        <div class="pricing-meta">
                                            <ul>
                                                <li class="current-price">₹<?=$row['price']?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="add-to-link-btn">
                                        <a href="#"> Add to cart</a>
                                    </div>
                                </article>
                            </div>
                            <?php
}
// echo $output;
// $pdo->close();
?>

                        </div>
                        <!-- Product Slider End -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Category Tab Area Start -->

        <!-- Banner Area 2 Start -->
        <div class="banner-area-2 mt-60px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-inner">
                            <a href="shop-4-column.html"><img src="images/Home Page banner.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area 2 End -->
        <!-- Hot deal area Start -->
        <section class="hot-deal-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section Title -->
                        <div class="section-title">
                            <h2>E-Vehicles</h2>
                        </div>
                        <!-- Section Title End-->
                    </div>
                </div>
                <div class="banner-inner-area d-flex">
                    <div class="banner-left">
                        <div class="banner-wrapper">
                            <a href="shop-4-column.html"><img src="images/E Vehicles1.jpg" alt="" /></a>
                        </div>
                    </div>
                    <!-- New Arrivals Area Start -->
                    <div class="banner-right">
                        <!-- New Product Slider Start -->
                        <div class="new-product-slider-2 owl-carousel owl-nav-style owl-nav-style-5">
                            <!-- Product Single Item -->

                            <?php
$i = 0;
foreach ($stmt as $row) {
    $i++;
    if ($i == 10) {
        break;
    }

    ?>


                            <div class="product-inner-item">
                                <article class="list-product mb-30px">
                                    <div class="img-block">
                                        <a href="product.php?product=<?=$row['slug']?>" class="thumbnail">
                                            <img class="first-img" src="images/<?=$row['photo']?>" alt="" />
                                        </a>

                                    </div>
                                    <ul class="product-flag">
                                        <li class="new">New</li>
                                    </ul>
                                    <div class="product-decs text-center">
                                        <a class="inner-link" href="product.php?product=<?=$row['slug']?>"><span>
                                                <?=$row['name']?></span></a>

                                        <div class="pricing-meta">
                                            <ul>
                                                <li class="current-price">₹<?=$row['price']?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="add-to-link-btn">
                                        <a href="#"> Add to cart</a>
                                    </div>
                                </article>
                            </div>
                            <?php
}
// echo $output;
// $pdo->close();
?>
                            <!-- Product Single Item -->

                        </div>
                        <!-- Product Slider End -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Hot Deal Area End -->
        <!-- Hot deal area Start -->
        <section class="hot-deal-area mt-30px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section Title -->
                        <div class="section-title">
                            <h2>Offers Zone</h2>
                        </div>
                        <!-- Section Title End-->
                    </div>
                </div>
                <div class="banner-inner-area d-flex">
                    <div class="banner-left">
                        <div class="banner-wrapper">
                            <a href="shop-4-column.html"><img src="images/Offers Zone.jpg" alt="" /></a>
                        </div>
                    </div>
                    <!-- New Arrivals Area Start -->
                    <div class="banner-right">
                        <!-- New Product Slider Start -->
                        <div class="new-product-slider-2 owl-carousel owl-nav-style owl-nav-style-5">
                            <?php
$i = 0;
foreach ($stmt as $row) {
    $i++;
    if ($i == 10) {
        break;
    }

    ?>

                            <div class="product-inner-item">
                                <article class="list-product mb-30px">
                                    <div class="img-block">
                                        <a href="product.php?product=<?=$row['slug']?>" class="thumbnail">
                                            <img class="first-img" src="images/<?=$row['photo']?>" alt="" />
                                        </a>

                                    </div>
                                    <ul class="product-flag">
                                        <li class="new">New</li>
                                    </ul>
                                    <div class="product-decs text-center">
                                        <a class="inner-link" href="shop-4-column.html"><span>
                                                <?=$row['name']?></span></a>


                                        <div class="pricing-meta">
                                            <ul>
                                                <li class="current-price">₹<?=$row['price']?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="add-to-link-btn">
                                        <a href="#"> Add to cart</a>
                                    </div>
                                </article>
                            </div>
                            <?php
}
// echo $output;
// $pdo->close();
?>

                        </div>
                        <!-- Product Slider End -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Hot Deal Area End -->
        <!-- Footer Area start -->
        <footer class="footer-area">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <!-- footer single wedget -->
                        <div class="col-md-6 col-lg-4">
                            <!-- footer logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="img/Logo.png" alt="" /></a>
                            </div>
                            <!-- footer logo -->
                            <div class="about-footer">
                                <p class="text-info"></p>
                                <div class="need-help">
                                    <p class="phone-info">
                                        NEED HELP?

                                        <span>
                                            <a href="tel:+91 99127-72635">(+91)99127-72635</a>
                                        </span>
                                    </p>
                                </div>
                                <div class="social-info">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="ion-social-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-youtube"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-google"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- footer single wedget -->
                        <div class="col-md-6 col-lg-2 mt-res-sx-30px mt-res-md-30px">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Information</h4>
                                <div class="footer-links">
                                    <ul>

                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="covid_products.html">Covid-19</a></li>
                                        <li><a href="vehicles.html">E-Vehicles</a></li>
                                        <li><a href="bp.html">Business Plan</a></li>
                                        <li><a href="referal.html">Referral Income</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- footer single wedget -->
                        <div class="col-md-6 col-lg-2 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Custom Links</h4>
                                <div class="footer-links">
                                    <ul>

                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="checkout.html">Chackout</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- footer single wedget -->
                        <div class="col-md-6 col-lg-4 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Newsletter</h4>
                                <div class="subscrib-text">
                                    <p></p>
                                </div>

                                <div id="mc_embed_signup" class="subscribe-form">
                                    <form id="mc-embedded-subscribe-form" class="validate" novalidate="" target="_blank"
                                        name="mc-embedded-subscribe-form" method="post"
                                        action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                        <div id="mc_embed_signup_scroll" class="mc-form">
                                            <input class="email" type="email" required=""
                                                placeholder="Enter your email here.." name="EMAIL" value="" />
                                            <div class="mc-news" aria-hidden="true"
                                                style="position: absolute; left: -5000px;">
                                                <input type="text" value="" tabindex="-1"
                                                    name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" />
                                            </div>
                                            <div class="clear">
                                                <input id="mc-embedded-subscribe" class="button" type="submit"
                                                    name="subscribe" value="Sign Up" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="img_app">
                                    <a href="#"><img src="assets/images/icons/app_store-2.png" alt="" /></a>
                                    <a href="#"><img src="assets/images/icons/google_play-2.png" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <!-- footer single wedget -->
                    </div>
                </div>
            </div>
            <!--  Footer Bottom Area start -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <p class="copy-text">Copyright © <a href="https://hasthemes.com/">
                                    CashbackMart</a>. All
                                Rights Reserved</p>
                        </div>
                        <div class="col-md-6 col-lg-8">
                            <img class="payment-img" src="assets/images/icons/payment.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <!--  Footer Bottom Area End-->
        </footer>
        <!--  Footer Area End -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="tab-content quickview-big-img">
                                <div id="pro-1" class="tab-pane fade show active">
                                    <img src="assets/images/product-image/medical/1.jpg" alt="" />
                                </div>
                                <div id="pro-2" class="tab-pane fade">
                                    <img src="assets/images/product-image/medical/2.jpg" alt="" />
                                </div>
                                <div id="pro-3" class="tab-pane fade">
                                    <img src="assets/images/product-image/medical/3.jpg" alt="" />
                                </div>
                                <div id="pro-4" class="tab-pane fade">
                                    <img src="assets/images/product-image/medical/4.jpg" alt="" />
                                </div>
                            </div>
                            <!-- Thumbnail Large Image End -->
                            <!-- Thumbnail Image End -->
                            <div class="quickview-wrap mt-15">
                                <div class="quickview-slide-active owl-carousel nav owl-nav-style owl-nav-style-2"
                                    role="tablist">
                                    <a class="active" data-toggle="tab" href="#pro-1"><img
                                            src="assets/images/product-image/medical/1.jpg" alt="" /></a>
                                    <a data-toggle="tab" href="#pro-2"><img
                                            src="assets/images/product-image/medical/2.jpg" alt="" /></a>
                                    <a data-toggle="tab" href="#pro-3"><img
                                            src="assets/images/product-image/medical/3.jpg" alt="" /></a>
                                    <a data-toggle="tab" href="#pro-4"><img
                                            src="assets/images/product-image/medical/4.jpg" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="product-details-content quickview-content">
                                <h2>Originals Kaval Windbr</h2>
                                <p class="reference">Reference:<span> demo_17</span></p>
                                <div class="pro-details-rating-wrap">
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <span class="read-review"><a class="reviews" href="#">Read reviews
                                            (1)</a></span>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor
                                    incidid ut labore
                                    et dolore magna aliqua. Ut enim ad minim venialo quis nostrud
                                    exercitation ullamco
                                </p>
                                <div class="pro-details-size-color">
                                    <div class="pro-details-color-wrap">
                                        <span>Color</span>
                                        <div class="pro-details-color-content">
                                            <ul>
                                                <li class="blue"></li>
                                                <li class="maroon active"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                    </div>
                                    <div class="pro-details-cart btn-hover">
                                        <a href="#"> + Add To Cart</a>
                                    </div>
                                </div>
                                <div class="pro-details-wish-com">
                                    <div class="pro-details-wishlist">
                                        <a href="#"><i class="ion-android-favorite-outline"></i>Add to
                                            wishlist</a>
                                    </div>
                                    <div class="pro-details-compare">
                                        <a href="#"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                                    </div>
                                </div>
                                <div class="pro-details-social-info">
                                    <span>Share</span>
                                    <div class="social-info">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="ion-social-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-google"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->



    <div id="id01" class="modal">
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
        <form class="modal-content animate" action="verify.php" method="post">
            <div class="imgcontainer">
                <h3 style="text-align:center">Login</h3>
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
            </div>
            <br />
            <br />
            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Username" name="email" required>

                <label for="psw"><b>Password</b></label>
                <span class="psw">Forgot <a href="#">password?</a></span>
                <input type="password" placeholder="Enter Password" name="password" required>
                <br /><br />
                <!-- <button type="submit" class="loginbutn">Login</button> -->
                <input type="submit" class="loginbutn" name="login" value="Login">
                <input type="checkbox" checked="checked" name="remember">
                Remember me
                <label>

                </label>
            </div>

            <div class="container">

            </div>
        </form>
    </div>

    <!-- Scripts to be loaded  -->
    <!-- JS
============================================ -->
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
    <!--====== Vendors js ======-->
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>

    <!-- Main Activation JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>