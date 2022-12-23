<?php
session_start();
require("config.php");
require("model/db.php");
require("model/prototype.php");
require("model/user.php");
require("model/admin.php");
$ad0 = new AD();
$user = new User();
$uploadOk = 1;
$checktk = false;

if (isset($_POST['username']) && isset($_POST['passwo'])) {
  
  if ($ad0->checkLoginAD($_POST['username'], $_POST['passwo']) == true) {
    $_SESSION['admin'] = $_POST['username'];
    header('location: admin.php');
  }
  
  if ($user->checkLogin($_POST['username'], $_POST['passwo']) == true) {
    $_SESSION['user'] = $_POST['username'];
    header('location: index.php');
  } else {
    $uploadOk = 0;
  }
}
if (isset($_POST['un']) && isset($_POST['pw'])) {
  if ($_POST['pw'] != $_POST['pw2']) {
    header('location: register.php');
  }
  $usall = $user->getAllUs();
  $userid = 0;
  if ($usall != null) {
    foreach ($usall as $key => $value) {
      if ($value['user_name'] == $_POST['un']) {
        $checktk = true;
      }
    }
  }
  if ($checktk == false) {
    $user->InsertUser($_POST['un'], $_POST['pw']);
    echo "<h3>Bạn Đã Đăng Kí Thành Công Vui Lòng Đăng Nhập Để Khám Phá Nha</h3>";
  } else {
    $uploadOk = 0;
    $checktk = false;
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
          <a href="login.php" class="button" id="s_button">OKAY</a>
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
          <a href="login.php" class="button" id="e_button">TRY AGAIN</a>
        </form>
      </div>
    </div>

  <?php
  }
  ?>

  <script src="main.js"></script>
</body>

</html>
