<?php
class Protypes extends Db
{
    public function getAllPrototype()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProtypeById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes WHERE type_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function updateCTG($id, $name)
    {

        
        $sql = self::$connection->prepare("UPDATE `protypes` SET `type_name` = '$name' WHERE `type_id` = '$id'");
        $sql->execute(); //return an object
    }
    public function insertCTG($id, $name)
    {

        $sql = self::$connection->prepare("INSERT INTO `protypes` VALUES('$id','$name')");
        $sql->execute(); //return an object
    }
    public function DelCTG($id)
    {

        $sql = self::$connection->prepare("DELETE FROM `protypes` WHERE `type_id` = '$id'");
        $sql->execute(); //return an object
    }
}
?>
