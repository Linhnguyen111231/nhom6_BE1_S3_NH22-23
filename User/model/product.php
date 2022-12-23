<?php
class Product extends Db
{
    public function gette($pr){
        $sql = self::$connection->prepare($pr);
        $sql->execute();
        $items=array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllProduct()
    {
        $sql = self::$connection->prepare("SELECT * FROM products");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllProductLM($f,$r)
    {
        $sql = self::$connection->prepare("SELECT * FROM products  LIMIT $f,$r");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function get10Product()
    {
        $sql = self::$connection->prepare("SELECT * FROM products INNER JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` ORDER BY id DESC LIMIT 10");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductManuProType($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id`
        INNER JOIN `protypes` ON `protypes`.`type_id` = `products`.`type_id` WHERE `products`.`type_id` = '$id'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductManu($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id`
        INNER JOIN `protypes` ON `protypes`.`type_id` = `products`.`type_id` WHERE `products`.`manu_id` = '$id'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
     public function getFeature()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` 
        INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id` WHERE `feature` = 1 LIMIT 5 ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function InsertPD($id,$name,$manu_id,$type_id,$price,$pro_image,$pro_image2,$pro_image3,$pro_image4,$description,$detail,$feature)
    {
        $gt_sale=0;
        if ($feature == 1) {
            $gt_sale = 30;
        }
        $sale_price = $price*((100-$gt_sale)/100);
        $sql = self::$connection->prepare("INSERT INTO `products` VALUES('$id','$name','$manu_id','$type_id','$price','$gt_sale','$sale_price','$pro_image','$pro_image2','$pro_image3','$pro_image4','$description','$detail','$feature','".date("Y-m-d H:i:s")."','0','0')");
        $sql->execute(); //return an object
    }
    public function getManuType()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` 
        INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id`");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductOrder($name)
    {
        $sql = self::$connection->prepare("SELECT * FROM `odered` INNER JOIN `products` ON `products`.`id` = `odered`.`id` WHERE `user_name` = '$name' AND `check_order` = 0");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function search($name, $f, $r)
    {
        
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` 
        INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id` WHERE `name` LIKE '%$name%' LIMIT $f,$r");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function searchKL($name)
    {
        
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` 
        INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id` WHERE `name` LIKE '%$name%'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function UpdatePD($check10,$id,$name,$manu_id,$type_id,$price,$pro_image,$pro_image2,$pro_image3,$pro_image4,$description,$detail,$feature)
    {
        
        $sql = "UPDATE `products` SET 
        `name` = '$name',
        ";
        if ($manu_id!='') {
            $sql.="
                `manu_id`= '$manu_id',
                ";
        }
        if ($type_id!='') {
            $sql.="
                `type_id`= '$type_id',
                ";
        }
        $sql.="`price` = '$price',";
        if ($pro_image!='') {
            $sql.="
                `pro_image`= '$pro_image',
                ";
        }
        if ($pro_image2!='') {
            $sql.="
                `pro_image2`= '$pro_image2',
                ";
        }
        if ($pro_image3!='') {
            $sql.="
                `pro_image3`= '$pro_image3',
                ";
        }
        if ($pro_image4!='') {
            $sql.="
                `pro_image4`= '$pro_image4',
                ";
        }
        $sql .= "`description` = '$description',";
        $sql .= "`detail` = '$detail',";
        if ($feature!='') {
            $sql.="
                `feature`= '$feature',
                ";
        }
        if ($feature == 0) {
            $sql .= "`gt_sale` = '0',";
        }
        if ($check10 == 1 && $feature == 1) {
            # code...
            $sql .= "`sale_price` = '".$price*((100-30)/100)."',";
        }else
        if ($feature == 1) {
            $sql .= "`sale_price` = '".$price*((100-15)/100)."',";

        }elseif ($feature ==0) {
            $sql .= "`sale_price` = '".$price."',";

        }
        $sql= substr($sql,0,-1);
        $sql.=" WHERE `id` = '$id'";
        $sql2 = self::$connection->prepare($sql);
        $sql2->execute(); //return an object
    }
    public function Del($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE `id` = $id");
        $sql->execute();
    }
    public function getSale30()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id`
        INNER JOIN `protypes` ON `protypes`.`type_id` = `products`.`type_id` WHERE `products`.`gt_sale` = '30'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getSale15()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id`
        INNER JOIN `protypes` ON `protypes`.`type_id` = `products`.`type_id` WHERE `products`.`gt_sale` = '15'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}

?>
