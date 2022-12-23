<?php
class AD  extends Db
{
    public function checkLoginAD($username,$password){
        $sql = self::$connection->prepare("SELECT * FROM `admin` WHERE `user_name`=? AND `password`=?");
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
    public function InsertMess($mess,$user)
    {
        $sql = self::$connection->prepare("INSERT INTO `mess_ad` VALUES('$user','$mess','admin','".date("Y-m-d H:i:s")."','')");
        $sql->execute();
    }
    public function getMess($user)
    {
        $sql = self::$connection->prepare("SELECT * FROM `mess_ad` WHERE `user_name`= '$user'
        ");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getMessADDD()
    {
        $sql = self::$connection->prepare("SELECT * FROM `admin_lg` 
        ");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getMessNew()
    {
        $sql = self::$connection->prepare("SELECT * FROM `mess_ad` ORDER BY `date_mess` DESC LIMIT 1");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
        
    }
    public function getMessUS()
    {
        $sql = self::$connection->prepare("SELECT DISTINCT `user_name` FROM `mess_ad`
        ");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getNewMSID($user)
    {
        $sql = self::$connection->prepare("SELECT * FROM `mess_ad` WHERE `user_name`= '$user' ORDER BY `date_mess` DESC LIMIT 1
        ");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}