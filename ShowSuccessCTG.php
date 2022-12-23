<?php
require("config.php");
require("model/db.php");
require("model/product.php");
require("model/user.php");
require("model/manufacture.php");
require("model/admin.php");
require("model/prototype.php");
$manu = new Manufacture();
$product = new Product();
$productAll = $product->getAllProduct();
$user =  new User();
$userAll = $user->getAllUs();
$ad = new AD();
$protype = new Protypes();

$uploadOk = 1;

if (isset($_GET['del'])) {
    if (count($product->getProductManuProType($_GET['del'])) == 0) {
        $protype->DelCTG($_GET['del']);
    } else {
        $uploadOk = 0;
    }
} else {
    $checkName = false;
    $id = '';
    foreach ($protype->getAllPrototype() as $key => $value) {
        $id = $value['type_id'];
        if ($value['type_name'] == $_POST['name']) {
            $checkName = true;
            break;
        }
    }

    if (isset($_POST['submit']) && $_POST['submit'] == "Add New Category") {


        if ($uploadOk == 1) {
            $protype->insertCTG($id + 1, $_POST['name']);
        } else {
            $uploadOk = 0;
        }
    } else if (isset($_POST['submit']) && $_POST['submit'] == "Update Category") {
        if (isset($_POST['name'])) {
            if ($uploadOk == 1) {
                $protype->updateCTG($id, $_POST['name']);
            }
        } else {
            $uploadOk = 0;
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
                <p class="para">Successful implementation</p>
                <form action="">
                    <a href="category.php" class="button" id="s_button">OKAY</a>
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
                    <a href="category.php" class="button" id="e_button">TRY AGAIN</a>
                </form>
            </div>
        </div>

    <?php
    }
    ?>

    <script src="main.js"></script>
</body>

</html>