<?php
    session_start();
    require("config.php");
    require("model/db.php");
    require("model/prototype.php");
    require("model/product.php");
    require("model/cart.php");
    require("model/mess_us.php");
    $protype = new Protypes();
    $protypes = $protype->getAllPrototype();
    $product = new Product();
    $cart = new Cart();
    $messus = new MessUS();
    if ($_POST['mess']!="") {
        $messus->InsertMessUS($_SESSION['user'],$_POST['mess']);
    }
    $out = "";
    foreach ($messus->getMessUS() as $key => $value) {
        if ($_SESSION['user'] == $value['user_name']) {
            if ($value['messus']!='' && $_SESSION['user']==$value['user_name']) {
                $out.='<p class="userText"><span>';
            $out.=$value['messus'];
            $out.='</span></p>';
            }
            if ($value['messad']!='' && $_SESSION['user']==$value['user_name']) {
                $out.='<p class="botText"><span>' ;
                $out.=$value['messad'];
            $out.='</span></p>';
            }
        }
    }    
    echo $out;
?>
