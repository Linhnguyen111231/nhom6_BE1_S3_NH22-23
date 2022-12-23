<?php
session_start();
require "config.php";
require "model/db.php";
require "model/odered.php";
require "model/cart.php";
require "model/user_address.php";
$cart = new Cart();
$userAD = new UserAddress();
$odered = new Odered();
$temp = "";
if (isset($_GET['order_notes'])) {
  $temp = $_GET['order_notes'];
}
$checkUS = false;
foreach ($userAD->getUsOrder() as $key => $value) {
  if ($_SESSION['user'] == $value['user_name']) {
    $checkUS = true;
    break;
  }
}
$uploadOk = 0;
if ($checkUS == false) {
  if (isset($_SESSION['user']) && isset($_GET['full_name']) && isset($_GET['tel']) && isset($_GET['address']) && isset($_GET['city']) && isset($_GET['country'])) {
    if ($_GET['full_name'] != "" && $_GET['tel'] != "" && $_GET['address'] != "" && $_GET['city'] != "" && $_GET['country'] != "") {
      $userAdd = new UserAddress();
      $userAdd->InsertUser($_SESSION['user'], $_GET['full_name'], $_GET['tel'], $_GET['address'], $_GET['city'], $_GET['country'], $temp);
      $uploadOk = 1;
    }
  }
}else {
  if (isset($_SESSION['user']) && isset($_GET['full_name']) && isset($_GET['tel']) && isset($_GET['address']) && isset($_GET['city']) && isset($_GET['country'])) {
    if ($_GET['full_name'] != "" && $_GET['tel'] != "" && $_GET['address'] != "" && $_GET['city'] != "" && $_GET['country'] != "") {
      $userAdd = new UserAddress();
      $userAdd->UpdateUS($_SESSION['user'], $_GET['full_name'], $_GET['tel'], $_GET['address'], $_GET['city'], $_GET['country'], $temp);
      $uploadOk = 1;
    }
  }
}
if ($uploadOk == 1) {
  foreach ($cart->getAllCart($_SESSION['user']) as $key => $value) {
    if ($_SESSION['user'] == $value['user_name']) {
      $odered->insertOder("a", $_SESSION['user'], $value['id'], $value['quantity'], $value['total']);
      $cart->Del($value['id'], $_SESSION['user']);
    }
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
          <a href="index.php" class="button" id="s_button">OKAY</a>
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
          <a href="checkout.php" class="button" id="e_button">TRY AGAIN</a>
        </form>
      </div>
    </div>

  <?php
  }
  ?>

  <script src="main.js"></script>
</body>

</html>