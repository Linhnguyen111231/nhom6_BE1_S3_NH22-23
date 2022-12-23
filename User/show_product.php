<?php
require("config.php");
require("model/db.php");
require("model/product.php");
require("model/prototype.php");
require("model/manufacture.php");
$product = new Product();
$product10 = $product->get10Product();

if (isset($_POST['action'])) {
    $query = "SELECT * FROM `products` INNER JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id` WHERE `product_status`=0";
    if (isset($_POST['category_id_t']) && $_POST['category_id_t'] !="") {
        if ($_POST['category_id_t'] != 0 && $_POST['category_id_t'] != "") {
            $query .= " AND `products`.`type_id` = " . $_POST['category_id_t'] . "";
        }else if($_POST['category_id_t'] != ""){
            $query .= "";
        }
    }else if (isset($_POST['search_pd']) && $_POST['search_pd'] != "") {
        if ($_POST['search_pd']!="") {
            # code...
            $query.=" AND `products`.`name` LIKE '%".$_POST['search_pd']."%' ";
        }
    } else {

        if (isset($_POST['price_min'], $_POST['price_max']) && !empty($_POST['price_min']) && !empty($_POST['price_max'])) {
            $query .= "`products`.`price` BETWEEN '" . $_POST['price_min'] . "' AND '" . $_POST['price_max'] . "'";
        }
        if (isset($_POST['brand'])) {
            $query .= "
            AND `products`.`manu_id` IN (" . implode(",", $_POST['brand']) . ")
            ";
        }
        if (isset($_POST['category'])) {
            $query .= "
            AND `products`.`type_id` IN (" . implode(",", $_POST['category']) . ")
            ";
        }
    }
    $query .= " LIMIT " . abs(($_POST['limit'] - 1)) * $_POST['limit2'] . ",".$_POST['limit2']."";
    $result = $product->gette($query);
    if ($result != null) {
        $output = "";
        foreach ($result as $key => $value) {
            $span1 = "";
            $span2 = "";
            $checkP = false;
            $output .= '<div class="col-md-4 col-xs-6">
            <div class="product">
                <div class="product-img">
                    <img src="../img/' . $value["pro_image"] . '" alt="">
                    <div class="product-label">';
            foreach ($product10 as $key10 => $value10) {
                if ($value10['id'] == $value['id'] & $value10['feature'] == 1) {
                    $checkP = true;
                }
            }
            if ($value['feature'] == 1 && $checkP == true) {
                $span1 = '<span class="sale">-30%</span>
                <span class="new">NEW</span>';
            } else if ($value['feature'] == 1) {
                $span2 = '<span class="sale">-15%</span>';
            }
            $output .= $span1;
            $output .= $span2;
            $exName2 = "";
                                        for ($i=0; $i < strlen($value['name']); $i++) { 
                                            if ($i<35) {
                                                $exName2.=$value['name'][$i];
                                            }
                                        }
            $span3 = '</div><div class="product-body">
            <p class="product-category">' . $value['type_name'] . '</p>
            <h3 class="product-name"><a href="product2.php?id=' . $value['id'] . '">' . $exName2 . '...</a></h3>
            <h4 class="product-price">' . ((($checkP == false) ? number_format(($value['price']) * 0.85) : ($value['feature'] == 1)) ? number_format(($value['price']) * 0.7) : number_format($value['price'])) . ' <del class="product-old-price">' . (($value['feature'] == 1) ? number_format($value['price']) : "") . '</del></h4>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <div class="product-btns">
                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                        view</span></button>
            </div>
        </div>
        <div class="add-to-cart">
        <form action="black.php" method="get">
        <input type="text" name="id" value="'.$value['id'].'" style="display: none;">
        <input type="text" name="qty" value="1" style="display: none;">
        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
        </form>
        </div>
    </div>
    </div>
</div>';
            $output .= $span3;
        }
    } else {
        $output = "<h3>Không Có </h3>";
    }
    echo $output;
    
}
