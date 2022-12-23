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
if (isset($_SESSION['user'])) {
    $out = "";
if (isset($_POST['action'])) {
    if (isset($_POST['id']) && $_SESSION['user']) {
        $cart->Del($_POST['id'],$_SESSION['user']);
    }
$_SESSION['tt'] = 0;

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
    $_SESSION['tt'] += $value['price'];
    $out .="
        <div class='product-widget'>
        <div class='product-widget'>
            <div class='product-img'>
                <img src='./img/".$value['pro_image']."' alt=''>
            </div>
            <div class='product-body'>
                <h3 class='product-name'><a href='product2.php?id=".$value['id']."'>".$exName."...</a></h3>
                <h4 class='product-price'><span class='qty'>x".$value['quantity']."</span>".$value['price']."</h4>
            </div>
            <button class='delete' title='".$value['id']."'><i class='fa fa-close'></i></button>
        </div>
        <?php
    }
    ";
    }
    echo $out;
}
}
