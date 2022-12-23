<?php
session_start();

require("config.php");
require("model/db.php");
require("model/prototype.php");
require("model/product.php");
require("model/cart.php");
$protype = new Protypes();
$protypes = $protype->getAllPrototype();
$product = new Product();
$cart = new Cart();
$products = $product->get10Product();
$allProducts = $product->getAllProduct();
$i = 0;
if (isset($_SESSION['user'])) {
    foreach ($cart->getAllCart($_SESSION['user']) as $key => $value) {
        if ($_SESSION['user'] == $value['user_name']) {
            $i++;
        }
    }
    $_SESSION['cart'] = $i;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="./css/style3.css">

    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/chat2.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        .heart_red {
            color: red;
        }
        .header-search form .input {
	width: calc(100% - 105px);
	margin-right: -4px;
    border-radius: 40px 0px 0px 40px;
  }
    </style>

</head>

<body>
    <!-- HEADER -->
   <?php
		require("headerUS.php");
        
   ?>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="store.php?id=0">All Categories</a></li>
                    <?php
                    foreach ($protypes as $key => $value) {

                    ?>
                        <li><a href="store.php?id=<?= $value['type_id'] ?>"><?= $value['type_name'] ?></a></li>

                    <?php
                    }
                    ?>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="./img/lenovo-ideapad-3-15iau7-i3-82rk005lvn-2-1.jpg" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Laptop<br>Collection</h3>
                            <a href="store.php?lm=1&id=2" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="./img/iphone-14-pro-tim-4.jpg" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Smart Phone<br>Collection</h3>
                            <a href="store.php?lm=1&id=1" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="./img/bluetooth-airpods-max-apple-1-org.jpg" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Tai Nghe<br>Collection</h3>
                            <a href="store.php?lm=1&id=4" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                        <?php require('productadd.php') ?>

                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    <?php
                                    $temp = "";
                                    foreach ($products as $key => $value) {
                                        foreach ($protypes as $key2 => $value2) {
                                            if ($value['type_id'] == $value2['type_id']) {
                                                $temp = $value2['type_name'];
                                            }
                                        }
                                        $exName = "";
                                        for ($i=0; $i < strlen($value['name']); $i++) { 
                                            if ($i<35) {
                                                $exName.=$value['name'][$i];
                                            }
                                        }
                                        if ($value['feature'] == 1) {

                                    ?>
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="./img/<?= $value['pro_image'] ?>" alt="">
                                                    <div class="product-label">
                                                        <span class="sale">-30%</span>
                                                        <span class="new">NEW</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?= $temp ?></p>
                                                    <h3 class="product-name"><a href="product2.php?id=<?= $value['id'] ?>"><?= $exName ?> ...</a></h3>
                                                    <h4 class="product-price"><?= number_format(($value['price'] * 0.7)) ?> <del class="product-old-price"><?= number_format($value['price']) ?></del></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="add-to-wishlist 
                                                        <?php if ($value['like_pd'] == 1) {
                                                            echo "heart_red";
                                                        } ?>"><i class="fa fa-heart-o heart_red"></i><span class="tooltipp">add to wishlist</span></button>
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                        <button class="quick-view"><a href="product2.php?id=<?= $value['id'] ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <form action="black.php" method="get">
                                                    <input type="text" name="id" value="<?= $value['id'] ?>" style="display: none;">
                                                    <input type="text" name="qty" value="<?= 1 ?>" style="display: none;">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>

                                    <!-- /product -->
                                </div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top selling</h3>
                        <?php require('productadd.php') ?>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    <!-- product -->
                                    <?php
                                    $temp2 = "";
                                    foreach ($allProducts as $key => $value) {
                                        $check = true;
                                        foreach ($products as $key2 => $value2) {
                                            if ($value['name'] == $value2['name']) {
                                                $check = false;

                                                break;
                                            }
                                        }
                                        foreach ($protypes as $key3 => $value3) {
                                            if ($value['type_id'] == $value3['type_id']) {
                                                $temp2 = $value3['type_name'];
                                            }
                                        }
                                        $exName = "";
                                        for ($i=0; $i < strlen($value['name']); $i++) { 
                                            if ($i<35) {
                                                $exName.=$value['name'][$i];
                                            }
                                        }
                                        if ($check == false && $value['feature'] == 1) {
                                    ?>
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="./img/<?= $value['pro_image'] ?>" alt="">
                                                    <div class="product-label">
                                                        <span class="sale">-30%</span>
                                                        <span class="new">NEW</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?= $temp2 ?></p>
                                                    <h3 class="product-name"><a href="product2.php?id=<?= $value['id'] ?>"><?= $exName ?> ...</a></h3>
                                                    <h4 class="product-price"><?= number_format(($value['price'] * 0.7)) ?><del class="product-old-price"><?= number_format($value['price']) ?></del></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="add-to-wishlist "><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                <form action="black.php" method="get">
                                                    <input type="text" name="id" value="<?= $value['id'] ?>" style="display: none;">
                                                    <input type="text" name="qty" value="<?= 1 ?>" style="display: none;">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php
                                        } else if ($check == true && $value['feature'] == 1) {
                                        ?>
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="./img/<?= $value['pro_image'] ?>" alt="">
                                                    <div class="product-label">
                                                        <span class="sale">-15%</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?= $temp2 ?></p>

                                                    <h3 class="product-name"><a href="product2.php?id=<?= $value['id'] ?>"><?= $exName ?>...</a></h3>
                                                    <h4 class="product-price"><?= number_format(($value['price'] * 0.85)) ?><del class="product-old-price"><?= number_format($value['price']) ?></del></h4>
                                                    <div class="product-rating">
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="add-to-wishlist "><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                <form action="black.php" method="get">
                                                    <input type="text" name="id" value="<?= $value['id'] ?>" style="display: none;">
                                                    <input type="text" name="qty" value="<?= 1 ?>" style="display: none;">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>

                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Discount 30%</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                    <?php
                        $pr30 = $product->getSale30();
                        for ($i = 0; $i < count($pr30); $i += 3) {
                        ?>
                            <div>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="./img/<?=$pr30[$i]['pro_image']?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?=$pr30[$i]['type_name']?></p>
                                        <h3 class="product-name"><a href="product2.php?id=<?=$pr30[$i]['id']?>"><?=$pr30[$i]['name']?></a></h3>
                                        <h4 class="product-price"><?=number_format($pr30[$i]['sale_price'])?> VND  </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                                <?php
if ($i+1<count($pr30)) {
    ?>
    <div class="product-widget">
                                    <div class="product-img">
                                        <img src="./img/<?=$pr30[$i+1]['pro_image']?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?=$pr30[$i+1]['type_name']?></p>
                                        <h3 class="product-name"><a href="product2.php?id=<?=$pr30[$i+1]['id']?>"><?=$pr30[$i+1]['name']?></a></h3>
                                        <h4 class="product-price"><?=number_format($pr30[$i+1]['sale_price'])?> VND  </h4>
                                    </div>
                                </div>
    <?php
}

                                ?>
                                <!-- product widget -->
                                <?php
if ($i+2<count($pr30)) {
    ?>
        <div class="product-widget">
                                    <div class="product-img">
                                        <img src="./img/<?=$pr30[$i+2]['pro_image']?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?=$pr30[$i+2]['type_name']?></p>
                                        <h3 class="product-name"><a href="product2.php?id=<?=$pr30[$i+2]['id']?>"><?=$pr30[$i+2]['name']?></a></h3>
                                        <h4 class="product-price"><?=number_format($pr30[$i+2]['sale_price'])?> VND  </h4>
                                    </div>
                                </div>
    <?php
}
                                ?>
                            </div>

                            <?php
                        }
                            ?>

                        

                    </div>
                </div>

                <div class="col-md-6 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Discount 15%</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-4">
                    <?php
                        $pr15 = $product->getSale15();
                        for ($i = 0; $i < count($pr15); $i += 3) {
                        ?>
                            <div>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="./img/<?=$pr15[$i]['pro_image']?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?=$pr15[$i]['type_name']?></p>
                                        <h3 class="product-name"><a href="product2.php?id=<?=$pr15[$i]['id']?>"><?=$pr15[$i]['name']?></a></h3>
                                        <h4 class="product-price"><?=number_format($pr15[$i]['sale_price'])?> VND  </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                                <?php
                                    if ($i+1<count($pr15)) {
                                        ?>
                                        <div class="product-widget">
                                    <div class="product-img">
                                        <img src="./img/<?=$pr15[$i+1]['pro_image']?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?=$pr15[$i+1]['type_name']?></p>
                                        <h3 class="product-name"><a href="product2.php?id=<?=$pr15[$i+1]['id']?>"><?=$pr15[$i+1]['name']?></a></h3>
                                        <h4 class="product-price"><?=number_format($pr15[$i+1]['sale_price'])?> VND  </h4>
                                    </div>
                                </div>
                                        <?php
                                    }
                                ?>
                                <!-- product widget -->
                                <?php
                                    if ($i+2<count($pr15)) {
                                        ?>
    <div class="product-widget">
                                    <div class="product-img">
                                        <img src="./img/<?=$pr15[$i+2]['pro_image']?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?=$pr15[$i+2]['type_name']?></p>
                                        <h3 class="product-name"><a href="product2.php?id=<?=$pr15[$i+2]['id']?>"><?=$pr15[$i+2]['name']?></a></h3>
                                        <h4 class="product-price"><?=number_format($pr15[$i+2]['sale_price'])?> VND  </h4>
                                    </div>
                                </div>
                                        <?php
                                    }
                                ?>
                            </div>

                            <?php
                        }
                            ?>
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs"></div>



            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                <li><a href="#">Hot deals</a></li>
                                <li><a href="#">Laptops</a></li>
                                <li><a href="#">Smartphones</a></li>
                                <li><a href="#">Cameras</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Information</h3>
                            <ul class="footer-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Service</h3>
                            <ul class="footer-links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">View Cart</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->
    <div class="chat-bar-collapsible">
        <button id="chat-button" type="button" class="collapsible">Chat with us!
            <i id="chat-icon" style="color: #fff;" class="fa fa-fw fa-comments-o"></i>
        </button>

        <div class="content">
            <div class="full-chat-block">
                <!-- Message Container -->
                <div class="outer-container">
                    <div class="chat-container">
                        <!-- Messages -->
                        <div id="chatbox">
                            <!-- <h5 id="chat-timestamp"></h5> -->
                        </div>

                        <!-- User input box -->
                        <div class="chat-bar-input-block">
                            <div id="userInput">
                                <input id="textInput" class="input-box" type="text" name="msg" placeholder="Tap 'Enter' to send a message">
                                <p></p>
                            </div>

                            <div class="chat-bar-icons">
                                <i id="chat_icon1" style="color: crimson;" class="fa fa-fw fa-heart"></i>
                                <i id="chat_icon" style="color: #333;" class="fa fa-fw fa-send"></i>
                            </div>
                        </div>

                        <div id="chat-bar-bottom">
                            <p></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/chat.js"></script>
    <script>
        var messTemp = "";
        fetch_data();

        function fetch_data() {
            var action = "fetch_data";
            var mess = messTemp;
            $.ajax({
                url: 'Show_mess.php',
                method: 'POST',
                data: {
                    action: action,
                    mess: mess
                },
                success: function(data) {
                    $('#chatbox').html(data);
                }
            })
        }
        $('#chat_icon').click(function() {
            messTemp = $('#textInput').val();
            console.log(messTemp);
            fetch_data();
            $('#textInput').val("");
        });
    </script>

</body>

</html>