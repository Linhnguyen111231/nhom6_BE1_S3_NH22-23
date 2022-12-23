<?php
class Order extends Db
{
    public function getAllUserOrder()
    {
        $sql = self::$connection->prepare("SELECT DISTINCT `user_name` FROM `odered` WHERE `check_order` = 0 ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllPDB()
    {
        $sql = self::$connection->prepare("SELECT * FROM `odered` INNER JOIN `products` ON `products`.`id` = `odered`.`id` WHERE `check_order` = 1 ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getUserPDB($name)
    {
        $sql = self::$connection->prepare("SELECT * FROM `odered` INNER JOIN `products` ON `products`.`id` = `odered`.`id` WHERE `check_order` = 1 AND `user_name` = '$name' ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllOrder()
    {
        $sql = self::$connection->prepare("SELECT * FROM `odered` INNER JOIN `products` ON `odered`.`id` = `products`.`id` WHERE `check_order` = 0 ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getOrderPD($id, $name)
    {
        $sql = self::$connection->prepare("UPDATE `odered` SET `check_order` = 1 WHERE `id` = '$id' AND `user_name` = '$name' ");
        $sql->execute(); //return an object
        
    }
    public function getDeletOrder($id, $name)
    {
        $sql = self::$connection->prepare("DELETE FROM `odered` WHERE `id` = '$id' AND `user_name` = '$name' ");
        $sql->execute(); //return an object
        
    }
    
}