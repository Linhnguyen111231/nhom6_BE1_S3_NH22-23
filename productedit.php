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
require("model/manufacture.php");
require("model/prototype.php");
$product= new Product();
$productAll = $product->getAllProduct();
$user =  new User();
$userAll= $user->getAllUs();
$ad = new AD();
$manu = new Manufacture();
$tye = new Protypes();
$value2 = "";
    if (isset($_GET['id'])) {
        $value2 = $_GET['id'];
    }else{
        $value2 = 1;
    }
    $r = 9;
    $f = ($value2-1)*$r;
    $productLM = $product->getAllProductLM($f,$r);
    
    if (isset($_GET['search'])) {
      if ($_GET['search']!='') {
        $productLM = $product->search($_GET['search'],$f,$r);

      }else {
    $productLM = $product->getAllProductLM($f,$r);
        
      }
    }
    if(count($productLM)>0){
      $st=1;
      $end = 6;
      $check = 3;
      if ($value2> $check) {
          $st = $value2 -3;
          $end = $value2 + 2;

      }
      if ($value2!=1) {
          $pr = $value2 - 1;
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Project Edit</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <style>
    .img_edit{
      width: 150px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./AllUser.php" class="nav-link">Contact</a>
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
          <form class="form-inline" method="GET" action="productedit.php">
            <div class="input-group input-group-sm">
              <input type="text" name='id' value='1'>
              <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">
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
              <img src="./dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
              <img src="./dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
              <img src="./dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
    <a href="./index3.html" class="brand-link">
      <img src="./dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <form action="productedit3.php" method="post" enctype="multipart/form-data">
    <section class="content">
      <div class="row ">
      <div class="col-md-12 edit_product">
          <?php
          $check10 = false;
          foreach ($product->get10Product() as $key => $value) {
            if ($value['id']==$_GET['id']) {
              $check10 = true;
              break;
            }
          }
          $teme=0;
          if ($check10 == true) {
            $teme=1;
          }else {
            $teme=0;
          }
          $out="";
          foreach ($product->getManuType() as $key => $value) {
              if ($_GET['id']== $value['id']) {
                  $out.="
<input type='text' name='check10' value='".$teme."' style='display: none;' >

                  <div class='card card-primary'>
                    <div class='card-header'>
                    <h3 class='card-title'>Product</h3>
                    
                    <div class='card-tools'>
                    <button type='button' class='btn btn-tool' data-card-widget='collapse' title='Collapse'>
                    <i class='fas fa-minus'></i>
                    </button>
                    </div>
                    </div>
                    <div class='card-body'>
                    <input type='text'  name='id' value='".$value['id']."' style='display:none'; >
                    <div class='form-group'>
                    <label for='inputName'>Product Name</label>
                    <input type='text' id='inputName' name='name' value='".$value['name']."' class='form-control' value='AdminLTE'>
                    </div>
                      <div class='form-group'>
                        <label for='inputName'>Main Price</label>
                        <input type='text' id='inputName'  name='price' value='".$value['price']."' class='form-control' value='AdminLTE'>
                      </div>
                      <div class='form-group'>
                        <label for='inputDescription'>Product Description</label>
                        <textarea id='inputDescription' name='description' class='form-control' rows='4'>".$value['description']."</textarea>
                      </div>
                      <div class='form-group'>
                        <label for='inputDescription'>Product Details</label>
                        <textarea id='inputDescription' name='detail' class='form-control' rows='4'>".$value['detail']."</textarea>
                      </div>
                      <div class='form-group'>
                        <label for='inputStatus'>Brand</label>
                        <select id='inputStatus' class='form-control custom-select' name='brand'>
                          
                          ";
                            foreach ($manu->getAllManufacture() as $keymanu => $valuemanu) {
                                if ($valuemanu['manu_id'] == $value['manu_id']) {
                                  $out .="<option selected value='".$valuemanu['manu_id']."'>".$valuemanu['manu_name']."</option>";
          
                                }else {
                                  # code...
                                  $out .="<option value='".$valuemanu['manu_id']."'>".$valuemanu['manu_name']."</option>";
                                }
          
                            }
                      
                            $out.="
                        </select>
                      </div>
                      <div class='form-group'>
                        <label for='inputStatus'>Feature</label>
                        <select id='inputStatus' class='form-control custom-select' name='feature'>
                          
                                ";
                                if ($value['feature'] == 1) {
                                    $out.="<option selected value='1'>Outstanding</option>";
                                  $out.="<option value='0'>Not Outstanding</option>";
                                }else {
                                  $out.="<option selected value='0'>Not Outstanding</option>";
                                  $out.="<option value='1'> Outstanding</option>";
                                  
                                }
                                $out.="
                        </select>
                      </div>
                      <div class='form-group'>
                        <label for='inputStatus'>Category</label>
                        <select id='inputStatus' class='form-control custom-select' name='category'>
                          <option value='-1' selected disabled>Select one</option>
                          ";
                          foreach ($tye->getAllPrototype() as $keytype => $valuetype) {
                              if ($valuetype['type_id'] == $value['type_id']) {
                                $out.="
          
                                <option selected value='".$valuetype['type_id']."'>".$valuetype['type_name']."</option>
                                  ";
          
                                }else {
                                  $out.="
          
                                <option  value='".$valuetype['type_id']."'>".$valuetype['type_name']."</option>
                                  ";
                                }
                              
                                  
                            }
                            $out.="
                        </select>
                      </div>
                      <div class='form-group'>
                        <label for='inputEstimatedBudget'>Image</label>
                        <input type='file' name='image' id='inputEstimatedBudget' class='form-control'>
                        <img class='img_edit' src='./img/".$value['pro_image']."' alt='img'>
                      
                        </div>
                      <div class='form-group'>
                        <label for='inputSpentBudget'>Image 2 details</label>
                        <input type='file' name='image2' id='inputEstimatedDuration' class='form-control'>
                        <img class='img_edit' src='./img/".$value['pro_image2']."' alt='img'>
                        
          
                      </div>
                      <div class='form-group'>
                        <label for='inputEstimatedDuration'>Image 3 details</label>
                        <input type='file' name='image3' id='inputEstimatedDuration' class='form-control'>
                        <img class='img_edit' src='./img/".$value['pro_image3']."' alt='img'>
                      
                        </div>
                      <div class='form-group'>
                        <label for='inputEstimatedDuration'>Image 4 details</label>
                        <input type='file' name='image4' id='inputEstimatedDuration' class='form-control'>
                        <img class='img_edit' src='./img/".$value['pro_image4']."' alt='img'>
                      
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                ";
              }
          }
          if ($_GET['id'] ==0) {
              $out.="
                  <div class='card card-primary'>
                    <div class='card-header'>
                      <h3 class='card-title'>Product</h3>
          
                      <div class='card-tools'>
                        <button type='button' class='btn btn-tool' data-card-widget='collapse' title='Collapse'>
                          <i class='fas fa-minus'></i>
                        </button>
                      </div>
                    </div>
                    <div class='card-body'>
                      <div class='form-group'>
                        <label for='inputName'>Product Name</label>
                        <input type='text' id='inputName' name='name' class='form-control' >
                      </div>
                      <div class='form-group'>
                        <label for='inputName'>Product Price</label>
                        <input type='text' id='inputName' name='price' class='form-control' >
                      </div>
                      <div class='form-group'>
                        <label for='inputDescription'>Product Description</label>
                        <textarea id='inputDescription' name='description' class='form-control' rows='4'></textarea>
                      </div>
                      <div class='form-group'>
                        <label for='inputDescription'>Product Details</label>
                        <textarea id='inputDescription' name='detail' class='form-control' rows='4'></textarea>
                      </div>
                      <div class='form-group'>
                        <label for='inputStatus'>Brand</label>
                        <select id='inputStatus' class='form-control custom-select' name='brand'>
                          <option value='-1' selected disabled>Select one</option>
                          ";
                            foreach ($manu->getAllManufacture() as $keymanu => $valuemanu) {
          
                                $out .="<option value='".$valuemanu['manu_id']."'>".$valuemanu['manu_name']."</option>";
          
                            }
                      
                            $out.="
                        </select>
                      </div>
                      <div class='form-group'>
                        <label for='inputStatus'>Feature</label>
                        <select id='inputStatus' class='form-control custom-select' name='feature'>
                          <option value='-1' selected disabled>Select one</option>
                                <option value='0'>Not outstanding</option>
                                <option value='1'>Outstanding</option>
                        </select>
                      </div>
                      <div class='form-group'>
                        <label for='inputStatus'>Category</label>
                        <select id='inputStatus' class='form-control custom-select' name='category'>
                          <option value='-1' selected disabled>Select one</option>
                          ";
                          foreach ($tye->getAllPrototype() as $keytype => $valuetype) {
                              
                              $out.="
                                <option value='".$valuetype['type_id']."'>".$valuetype['type_name']."</option>
                                  ";
                                  
                            }
                            $out.="
                        </select>
                      </div>
                      <div class='form-group'>
                        <label for='inputEstimatedBudget'>Image</label>
                        <input type='file' name='image' id='inputEstimatedBudget' class='form-control'>
                      </div>
                      <div class='form-group'>
                        <label for='inputSpentBudget'>Image 2 details</label>
                        <input type='file' name='image2' id='inputEstimatedDuration' class='form-control'>
          
                      </div>
                      <div class='form-group'>
                        <label for='inputEstimatedDuration'>Image 3 details</label>
                        <input type='file' name='image3' id='inputEstimatedDuration' class='form-control'>
                      </div>
                      <div class='form-group'>
                        <label for='inputEstimatedDuration'>Image 4 details</label>
                        <input type='file' name='image4' id='inputEstimatedDuration' class='form-control'>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                ";
          }
          echo $out;
          ?>
      </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Changes" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>

</body>
</html>
