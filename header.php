<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
  
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
              <li class="nav-item">
                <a href="./admin.php?page=1" class="nav-link <?php if (isset($_GET['page'])) {
                  if ($_GET['page'] == 1) {
                    echo "active";
                  }
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Home Page</p>
                </a>
              </li>
              
         
              <li class="nav-item">
                <a href="./Browser.php?page=2" class="nav-link <?php if (isset($_GET['page'])) {
                  if ($_GET['page'] == 2) {
                    echo "active";
                  }
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Browser</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./ship_delete.php?page=3" class="nav-link <?php if (isset($_GET['page'])) {
                  if ($_GET['page'] == 3) {
                    echo "active";
                  }
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shiped</p>
                </a>
              </li>
        
          
              
              <li class="nav-item">
                <a href="./Allproduct.php?page=4" class="nav-link <?php if (isset($_GET['page'])) {
                  if ($_GET['page'] == 4) {
                    echo "active";
                  }
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./productaddADM.php?page=5" class="nav-link <?php if (isset($_GET['page'])) {
                  if ($_GET['page'] == 5) {
                    echo "active";
                  }
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Add</p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="./AllUser.php?page=6" class="nav-link <?php if (isset($_GET['page'])) {
                  if ($_GET['page'] == 6) {
                    echo "active";
                  }
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./management.php?page=7" class="nav-link <?php if (isset($_GET['page'])) {
                  if ($_GET['page'] == 7) {
                    echo "active";
                  }
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./category.php?page=8" class="nav-link <?php if (isset($_GET['page'])) {
                  if ($_GET['page'] == 8) {
                    echo "active";
                  }
                }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Management</p>
                </a>
              </li>
        </ul>
</body>
</html>