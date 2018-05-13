<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/1/2017
 * Time: 8:41 PM
 */

require_once __DIR__."/DB.php";

class category
{
    private $db;
    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function get_category(){
        $sql = "select * from category ";
        return $this->db->query($sql);
    }
    public function get_category_id($id){
        $sql = "select * from category WHERE ID ='".$id."'";
        return $this->db->query($sql);
    }
    public function get_category_table($page, $limit, $search){
        $sql = "select ID, NAME, CATEGORY_ID, SUBSTRING(`Describe`, 1, 100) as Describe2 from category";
        if ($search != "") {
            $sql = $sql . " WHERE";
        }

        $sql_search = "";
        if ($search != "") {
            $sql_search = " NAME lIKE \"%" . $search . "%\" OR CATEGORY_ID lIKE \"%" . $search . "%\"";
            $sql = $sql . $sql_search;
        }
        $sql = $sql." ORDER BY NAME ASC ";

        if ($page > 0) {
            $sql = $sql . " LIMIT " . (($page - 1) * $limit) . "," . ($page * $limit);
        }

//        var_dump($sql);
        return $this->db->query($sql);
    }

    public function get_name($id){
        $name = $this->db->fetch("SELECT NAME FROM category WHERE ID ='".$id."'");
        $result = $name['NAME']!=""?$name['NAME']:"-";
        return $result;
    }

    public function get_total_category($search)
    {
        $sql = "SELECT COUNT(*) AS total FROM category";

        if ($search != "") {
            $sql = $sql . " WHERE";
        }

        $sql_search = "";
        if ($search != "") {
            $sql_search = " NAME lIKE \"%" . $search . "%\" OR CATEGORY_ID lIKE \"%" . $search . "%\"";
            $sql = $sql . $sql_search;
        }

//        var_dump($sql);

        $total = $this->db->fetch($sql);
        return $total['total'];
    }

    public function delete_category($id)
    {
        $this->db->query("UPDATE Vegetable SET CATEGORY_ID = NULL WHERE CATEGORY_ID =".$id);
//        var_dump($this->db->query("UPDATE Vegetable SET CATEGORY_ID = NULL WHERE CATEGORY_ID =".$id));
        return $this->db->query("DELETE FROM category WHERE ID =" . $id);
    }

    public function exits_category($id)
    {
        $result = $this->db->fetch("SELECT COUNT(*) AS exits FROM category WHERE ID =" . $id);
        $result = $result['exits'] > 0 ? true : false;
        return $result;
    }

    public function exits_category_code($category_id)
    {

//        var_d ump("SELECT COUNT(*) AS exits FROM Vegetable WHERE CATEGORY_ID ='" . $category_id."'");
        $result = $this->db->fetch("SELECT COUNT(*) AS exits FROM `category`  WHERE CATEGORY_ID ='" . $category_id."'");
        $result = $result['exits'] > 0 ? true : false;
        return $result;
    }

    public function update_category($id, $name, $category_id, $description)
    {
        $sql = "UPDATE category SET ";
        $value = "";
        if ($name != "") {
            $value = $value . "  NAME=\"" . $name . "\"";
        }
        if ($category_id != "") {
            $value = $value . ", CATEGORY_ID='" . $category_id . "'";
        }
        if ($description != "") {
            $value = $value . ", `Describe`='" . $description . "'";
        }
        $sql = $sql . substr($value, 1, strlen($value) - 1) . " WHERE ID ='" . $id . "'";
        var_dump($sql);
        $result = $this->db->query($sql);

        return $result;
    }

    public function insert_category($name, $category_id, $description)
    {
        $sql = "INSERT INTO category";
        $index = "";
        $value = "";
        if ($name != "") {
            $index = $index . "  NAME";
            $value = $value . " \"" . $name . "\"";
        }
        if ($category_id != "") {
            $index = $index . ", CATEGORY_ID";
            $value = $value . ",'" . $category_id . "'";
        }
        if ($description != "") {
            $index = $index . ", `Describe`";
            $value = $value . ",'" . $description . "'";
        }
        $sql = $sql ." (".substr($index, 1, strlen($index) - 1).") VALUES (".substr($value, 1, strlen($value) - 1).")" ;

//        var_dump($sql);

        $result = $this->db->query($sql);

        return $result;
    }
}
