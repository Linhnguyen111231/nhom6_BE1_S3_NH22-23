<?php
    require("config.php");
    require("model/db.php");
    require("model/product.php");
    require("model/admin.php");
    require("model/order.php");
    $product = new Product();
    $productAll = $product->getAllProduct();
    $ad = new AD();
    $order = new Order();
    $order->getDeletOrder($_GET['id'],$_GET['name']);
    header("location: ship_delete.php");
    