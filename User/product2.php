<?php
	session_start();
	
	require "config.php";
	require "model/db.php";
	require "model/prototype.php";
	require "model/product.php";
	require "model/cart.php";
	$protype = new Protypes();
$protypes = $protype->getAllPrototype();
$product = new Product();
$cart = new Cart();
$products = $product->get10Product();
$getProductById=$product->getProductById($_GET['id']);
$allProducts = $product->getProductManuProType($getProductById[0]['type_id']);	
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
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
		 <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<style>
			.header-search form .input {
	width: calc(100% - 105px);
	margin-right: -4px;
  }
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
						<li><a href="#"><i class="fa fa-user-o"></i> <?=(isset($_SESSION['user']))?$_SESSION['user']:""?></a></li>
                    	<li><a href="login.php?id=0"> Logout</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="../img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form method="GET" action="store.php">
                                
                                <input class="input" name="search_pd" placeholder="Search here">
                                <button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
								<a href="ViewOrder.php">
									<i class="fa fa-heart-o"></i>
									<span>Order History</span>
								</a>
							</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>
									<div class="qty"><?= $_SESSION['cart'] ?></div>
								</a>
								<div class="cart-dropdown">
                                    <div class="cart-list">
                                        <?php
                                        
                                        $tt = 0;
                                            foreach ($cart->getAllCart($_SESSION['user']) as $key => $value) {
                                                $exName = "";
                                        for ($i=0; $i < strlen($value['name']); $i++) { 
                                            if ($i<35) {
                                                $exName.=$value['name'][$i];
                                            }
                                        }
                                                $tt += $value['price'];
                                                ?>
                                                
                                                <div class="product-widget">
                                                    <div class="product-img">
                                                        <img src="../img/<?=$value['pro_image']?>" alt="">
                                                    </div>
                                                    <div class="product-body">
                                                        <h3 class="product-name"><a href="product2.php?id=<?=$value['id']?>"><?=$exName?>...</a></h3>
                                                        <h4 class="product-price"><span class="qty">x<?=$value['quantity']?></span><?=$value['price']?></h4>
                                                    </div>
                                                    <button class="delete"><i class="fa fa-close"></i></button>
                                                </div>
                                                <?php
                                            }
                                        ?>

                                    </div>
                                    <div class="cart-summary">
                                        <small><?=count($cart->getAllCart($_SESSION['user']))?> Item(s) selected</small>
                                        <h5>SUBTOTAL: <?=$tt?></h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="black.php">View Cart</a>
                                        <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
							</div>
								</div>
								<!-- /Cart -->

								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
					<li <?php if (isset($_GET['id'])) {
							if ($_GET['id'] == 0) {
								echo 'class="active"';
							}
						}?>><a href="index.php">Home</a></li>
					<li <?php if (isset($_GET['id'])) {
							if ($_GET['id'] == -1) {
								echo 'class="active"';
							}
						}?>><a href="store.php?id=0">All Categories</a></li>
					<?php
					foreach ($protypes as $key => $value) {

					?>
						<li <?php if (isset($_GET['id'])) {
							if ($_GET['id'] == $value['type_id']) {
								echo 'class="active"';
							}
						}?>><a href="store.php?id=<?= $value['type_id'] ?>"><?= $value['type_name'] ?></a></li>

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

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Headphones</a></li>
							<li class="active">Product name goes here</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="../img/<?=$getProductById[0]['pro_image']?>" alt="">
							</div>

							<div class="product-preview">
								<img src="../img/<?=$getProductById[0]['pro_image2']?>" alt="">
							</div>

							<div class="product-preview">
								<img src="../img/<?=$getProductById[0]['pro_image3']?>" alt="">
							</div>

							<div class="product-preview">
								<img src="../img/<?=$getProductById[0]['pro_image4']?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="../img/<?=$getProductById[0]['pro_image']?>" alt="">
							</div>

							<div class="product-preview">
								<img src="../img/<?=$getProductById[0]['pro_image2']?>" alt="">
							</div>

							<div class="product-preview">
								<img src="../img/<?=$getProductById[0]['pro_image3']?>" alt="">
							</div>

							<div class="product-preview">
								<img src="../img/<?=$getProductById[0]['pro_image4']?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">
								<?php
									if (isset($_GET['id'])) {
										
										foreach ($getProductById as $key => $value) {
											echo $value['name'];
										}
									}
								?>
							</h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div>
								<h3 class="product-price"> 
								<?php
									echo number_format($getProductById[0]['sale_price']);
								?>
								<del class="product-old-price">
								</del></h3>
								<span class="product-available">In Stock</span>
							</div>
							<p>
								<?php
								 	echo $getProductById[0]['description'];
								?> 
							</p>

							

							<div class="add-to-cart">
								<form action="black.php" method="get">
									<div class="col-md-4 quantity">
							 							<label for="quantity">Quantity:</label>
							 							<input id="quantity" type="number" name="qty" value="1" class="form-control quantity-input">
														 
													</div>
												<input type="text" style="display: none;" name="id" value="<?=$getProductById[0]['id']?>">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
								</form>
							</div>

							

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">Headphones</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>
												<?php
													echo $getProductById['0']['description'];
												?>	
											</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
										<table>
											<tr>
												<th></th>
												<th>Describe</th>
											</tr>
											<?php
											$arr = explode("#",$getProductById[0]['detail']);
											$c = count($arr);
											$i = 0;
											if ($c!=0) {
												foreach ($arr as $key => $value) {
													if ($value!="") {
													$tem = explode(":", $value);
													?>
															<tr>
																<td><?=$tem[0]?></td>
																<td><?=$tem[1]?></td>
															</tr>
															<?php
													}
												}
												
											}
											?>
											
											
										</table>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Related Products</h3>
                        <?php require('productadd.php')?>
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
                                        $slName = explode(" ",$value['name']);
										$exName = "";
										$iname = 0;
										foreach ($slName as $keyname => $valuename) {
											$exName .= " ".$valuename;
											$iname++;
											if ($iname == 5) {
												break;
											}
										}
                                        if ($check == false && $value['feature'] == 1) {
                                            ?>
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="../img/<?= $value['pro_image'] ?>" alt="">
                                                    <div class="product-label">
                                                        <span class="sale">-30%</span>
                                                        <span class="new">NEW</span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?=$temp2?></p>
                                                    <h3 class="product-name"><a href="product2.php?id=<?=$value['id']?>"><?= $exName ?> ...</a></h3>
                                                    <h4 class="product-price"><?= number_format(($value['price'])) ?><del class="product-old-price"><?=  number_format($value['sale_price']) ?></del></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                                    
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        else if ($check == true && $value['feature'] == 1) {
                                        ?>
                                        <div class="product">
                                        <div class="product-img">
                                            <img src="../img/<?= $value['pro_image']?>" alt="">
                                            <div class="product-label">
                                                <span class="sale">-15%</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?=$temp2?></p>

                                            <h3 class="product-name"><a href="product2.php?id=<?=$value['id']?>"><?= $exName ?>...</a></h3>
                                                    <h4 class="product-price"><?= number_format(($value['price'])) ?><del class="product-old-price"><?=  number_format($value['sale_price']) ?></del></h4>
                                            <div class="product-rating">
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </div>
                                    </div>
                                        <?php
                                        }else{
											?>
											<div class="product">
                                        <div class="product-img">
                                            <img src="../img/<?= $value['pro_image']?>" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?=$temp2?></p>

                                            <h3 class="product-name"><a href="product2.php?id=<?=$value['id']?>"><?= $exName ?>...</a></h3>
                                                    <h4 class="product-price"><?= number_format(($value['price'] )) ?></h4>
                                            <div class="product-rating">
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
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
		<!-- /Section -->

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
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
