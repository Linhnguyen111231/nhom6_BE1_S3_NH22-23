<?php
session_start();
if (!isset($_SESSION['user'])) {
    
  header('location: login.php');
}
require 'config.php';
require 'model/db.php';
require "model/user_address.php";
require "model/cart.php";
require "model/user.php";
require "model/prototype.php";
$cart=new Cart();
$user = new User();
$userAD = new UserAddress();
$pr = new Protypes();
$protypes = $pr->getAllPrototype();
$userID = $userAD->getUsOrderID($_SESSION['user']);
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
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		 <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">

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
					<li><a href="index.php">Home</a></li>
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

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
        <form action="order-success.php" method="get">
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">

						<div class="col-md-7">
							<!-- Billing Details -->
							
								<div class="billing-details">
								<div class="section-title">
									<h3 class="title">Billing address</h3>
								</div>
								<div class="form-group">
									<input class="input" type="text" name="full_name" value="<?=(count($userID))? (($userID[0]['fullName']!="")?$userID[0]['fullName']:"") : ""?>" placeholder="Full Name">
								</div>
								
								<div class="form-group">
									<input class="input" type="tel" name="tel"  value="<?=(count($userID))? (($userID[0]['phone']!="")?$userID[0]['phone']:"") : ""?>" placeholder="Telephone">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="address"  value="<?=(count($userID))? (($userID[0]['address']!="")?$userID[0]['address']:"") : ""?>" placeholder="Address">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="city" value="<?=(count($userID))? (($userID[0]['city']!="")?$userID[0]['city']:"") : "" ?>" placeholder="District">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="country" value="<?=(count($userID))? (($userID[0]['country']!="")?$userID[0]['country']:"") : "" ?>"  placeholder="City">
									<!-- /Billing Details -->
									
								</div>
								<!-- Order notes -->
								<div class="order-notes">
									<textarea name="order_notes" class="input" value="<?=(count($userID))? (($userID[0]['order_notes']!="")?$userID[0]['order_notes']:"") : ""?>" placeholder="Order Notes"></textarea>
								</div>
								</div>
								
							<!-- /Order notes -->
						</div>

						<!-- Order Details -->
						<div class="col-md-5 order-details">
							<div class="section-title text-center">
								<h3 class="title">Your Order</h3>
							</div>
							<div class="order-summary">
								<div class="order-col">
									<div><strong>PRODUCT</strong></div>
									<div><strong>TOTAL</strong></div>
								</div>
								<div class="order-products">
											<?php
											foreach ($cart->getAllCart($_SESSION['user']) as $key => $value) {
												if ($_SESSION['user']==$value['user_name']) {
													?>
													<div class="order-col">
													<div><?=$value['quantity']?>x<?=$value['name']?></div>
													<div><?=number_format($value['total']*$value['quantity'])?></div>
													</div>
													<?php
												}
											}
											?> 
									
								</div>
								<div class="order-col">
									<div>Shiping</div>
									<div><strong>FREE</strong></div>
								</div>
								<div class="order-col">
									<div><strong>TOTAL</strong></div>
									<div><strong class="order-total">
										<?php
											$temp=0;
											foreach ($cart->getAllCart($_SESSION['user']) as $key => $value) {
												if ($_SESSION['user']==$value['user_name']) {
													$temp+=$value['total']*$value['quantity'];
												}
											}
											echo number_format($temp);
										?> VND
									</strong></div>
								</div>
							</div>
							<button type="submit" class="primary-btn btn order-submit">Order</button>
						</div>
						<!-- /Order Details -->
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
        </form>
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
