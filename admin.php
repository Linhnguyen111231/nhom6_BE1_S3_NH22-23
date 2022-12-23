<?php
session_start();
if (!isset($_SESSION['admin'])) {
    
    header('location: login.php');
}
    require("config.php");
    require("model/db.php");
    require("model/product.php");
    require("model/user.php");
    require("model/admin.php");
    require("model/cart.php");
    require("model/order.php");
    $product= new Product();
    $productAll = $product->getAllProduct();
    $user =  new User();
    $userAll= $user->getAllUs();
    $ad = new AD();
    $cart = new Cart();
    $order = new Order();
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Home Page 2</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">ADMIN</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                <?php
          include("header.php");
        ?>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Home Page</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Home Page</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fa-brands fa-product-hunt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">All product</span>
                                    <span class="info-box-number">
                                        <?php echo count($productAll); ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-check"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Products
                                         sold</span>
                                    <span class="info-box-number">
                                        <?=count($order->getAllPDB())?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">All User</span>
                                    <span class="info-box-number"><?=count($userAll)?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"> <i class="fa-solid fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">New Members</span>
                                    <span class="info-box-number"><?=count($user->getNewUs())?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <div class="col-md-8">
                            <!-- MAP & BOX PANE -->

                            <!-- /.card -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- DIRECT CHAT -->
                                    <div class="card direct-chat direct-chat-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Direct Chat</h3>

                                            <div class="card-tools">
                                                <span title="3 New Messages" class="badge badge-warning">3</span>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                                                    <i class="fas fa-comments"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <!-- Conversations are loaded here -->
                                            <div class="direct-chat-messages messo">
                                                <!-- Message. Default to the left -->
                                                <div class="direct-chat-msg">
                                                    <div class="direct-chat-infos clearfix">
                                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                                    </div>
                                                    <!-- /.direct-chat-infos -->
                                                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                                    <!-- /.direct-chat-img -->
                                                    <div class="direct-chat-text">
                                                        Is this template really for free? That's unbelievable!
                                                    </div>
                                                    <!-- /.direct-chat-text -->
                                                </div>
                                                <!-- /.direct-chat-msg -->

                                                <!-- Message to the right -->
                                                <div class="direct-chat-msg right">
                                                    <div class="direct-chat-infos clearfix">
                                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                                    </div>
                                                    <!-- /.direct-chat-infos -->
                                                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                                    <!-- /.direct-chat-img -->
                                                    <div class="direct-chat-text">
                                                        You better believe it!
                                                    </div>
                                                    <!-- /.direct-chat-text -->
                                                </div>
                                                <!-- /.direct-chat-msg -->

                                                <!-- Message. Default to the left -->
                                                <div class="direct-chat-msg">
                                                    <div class="direct-chat-infos clearfix">
                                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                        <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                                    </div>
                                                    <!-- /.direct-chat-infos -->
                                                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                                    <!-- /.direct-chat-img -->
                                                    <div class="direct-chat-text">
                                                        Working with AdminLTE on a great new app! Wanna join?
                                                    </div>
                                                    <!-- /.direct-chat-text -->
                                                </div>
                                                <!-- /.direct-chat-msg -->

                                                <!-- Message to the right -->
                                                <div class="direct-chat-msg right">
                                                    <div class="direct-chat-infos clearfix">
                                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                        <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                                    </div>
                                                    <!-- /.direct-chat-infos -->
                                                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                                    <!-- /.direct-chat-img -->
                                                    <div class="direct-chat-text">
                                                        I would love to.
                                                    </div>
                                                    <!-- /.direct-chat-text -->
                                                </div>
                                                <!-- /.direct-chat-msg -->

                                            </div>
                                            <!--/.direct-chat-messages-->

                                            <!-- Contacts are loaded here -->
                                            <div class="direct-chat-contacts">
                                                <ul class="contacts-list">
                                                   <?php
                                                        foreach ($ad->getMessUS() as $key => $value) {
                                                               
                                                            
                                                            ?>
                                                            
                                                             <li>
                                                        <a class="user_name" href="#<?=$value['user_name']?>">
                                                            <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">

                                                            <div class="contacts-list-info">
                                                                <span class="contacts-list-name">
                                                                    <?=$value['user_name']?>
                                                                    <small class="contacts-list-date float-right">2/28/2015</small>
                                                                </span>
                                                                <span class="contacts-list-msg"><?php 
                                                                $tempMessNew = $ad->getNewMSID($value['user_name']);
                                                                if ($tempMessNew[0]['messus']!='') {
                                                                    
                                                                    $tempMessNew2 = $tempMessNew[0]['messus'];
                                                                }else if($tempMessNew[0]['messad']!=''){
                                                                    $tempMessNew2 = $tempMessNew[0]['messad'];
                                                                    
                                                                }
                                                                echo $tempMessNew2;
                                                                
                                                                ?></span>
                                                            </div>
                                                            <!-- /.contacts-list-info -->
                                                        </a>
                                                    </li>
                                                            <?php
                                                        }
                                                   ?>
                                                   
                                                </ul>
                                                <!-- /.contacts-list -->
                                            </div>
                                            <!-- /.direct-chat-pane -->
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                                <div class="input-group">
                                                    <input type="text" name="message" placeholder="Type Message ..." class="form-control " id="mess_ad">
                                                    <span class="input-group-append">
                                                        <button  class="btn btn-warning send">Send</button>
                                                    </span>
                                                </div>
                                        </div>
                                        <!-- /.card-footer-->
                                    </div>
                                    <!--/.direct-chat -->
                                </div>
                                <!-- /.col -->

                                <div class="col-md-6">
                                    <!-- USERS LIST -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">All Members</h3>

                                            <div class="card-tools">
                                                <span class="badge badge-danger"><?=count($user->getAllUs()) ?> Members</span>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                      <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
                                            <ul class="users-list clearfix">
                                                <?php
                                                    foreach ($user->getAllUs() as $key => $value) {
                                                        if ($value['user_name']!=$value['admin']) {
                                                            
                                                        ?>
                                                            <li class="user">
                                                                <img src="dist/img/user1-128x128.jpg" alt="User Image">
                                                                <a class="users-list-name" href="#<?=$value['user_name']?>"><?=$value['user_name']?></a>
                                                                <span class="users-list-date">Today</span>
                                                            </li>
                                                        <?php
                                                        }
                                                    }
                                                ?>
                                                
                                            </ul>
                                            <!-- /.users-list -->
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer text-center">
                                            <a href="./AllUser.php">View Users Ordered</a>
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                    <!--/.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- TABLE: LATEST ORDERS -->
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title user_cd">Latest Orders</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <a href="#" class="btn btn-sm btn-info float-left pay">Place New Order</a>
                                    <a href="Browser.php" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-4">
                            <!-- Info Boxes Style 2 -->
                            <div class="info-box mb-3 bg-warning">
                                <span class="info-box-icon"> <i class="fa-solid fa-cart-shopping"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"> Products in cart</span>
                                    <span class="info-box-number"><?php
                                         $tem2 = 0;
                                         foreach ($cart->getAll() as $key => $value) {
                                             $tem2 += $value['quantity'];
                                         }
                                         echo $tem2;
                                    ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box mb-3 bg-success">
                                <span class="info-box-icon"><i class="far fa-heart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Mentions</span>
                                    <span class="info-box-number">92,050</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box mb-3 bg-danger">
                                <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">SP dang sale</span>
                                    <span class="info-box-number"><?php
                                         $tem2 = 0;
                                         foreach ($productAll as $key => $value) {
                                             $tem2 += $value['feature'];
                                         }
                                         echo $tem2;
                                    ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box mb-3 bg-info">
                                <span class="info-box-icon"><i class="far fa-comment"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Direct Messages</span>
                                    <span class="info-box-number"><?php
                                        echo count($ad->getMessUS());
                                    ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->

                            
                            <!-- /.card -->

                            <!-- PRODUCT LIST -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">10 Products News</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                        <?php
                                            foreach ($product->get10Product() as $key => $value) {
                                                ?>
                                                <li class="item">
                                            <div class="product-img">
                                                <img src="./img/<?=$value['pro_image']?>" alt="Product Image" class="img-size-50">
                                            </div>
                                            <div class="product-info">
                                                <a href="./Viewproduct.php?id=<?=$value['id']?>" class="product-title"><?=$value['type_name']?>
                                                    <span class="badge badge-warning float-right"><?=$value['sale_price']?></span></a>
                                                <span class="product-description">
                                                <?=$value['name']?>
                                                </span>
                                            </div>
                                        </li>
                                                <?php
                                            }
                                        ?>
                                        
                                        <!-- /.item -->
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <a href="Allproduct.php" class="uppercase">View All Products</a>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>
        <?php
    if (isset($_GET['user_name'])) {
        ?>
        <div class="temp"><?=$_GET['user_name']?></div>
        <?php
    }
    ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="./plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="./plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="./plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="./dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="./dist/js/pages/dashboard2.js"></script>
    <script>
        var temp = "";
        var user = $('.temp').text();
        
        setInterval(() => {
            data();

        }, 50);
        function data() {
            
            var mess = temp;
            var user_name=user;
            var action = "fetch_data";
            $.ajax({
                url: "mess_ad.php",
                method: "POST",
                data:{
                    action:action,
                    mess:mess,
                    user_name:user_name
                },
                success: function(data) {
                    $('.direct-chat-messages').html(data);
				}
            })
            temp = "";
            
        }
        var link = ('./receipt.php?user_name='+user);
        setTimeout(() => {
        $('.pay').attr('href',link);
            
        }, 1000);
        function order_us() {
            var chat = $('.direct-chat-messages');
            var user_name=user;
            var action = "fetch_data";
            $.ajax({
                url: "user_order.php",
                method: "POST",
                data:{
                    action:action,
                    user_name:user_name
                },
                success: function(data) {
                    $('.table').html(data);
                    $('user_cd').text('Last order'+user);
                }
            })
            }
        $('.send').click(function () {
            temp = $('#mess_ad').val();
            if (temp!='') {
                
                data();
            }
        })
        $('.user_name').click(function () {
            temp='';
            user= $(this).attr('href').split('#')[1];
            data();
           


        })
        $('.users-list-name').click(function () {
            temp='';
            
            user= $(this).attr('href').split('#')[1];
            order_us();
            data();
            link = ('./receipt.php?user_name='+user);

            $('.pay').attr('href',link);
        })
    </script>

</body>

</html>
