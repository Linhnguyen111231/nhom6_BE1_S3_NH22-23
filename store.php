<?php
require("config.php");
require("model/db.php");
require("model/product.php");
require("model/prototype.php");
require("model/manufacture.php");
$protype = new Protypes();
$product = new Product();
$manufacture = new Manufacture();
$products = $product->getAllProduct();
$protypes = $protype->getAllPrototype();
$manufactures = $manufacture->getAllManufacture();
$productMT = $product->getProductManuProType();
$product10 = $product->get10Product();
$v="";
if(isset($_GET['lm'])){
	$v = $_GET['lm'];
}
$r = 9;
$f = ($v-1)*10;
$productLM = $product->getLimit($f,$r);
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

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="./css/style2.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

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
					<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
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
								<img src="./img/logo.png" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form method="GET" action="">
								<select class="input-select" name="id">
									<option value="0">All Categories</option>
									<?php
									foreach ($protypes as $key => $value) {


									?>
										<option value="<?= $value['type_id'] ?>"><?= $value['type_name'] ?></option>
									<?php
									}
									?>
								</select>
								<input class="input" name="search" placeholder="Search here">
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
								<a href="#">
									<i class="fa fa-heart-o"></i>
									<span>Your Wishlist</span>
									<div class="qty">2</div>
								</a>
							</div>
							<!-- /Wishlist -->

							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>
									<div class="qty">3</div>
								</a>
								<div class="cart-dropdown">
									<div class="cart-list">
										<div class="product-widget">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
											</div>
											<button class="delete"><i class="fa fa-close"></i></button>
										</div>

										<div class="product-widget">
											<div class="product-img">
												<img src="./img/product02.png" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
											</div>
											<button class="delete"><i class="fa fa-close"></i></button>
										</div>
									</div>
									<div class="cart-summary">
										<small>3 Item(s) selected</small>
										<h5>SUBTOTAL: $2940.00</h5>
									</div>
									<div class="cart-btns">
										<a href="#">View Cart</a>
										<a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
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
						}?>><a href="store.php?lm=<?=$_GET['lm']?>&id=-1">>All Categories</a></li>
					<?php
					foreach ($protypes as $key => $value) {

					?>
						<li <?php if (isset($_GET['id'])&&isset($_GET['lm'])) {
							if ($_GET['id'] == $value['type_id']) {
								echo 'class="active"';
							}
						}?>><a href="store.php?lm=<?=$_GET['lm']?>&id=<?= $value['type_id'] ?>"><?= $value['type_name'] ?></a></li>

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
						<li><a href="index.php">Home</a></li>
						<?php
						if (isset($_GET['id'])) {
							foreach ($protypes as $key => $value) {

								if ($value['type_id'] == $_GET['id']) {
									$count = 0;
									foreach ($products as $key2 => $value2) {
										if ($_GET['id'] == $value2['type_id']) {
											$count++;
										}
									}
						?>

									<li class="active"><a href="#"><?= $value['type_name'] ?>(<?= $count ?> RESULTS)</a></li>
						<?php
								}
							}
						}
						?>

						<?php
						?>
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
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<form action="" method="get">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
								<?php

								$i = 0;
								foreach ($protype->getAllPrototype() as $key => $value) {
									$i++;
									$count = 0;
									foreach ($products as $key2 => $value2) {
										if ($value['type_id'] == $value2['type_id']) {
											$count++;
										}
										# code...
									}
								?>

									<div class="input-checkbox">
										<input type="checkbox" id="category-<?= $i ?>"name="category[]" value="<?= $value['type_id'] ?>"
										<?php if (isset($_GET['category']) && in_array( $value['type_id'],$_GET['category'])) echo 'checked="cheked"';?>>
										<label for="category-<?= $i ?>" >
											<span></span>
											<?= $value['type_name'] ?>
											<small>(<?= $count ?>)</small>
									</div>
									</label>
								<?php
								}
								?>

							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<div class="checkbox-filter">
								<?php
								$i = 0;
								foreach ($manufactures as $key => $value) {
									$count = 0;
									$i++;
									foreach ($products as $key2 => $value2) {
										if ($value['manu_id'] == $value2['manu_id']) {
											$count++;
										}
										# code...
									}
								?>
									<div class="input-checkbox">
										<input type="checkbox" id="brand-<?= $i ?>" name="brand[]" value="<?= $value['manu_id'] ?>"
										<?php if (isset($_GET['brand']) && in_array( $value['manu_id'],$_GET['brand'])) echo 'checked="cheked"';?>>
										<label for="brand-<?= $i ?>">
											<span></span>
											<?= $value['manu_name'] ?>
											<small>(<?= $count ?>)</small>
										</label>
									</div>
								<?php
								}
								?>
							</div>
						</div>
						<input type="submit" value="Gửi">
					</form>

					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Top selling</h3>
						<div class="product-widget">
							<div class="product-img">
								<img src="./img/product01.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
						</div>

						<div class="product-widget">
							<div class="product-img">
								<img src="./img/product02.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
						</div>

						<div class="product-widget">
							<div class="product-img">
								<img src="./img/product03.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->
				</div>

				<!-- /ASIDE -->

				<!-- STORE -->
				<div id="store" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="store-sort">
							<label>
								Sort By:
								<select class="input-select">
									<option value="0">Popular</option>
									<option value="1">Position</option>
								</select>
							</label>

							<label>
								Show:
								<select class="input-select">
									<option value="0">20</option>
									<option value="1">50</option>
								</select>
							</label>
						</div>
						<ul class="store-grid">
							<li class="active"><i class="fa fa-th"></i></li>
							<li><a href="#"><i class="fa fa-th-list"></i></a></li>
						</ul>
					</div>
					<!-- /store top filter -->

					<!-- store products -->
					<div class="row">
						<!-- product -->
						<?php
						$productLMID = null;
						if (isset($_GET['id'])) {
							if ($_GET['id'] > 0) {
								$productLMID = $product->getLimitID($f,$r,$_GET['id']);
							}else{
								$productLMID = $product->getLimit($f,$r);
	
							}
						}else{
							$arr = array();
							$cate= null;
							$brand2= null;
							if (isset($_GET['category'])) {
								$cate = $product->getLMCate($f,$r,$_GET['category']);
							}
							if (isset($_GET['brand'])) {
								$brand2 = $product->getLMBand($f,$r,$_GET['brand']);

							}
							if ($cate!= null) {
								foreach ($cate as $key => $value) {
									# code...
									array_push($arr,$value);
								}
							}
							if ($brand2!=null) {
								foreach ($brand2 as $keybr => $valuebr) {
									# code...
									array_push($arr,$valuebr);
								}
							}
							$productLMID = $arr;
						}
						$ctg = "";
						if (isset($_GET['id'])){
							$ctg = $_GET['id'];
						}
						foreach ($productLMID as $key => $value) {
						//foreach ($productMT as $key => $value) {
							
							if ( $ctg == $value['type_id']||$ctg ==-1 || isset($_GET['category']) || isset($_GET['brand'])) {
								?>
								<div class="col-md-4 col-xs-6">
							<div class="product">
								<div class="product-img">
									<img src="./img-be/<?=$value['pro_image']?>" alt="">
									<div class="product-label">
										<?php
										$checkNew = true;
										foreach ($product10 as $key4 => $value4) {
											if ($value4['id'] == $value['id'] && $value4['feature']==1) {
												$checkNew = false;
											}
										}
										if ($checkNew == false && $value['feature'] ==1) {
											# code...
											echo '<span class="sale">-30%</span>';
										 	echo  '<span class="new">NEW</span>';
										}else if ($value['feature'] == 1){
											echo '<span class="sale">-15%</span>';
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
										?>
										
									</div>
								</div>
								<div class="product-body">
									<p class="product-category"><?=$value['type_name']?></p>
									<h3 class="product-name"><a href="product2.php?id=<?=$value['id']?>"><?=$exName?>...</a></h3>
									<h4 class="product-price"><?= $checkNew == false ? number_format(($value['price'])*0.7):$value['feature'] == 1 ?number_format(($value['price'])*0.85): number_format($value['price'])?> <del class="product-old-price"><?=($value['feature']==1)? number_format($value['price']):""?></del></h4>
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
										<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
												view</span></button>
									</div>
								</div>
								<div class="add-to-cart">
									<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
										cart</button>
								</div>
							</div>
						</div>

								<?php
							}
								
						//}
						}
						?>
						
						<!-- /product -->

					</div>
					<!-- /store products -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<span class="store-qty">Showing 20-100 products</span>
						<ul class="store-pagination">
							<li <?= ($_GET['lm'] == 1) ? 'class="active"': ""?>><a href="store.php?lm=1&id=<?=$_GET['id']?>">1</a></li>
							<li <?= ($_GET['lm'] == 2) ? 'class="active"': ""?>><a href="store.php?lm=2&id=<?=$_GET['id']?>">2</a></li>
							<li <?= ($_GET['lm'] == 3) ? 'class="active"': ""?>><a href="store.php?lm=3&id=<?=$_GET['id']?>">3</a></li>
							<li <?= ($_GET['lm'] == 4) ? 'class="active"': ""?>><a href="store.php?lm=4&id=<?=$_GET['id']?>">4</a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
						</ul>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /STORE -->
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
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt ut.</p>
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

</body>

</html>