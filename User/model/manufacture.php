<?php
class Manufacture extends Db
{
    public function getAllManufacture()
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getManufactureById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures WHERE manu_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function updateManu($id, $name, $img)
    {

        $s= "UPDATE `manufactures` SET";
        if ($name!="") {
            $s.="`manu_name`= '$name',";
        }
        if ($img!="") {
            $s.="`img_manu`= '$img',";
        }

        $s = substr($s,0,-1);
        $s.= " WHERE `manu_id` = '$id'";
        $sql = self::$connection->prepare($s);
        $sql->execute(); //return an object
    }
    public function insertManu($id, $name, $img)
    {

        $sql = self::$connection->prepare("INSERT INTO `manufactures` VALUES('$id','$name','$img')");
        $sql->execute(); //return an object
    }
    public function DelManu($id)
    {

        $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE `manu_id` = '$id'");
        $sql->execute(); //return an object
    }
}