<?php
class Product extends Db
{
    public function getAllProduct()
    {
        $sql = self::$connection->prepare("SELECT * FROM products");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function get10Product()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 10");
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
    public function getProductManuProType()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id`
        INNER JOIN `protypes` ON `protypes`.`type_id` = `products`.`type_id`");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getLimit($f,$r)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` LIMIT $f, $r");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getLimitID($f,$r,$id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` WHERE `products`.`type_id`= $id LIMIT $f, $r");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getLimitArrID($f,$r,$id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` WHERE `products`.`type_id` IN $id LIMIT $f, $r");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getLMBand($f,$r,$arr){
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id`
        INNER JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` WHERE `products`.`manu_id` IN (" . implode(",", $arr) .") LIMIT $f,$r");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getLMCate($f,$r,$arr){
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` WHERE `products`.`type_id` IN (" . implode(",", $arr) .") LIMIT $f,$r");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function searchPD($f,$r,$name){
        $sql = self::$connection->prepare("SELECT * FROM `products` INNER JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` WHERE `products`.`name` LIKE '%$name%' LIMIT $f,$r");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
?>