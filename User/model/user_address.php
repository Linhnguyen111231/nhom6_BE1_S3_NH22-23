<?php
class UserAddress extends Db
{
    public function InsertUser($username,$fullname,$phone,$address,$city,$country,$note)
    {
        $sql = self::$connection->prepare("INSERT INTO `user` VALUES('$username','$fullname','$phone','$address','$city','$country','$note')");
        $sql->execute();
    }
    public function UpdateUS($username,$fullname,$phone,$address,$city,$country,$note)
    {
        $sql = self::$connection->prepare("UPDATE `user` SET fullName = '$fullname', `phone` = '$phone', `address` = '$address', `city`='$city',`country` = '$country', `order_notes` = '$note' WHERE `user_name`= '$username'");
        $sql->execute();
    }
    public function getUsOrder()
    {
        $sql = self::$connection->prepare("SELECT * FROM `user`");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getUsOrderID($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `user` WHERE `user_name` = '$id'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
?>
