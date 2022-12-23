<?php
session_start();
if (!isset($_SESSION['user'])) {
    
  header('location: login.php');
}
require "config.php";
require "model/db.php";
require "model/product.php";
require "model/prototype.php";
require "model/cart.php";
$product = new Product();
$protype = new Protypes();
$protypes = $protype->getAllPrototype();
$cart = new Cart();
if (isset($_GET['del'])) {
	$cart->Del($_GET['del'],$_SESSION['user']);
	header('location: black.php');
}
if (isset($_GET['id'])) {
	$_SESSION['qty'] = $_GET['qty'];
	$check = true;
	foreach ($cart->getAllCart($_SESSION['user']) as $key => $value) {
		if ($value['id'] == $_GET['id'] && $_SESSION['user'] == $value['user_name']) {

			$cart->updateCart($_GET['qty'] + $value['quantity'], $_GET['id'], $_SESSION['user']);
			$check = false;
			break;
		}
	}
	if ($check == true) {

		foreach ($product->getAllProduct($_SESSION['user']) as $key => $value) {
			if ($_GET['id'] == $value['id']) {
				$cart->insertCart($_SESSION['user'], $_GET['id'], $_GET['qty'], $value['price']);
				header('location: black.php');

			}
		}
	}
}
//xuat
$i = 0;
foreach ($cart->getAllCart($_SESSION['user']) as $key => $value) {
	if ($_SESSION['user'] == $value['user_name']) {
		$i++;
	}
}
$_SESSION['cart'] = $i;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - HTML Ecommerce Template</title>
	<link rel="stylesheet" href="./font-awesome-4.7.0/">
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/styleblack.css" />
	
	<link type="text/css" rel="stylesheet" href="css/style.css" />
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

	<!-- /BREADCRUMB -->

	<!-- SECTION -->
			<main class="page">
	 		<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
		          <h2>Shopping Cart</h2>
		          
		        </div>
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
				 				<?php
									$tt = 0;
									foreach ($cart->getAllCart($_SESSION['user']) as $key => $value) {
										$tt+=$value['price'];
										?>
										<div class="product">
				 					<div class="row fix_im">
					 					<div class="col-md-3">
					 						<img class="img-fluid mx-auto d-block image" src="../img/<?=$value['pro_image']?>">
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-4 product-name">
							 							<div class="product-name">
								 							<a href="product2.php?id=<?=$value['id']?>"><?=$value['name']?></a>
								 							
									 					</div>
							 						</div>
							 						<div class="col-md-3 quantity">
							 							<label for="quantity">Quantity:</label>
							 							<input id="quantity" type="number" value ="<?=$value['quantity']?>" class="form-control quantity-input">
							 						</div>
							 						<div class="col-md-5 price">
							 							<span style="font-size: 18px;"><?=number_format($value['price']*$value['quantity'])?> VND</span>
														<div class="del"><a href="black.php?del=<?=$value['id']?>"><i class="fa-solid fa-trash-can"></i></a></div>
														
							 						</div>
													 <div class="col-md-5 price">
							 							<span style="font-size: 18px;">+</span>
							 							<span style="font-size: 18px;">-</span>
														
														
							 						</div>
							 					</div>
							 				</div>
					 					</div>
					 				</div>
				 				</div>
										<?php
									}
								?>
				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<h3>Summary</h3>
			 					<div class="summary-item"><span class="text">Subtotal</span><span class="price">
									<?php
										$tt=0;
										foreach ($cart->getAllCart($_SESSION['user']) as $key => $value) {
											$tt+=$value['total']*$value['quantity'];
										}
										echo number_format($tt);
									?>
								</span></div>
			 					<button type="button" class="btn btn-primary btn-lg btn-block"><a href="checkout.php">Checkout</a></button>
				 			</div>
			 			</div>
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>
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

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script>
		$('#quantity').click(function () {
			
		})
	</script>
</body>

</html>
<?php
	
?>