<?php
require("config.php");
require("model/db.php");
require("model/product.php");
require("model/user.php");
require("model/manufacture.php");
require("model/admin.php");
$manu = new Manufacture();
$product = new Product();
$productAll = $product->getAllProduct();
$user =  new User();
$userAll = $user->getAllUs();
$ad = new AD();
$uploadOk = 1;
$s = "";
if (isset($_GET['del'])) {
    if (count($product->getProductManu($_GET['del'])) == 0) {
        $manu->DelManu($_GET['del']);
    } else {
        $uploadOk = 0;
    }
}else{
    $checkName = false;
$id = '';
foreach ($manu->getAllManufacture() as $key => $value) {
    $id = $value['manu_id'];
    if ($value['manu_name'] == $_POST['name']) {
        $checkName = true;
        break;
    }
}

if (isset($_POST['submit']) && $_POST['submit'] == "Add New Brand") {

    if ($uploadOk == 1 && $checkName == false) {
        if (isset($_POST['name'])) {
            if ($_FILES['image']['name'] != "") {
                $check = false;
                $target_dir = "./img/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if ($check !== false) {
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";

                        $uploadOk = 0;
                    }
                }
                if (file_exists($target_file)) {
                    $s.= " Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["image"]["size"] > 1000000) {
                    $s.= " Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $s.= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
            if ($uploadOk == 1) {
                $manu->insertManu($id + 1, $_POST['name'], $_FILES['image']['name']);
            }
        }
    } else {
        $uploadOk = 0; 
    }
} else if (isset($_POST['submit']) && $_POST['submit'] == "Update Brand") {
    if (isset($_POST['name'])) {
        if ($_FILES['image']['name'] != "") {
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
        if ($uploadOk == 1) {
            $manu->updateManu($id, $_POST['name'], $_FILES['image']['name']);
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
                    <a href="management.php" class="button" id="s_button">OKAY</a>
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
                    <a href="management.php" class="button" id="e_button">TRY AGAIN</a>
                </form>
            </div>
        </div>

    <?php
    }
    ?>

    <script src="main.js"></script>
</body>

</html>