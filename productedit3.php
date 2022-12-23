<?php
require("config.php");
require("model/db.php");
require("model/product.php");
require("model/user.php");
require("model/admin.php");
$product = new Product();
$productAll = $product->getAllProduct();
$user =  new User();
$userAll = $user->getAllUs();
$ad = new AD();
$uploadOk = 1;
if ($_FILES['image']['name']!="") {
  if (isset($_FILES['image']['name'])) {
    $check = false;
    $target_dir = "./img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
  
        $uploadOk = 0;
      }
    }
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
  
    // Check file size
    if ($_FILES["image"]["size"] > 1000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
  
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }
}
if ($_FILES['image2']['name']!="") {
  if (isset($_FILES['image2']['name'])) {
    $check = false;
    $target_dir = "./img/";
    $target_file = $target_dir . basename($_FILES["image2"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image2"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
  
        $uploadOk = 0;
      }
    }
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
  
    // Check file size
    if ($_FILES["image2"]["size"] > 1000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
  
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["image2"]["name"])) . " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }
}
if ($_FILES['image3']['name']!="") {
  if (isset($_FILES['image3']['name'])) {
    $check = false;
    $target_dir = "./img/";
    $target_file = $target_dir . basename($_FILES["image3"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image3"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
  
        $uploadOk = 0;
      }
    }
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
  
    // Check file size
    if ($_FILES["image3"]["size"] > 1000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
  
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["image3"]["name"])) . " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }
}
if ($_FILES['image4']['name'] !="") {
  if (isset($_FILES['image4']['name'])) {
    $check = false;
    $target_dir = "./img/";
    $target_file = $target_dir . basename($_FILES["image4"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image4"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
  
        $uploadOk = 0;
      }
    }
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
  
    // Check file size
    if ($_FILES["image4"]["size"] > 1000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
  
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["image4"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["image4"]["name"])) . " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }
}

                    

$id = '';
foreach ($product->getAllProduct() as $key => $value) {
    $id= $value['id'];
  if ($value['name'] == $_POST['name']) {
      $check= true;
      break;
  }
}
//isset($_GET['name'])&& isset($_GET['brand']) &&isset($_GET['category']) && isset($_GET['price']) && isset($_GET['image'])&& isset($_GET['description']) && isset($_GET['feature'])
//$id+1,$_GET['name'],$_GET['brand'],$_GET['category'],$_GET['price'],$_GET['image'],$_GET['image2'],$_GET['image3'],$_GET['image4'],$_GET['description'],$_GET['detail'],$_GET['feature']
if ($uploadOk == 1) {
  if (isset($_POST['name']) && isset($_POST['brand']) && isset($_POST['category']) && isset($_POST['price']) && isset($_FILES['image']['name']) && isset($_POST['description']) && isset($_POST['feature'])) {
    $product->UpdatePD($_POST['check10'],$id,$_POST['name'],$_POST['brand'],$_POST['category'],$_POST['price'],$_FILES['image']['name'],$_FILES['image2']['name'],$_FILES['image3']['name'],$_FILES['image4']['name'],$_POST['description'],$_POST['detail'],$_POST['feature']);
  } else {
    $uploadOk = 0;
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' rel="stylesheet" />
  <link href="./ThanhCong/style.css" rel="stylesheet" />
  <title>popup2</title>
</head>

<body>
  <?php
  if ($uploadOk == 1) {

  ?>
    <div class="popup" id="success">
      <div class="popup-content">
        <div class="imgbox">
          <img src="./ThanhCong/checked.png" alt="" class="img">
        </div>
        <div class="title">
          <h3>Success!</h3>
        </div>
        <p class="para">Your account has been created successfully</p>
        <form action="">
          <a href="Allproduct.php" class="button" id="s_button">OKAY</a>
        </form>
      </div>
    </div>
  <?php
  } else {

  ?>
    <div class="popup" id="error">
      <div class="popup-content">
        <div class="imgbox">
          <img src="./ThanhCong/cancel.png" alt="" class="img">
        </div>
        <div class="title">
          <h3>Sorry :(</h3>
        </div>
        <p class="para">Something went wrong. Please try again!</p>
        <form action="">
          <a href="Allproduct.php" class="button" id="e_button">TRY AGAIN</a>
        </form>
      </div>
    </div>

  <?php
  }
  ?>

  <script src="main.js"></script>
</body>

</html>