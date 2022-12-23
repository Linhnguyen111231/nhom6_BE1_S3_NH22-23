<?php
class User extends Db
{
    public function checkLogin($username,$password){
        $sql = self::$connection->prepare("SELECT * FROM `login_user` WHERE `user_name`=? AND `password`=?");
        $password = md5($password);
        $sql->bind_param("ss",$username,$password);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->num_rows;
        if ($items == 1) {
            return true;
        }else{
            return false;
        }
    }
    public function getAllUs()
    {
        $sql = self::$connection->prepare("SELECT * FROM `login_user`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function get1Us($name)
    {
        $sql = self::$connection->prepare("SELECT * FROM `user` WHERE `user_name` = '$name'");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getAllUser()
    {
        $sql = self::$connection->prepare("SELECT * FROM `user`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getAllUser1()
    {
        $sql = self::$connection->prepare("SELECT DISTINCT * FROM `user`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getNewUs()
    {
        $sql = self::$connection->prepare("SELECT *, MONTH(`date`) AS MONTH FROM `login_user` WHERE MONTH(`date`) = '".date("m")."'");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getNewUser()
    {
        $sql = self::$connection->prepare("SELECT * FROM `login_user`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function InsertUser($username,$password)
    {
        $sql = self::$connection->prepare("INSERT INTO `login_user` VALUES('admin','$username',MD5('$password'),'".date("Y-m-d H:i:s")."')");
        $sql->execute();
    }
    
}
?>
