<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
					<?php
						if (isset($_SESSION['user'])) {
							
							?>
<li><a href="#"><i class="fa fa-user-o"></i> <?=$_SESSION['user']?></a></li>
<li><a href="login.php?id=0"> Logout</a></li>
							<?php
						}else {
?>
<li><a href="login.php?id=0"> Login</a></li>


							<?php
						}
					?>
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
							<form method="GET" action="#">
								<input class="input" id="search_pd" value="<?php if(isset($_GET['search_pd'])) { echo $_GET['search_pd'];}else{ echo "";}?>" placeholder="Search here">
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
                                    <i class="fa-brands fa-first-order-alt"></i>
									<span>Order History</span>
								</a>
							</div>
							<!-- /Wishlist -->

							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>
									<div class="qty"><?=(isset($_SESSION['user']))? $_SESSION['cart']:"" ?></div>
								</a>
								<div class="cart-dropdown">
                                    <div class="cart-list">
                                        <?php
                                        
                                        if (isset($_SESSION['user'])) {
											$tt = 0;
                                            foreach ($cart->getAllCart($_SESSION['user']) as $key => $value) {
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
										}
                                        ?>

                                    </div>
                                    <div class="cart-summary">
                                        <small><?=(isset($_SESSION['user']))? (count($cart->getAllCart($_SESSION['user']))):""?> Item(s) selected</small>
                                        <h5>SUBTOTAL: <?=(isset($_SESSION['user']))?$tt:""?></h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="black.php">View Cart</a>
                                        <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
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
</body>
</html>