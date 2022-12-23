<?php
class Cart extends Db{
    public function insertCart($username,$id,$qty,$total)
    {
        $sql = self::$connection->prepare("INSERT INTO `cart` VALUES('$username', '$id', '$qty', '$total')");
        $sql->execute();
    }
    public function getAllCart($user)
    {
        $sql = self::$connection->prepare("SELECT * FROM `cart` INNER JOIN `products` ON `products`.`id`=`cart`.`id` WHERE `user_name` = '$user'");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAll()
    {
        $sql = self::$connection->prepare("SELECT * FROM `cart` ");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function updateCart($qty,$id, $username)
    {
        $sql = self::$connection->prepare("UPDATE `cart` SET `quantity`='$qty' WHERE `id`='$id' AND `user_name`='$username'");
        
        $sql->execute();
    }
    public function Del($id,$user)
    {
        $sql = self::$connection->prepare("DELETE FROM `cart` WHERE `user_name` = '$user' AND `id` = $id");
        $sql->execute();
    }
    public function DelCart($user)
    {
        $sql = self::$connection->prepare("DELETE FROM `cart` WHERE `user_name` = '$user'");
        $sql->execute();
    }
}
?>