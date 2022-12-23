<?php
class MessUS extends Db{
    public function getMessUS()
    {
        $sql = self::$connection->prepare("SELECT * FROM `mess_ad` GROUP BY `date_mess` ASC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function InsertMessUS($us_name,$mess)
    {
        $sql = self::$connection->prepare("INSERT INTO `mess_ad` VALUES('$us_name', '','admin','".date("Y-m-d H:i:s")."','$mess')");
        $sql->execute(); //return an object
    }
}