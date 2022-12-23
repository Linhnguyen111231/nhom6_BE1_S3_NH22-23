<?php
    session_start();
	
require("config.php");
require("model/db.php");
require("model/product.php");
require("model/prototype.php");
require("model/manufacture.php");
require("model/cart.php");
$protype = new Protypes();
$product = new Product();
$manufacture = new Manufacture();
$cart = new Cart();
$products = $product->getAllProduct();
$protypes = $protype->getAllPrototype();
$manufactures = $manufacture->getAllManufacture();
$product10 = $product->get10Product();
$productFT = $product->getFeature();
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
	<link rel="stylesheet" href="./css/style3.css">
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
					<li <?php if (isset($_GET['id'])) {
						if ($_GET['id'] == 0) {
							# code...
							echo "class='active'";
						}
					} ?>><a class="category_id" href="#0">All Categories</a></li>
					<?php
					$id_ct = "";
					if (isset($_GET['id'])) {
						$id_ct = $_GET['id'];
					}
					foreach ($protypes as $key => $value) {
						if ($value['type_id'] == $id_ct) {
					?>
						<li class="active" ><a tabindex="<?=$_GET['id']?>" class="category_id" href="#<?=$value['type_id']?>"><?php echo $value['type_name'] ?></a></li>
					<?php
						}else{
							?>
							<li ><a class="category_id" href="#<?=$value['type_id']?>"><?php echo $value['type_name'] ?></a></li>

							<?php
						}

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
									<input type="checkbox" class="common_selector category" id="category-<?= $i ?>" value="<?= $value['type_id'] ?>">
									<label for="category-<?= $i ?>">
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
					<!-- Sau Price -->
					<!-- <div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number" value="0">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number" value="100000000">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div> -->
					<!-- aside Widget -->
					<div class="aside" style="display: none;">
						<div class="list-group">
							<h3 class="aside-title">Price</h3>
							<input type="hidden" id="hidden_minimun_price" value="0">
							<input type="hidden" id="hidden_maximun_price" value="100000000">
							<p id="price_show">1000-100000000</p>
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
									<input type="checkbox" class="common_selector brand" id="brand-<?= $i ?>" value="<?= $value['manu_id'] ?>">
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

					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">FEATURE</h3>
						<?php
							foreach ($productFT as $key => $value) {
								$checkct = false;
								foreach ($product10 as $key3 => $value3) {
									if ($value['feature'] = $value3['feature']) {
										$checkct = true;
										break;
									}
								}
									?>
									<div class="product-widget">
										<div class="product-img">
											<img src="./img/<?=$value['pro_image']?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category"><?=$value['type_name']?></p>
											<h3 class="product-name"><a href="product2.php?id=<?=$value['id']?>"><?=$value['name']?></a></h3>
											<h4 class="product-price"><?=($checkct == true)?$value['price']*0.7:$value['price']*0.85?> <del class="product-old-price"><?=$value['price']?></del></h4>
										</div>
									</div>
									<?php
								}
						?>
						

						
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
								Show:
								<select class="input-select">
									<option class="lmt" value="0">9</option>
									<option class="lmt" value="1">12</option>
								</select>
							</label>
						</div>
						<ul class="store-grid">
							<li class="active"><i class="fa fa-th"></i></li>
						</ul>
					</div>
					<!-- /store top filter -->

					<!-- store products -->
					<div class="row filter_data">
						<!-- product -->
							

						<!-- /product -->

					</div>
					<!-- /store products -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<span class="store-qty">Showing 20-100 products</span>
						<ul class="store-pagination">
							<li class="active"><a class="click-a " href="#">1</a></li>
							<li ><a class="click-a" href="#">2</a></li>
							<li ><a class="click-a" href="#">3</a></li>
							<li ><a class="click-a" href="#">4</a></li>
							<li ><a class="click-a" href="#">5</a></li>
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
								<li><a  href="#">About Us</a></li>
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
		<?php
			if (isset($_SESSION['user'])) {
				
				?>
<div class="chat-bar-collapsible">
        <button id="chat-button" type="button" class="collapsible">Chat with AD!
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
				<?php
			}
		?>
		<!-- bottom footer -->
		<div id="bottom-footer" class="section">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12 text-center">
						<ul class="footer-payments">
							<li><a  href="#"><i class="fa fa-cc-visa"></i></a></li>
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
    <script src="./js/chat.js"></script>

	<script>

		$(document).ready(function() {
            fetch_data_mess();
			var lm = 1;
			var category_id2 ="";
			var search ="";
			var lmt = 9;
			search = $('#search_pd').val();
			$('.category_id').each(function() {
				if ($(this).attr('tabindex')) {
					category_id2 = $(this).attr('href');
				}
			});
			filter_data()
			del();
			function del() {
				var action = 'fetch_data';
				var id = $('.delete').attr('title');
				$.ajax({
					url:'delete.php',
					method: "POST",
					data:{
						action:action,
						id:id
						
					},

					success: function (data) {
						$('.cart-list').html(data);
					}
				})
			}
			function filter_data() {
				var action = 'fetch_data';
				var category_id_t = category_id2[1];
				var price_min = $('#hidden_minimun_price').val();
				var price_max = $('#hidden_maximun_price').val();
				var brand = get_filter('brand');
				var category = get_filter('category');
				var limit = lm;
				var search_pd = search;
				var limit2 = lmt;
				$.ajax({
					url: 'show_product.php',
					method: "POST",
					data: {
						action: action,
						category_id_t:category_id_t,
						price_min: price_min,
						price_max: price_max,
						brand: brand,
						category: category,
						search_pd:search_pd,
						limit:limit,
						limit2:limit2
					},
					success: function(data) {
						$('.filter_data').html(data);
					}
				})
			}
			// .tenclass
			function get_filter(class_name) {
				var filter = [];
				$('.' + class_name + ':checked').each(function() {
					filter.push($(this).val());
				});
				return filter;
			}
			 $('.input-select').change(function(){
				lmt= $('.input-select .lmt:selected').text();
				filter_data();
			 });
			$('.common_selector').click(function() {
				lm=1;
				category_id2="";
				search="";
				filter_data();
			})
			$('.click-a').click(function () {
				lm = $(this).text();
				$(this).parent().addClass('active');
				$(this).parent().siblings().removeClass('active');
				
				filter_data();
			})
			$('.category_id').click(function () {
				lm=1;
				var category_id = $(this).attr('href');
				$('.click-a').parent().siblings().removeClass('active');
				$('.click-a').parent().first().addClass('active');
				$(this).parent().addClass('active'); 
				$(this).parent().siblings().removeClass('active');
				category_id2 = category_id.split('#');
				$('.breadcrumb-tree').html('<li><a href="index.php">Home</a></li>'+
				'<li class="active"><a href="#">'+$(this).text()+'</a></li>');
				filter_data();
			})
			$('.search-btn').click(function(){
				search = $('#search_pd').val();
				 filter_data();
			})
			$('.delete').click(function () {
				console.log($(this).attr('title'));
				del();
			})
			var messTemp = "";
        fetch_data_mess();

        function fetch_data_mess() {
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
            fetch_data_mess();
        });
		})
	</script>
</body>

</html>
