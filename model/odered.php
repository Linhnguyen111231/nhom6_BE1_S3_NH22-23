<?php
class Odered extends Db{
    public function insertOder($adminname,$username,$id,$qty,$total)
    {
        $sql = self::$connection->prepare("INSERT INTO `odered` VALUES('$adminname','$username', '$id', '$qty', '$total',0, '".date("Y-m-d H:i:s")."')");

        $sql->execute();
    }
    public function getAllOrder($user)
    {
        $sql = self::$connection->prepare("SELECT * FROM `odered` INNER JOIN `products` ON `odered`.`id` = `products`.`id` WHERE `user_name` = '$user'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
?>