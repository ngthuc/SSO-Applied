<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/7/2017
 * Time: 8:57 AM
 */
require_once "DB.php";

class supplier
{
    private $db;
    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function get_supplier(){
        $sql = "select * from supplier";
        return $this->db->query($sql);
    }

    public function get_name($id){
        $name = $this->db->fetch("SELECT NAME FROM supplier WHERE ID ='".$id."'");
        $result = $name['NAME']!=""?$name['NAME']:"-";
        return $result;
    }

    public function get_supplier_id($id){
        $sql = "select * from supplier WHERE ID ='".$id."'";
        return $this->db->query($sql);
    }
    
    public function get_supplier_table($page, $limit, $search){
        $sql = "select ID, NAME, ADDRESS, PHONE, EMAIL, COUNTRY from supplier";

        $sql_search = "";
        if ($search != "") {
            $sql = $sql . " WHERE";
            $sql_search = " NAME LIKE \"%" . $search . "%\" OR ADDRESS LIKE \"%" . $search . "%\" OR PHONE LIKE \"%" . $search . "%\" OR EMAIL LIKE \"%".$search."%\" OR COUNTRY LIKE \"%".$search."%\"";
            $sql = $sql . $sql_search;
        }

        $sql = $sql." ORDER BY NAME ASC ";
//        var_dump($sql);
        if ($page > 0) {
            $sql = $sql . " LIMIT " . (($page - 1) * $limit) . "," . ($page * $limit);
        }
        return $this->db->query($sql);
    }

    public function get_total_supplier($search)
    {
        $sql = "SELECT COUNT(*) AS total FROM supplier";

        $sql_search = "";
        if ($search != "") {
            $sql = $sql . " WHERE";
            $sql_search = " NAME lIKE \"%" . $search . "%\" OR ADDRESS lIKE \"%" . $search . "%\" OR PHONE lIKE \"%" . $search . "%\" OR EMAIL LIKE \"%".$search."%\" OR COUNTRY LIKE \"%".$search."%\"";
            $sql = $sql . $sql_search;
        }

//        var_dump($sql);

        $total = $this->db->fetch($sql);
        return $total['total'];
    }

    public function delete_supplier($id)
    {
        $this->db->query("UPDATE Vegetable SET SUPPLIER_ID = NULL WHERE SUPPLIER_ID =".$id);
//        var_dump($this->db->query("UPDATE Vegetable SET SUPPLIER_ID = NULL WHERE SUPPLIER_ID =".$id));
        return $this->db->query("DELETE FROM supplier WHERE ID =" . $id);
    }

    public function exits_supplier($id)
    {
        $result = $this->db->fetch("SELECT COUNT(*) AS exits FROM supplier WHERE ID =" . $id);
        $result = $result['exits'] > 0 ? true : false;
        return $result;
    }

    public function exits_supplier_name($name)
    {

        $result = $this->db->fetch("SELECT COUNT(*) AS exits FROM `supplier`  WHERE NAME ='" . $name."'");
        $result = $result['exits'] > 0 ? true : false;
        return $result;
    }

    public function update_supplier($id, $name, $address, $phone, $email, $country)
    {
        $sql = "UPDATE supplier SET ";
        $value = "";
        if ($name != "") {
            $value = $value . "  NAME=\"" . $name . "\"";
        }
        if ($address != "") {
            $value = $value . ", ADDRESS='" . $address . "'";
        }
        if ($phone != "") {
            $value = $value . ", PHONE='" . $phone . "'";
        }
        if ($email != "") {
            $value = $value . ", EMAIL='" . $email . "'";
        }
        if ($country != "") {
            $value = $value . ", COUNTRY='" . $country . "'";
        }
        $sql = $sql . substr($value, 1, strlen($value) - 1) . " WHERE ID ='" . $id . "'";
        var_dump($sql);
        $result = $this->db->query($sql);

        return $result;
    }

    public function insert_supplier($name, $address, $phone, $email, $country)
    {
        $sql = "INSERT INTO supplier";
        $index = "";
        $value = "";
        if ($name != "") {
            $index = $index . "  NAME";
            $value = $value . " \"" . $name . "\"";
        }
        if ($address != "") {
            $index = $index . ", ADDRESS";
            $value = $value . ",'" . $address . "'";
        }
        if ($phone != "") {
            $index = $index . ", PHONE";
            $value = $value . ",'" . $phone . "'";
        }
        if ($email != "") {
            $index = $index . ", EMAIL";
            $value = $value . ",'" . $email . "'";
        }
        if ($country != "") {
            $index = $index . ", COUNTRY";
            $value = $value . ",'" . $country . "'";
        }
        $sql = $sql ." (".substr($index, 1, strlen($index) - 1).") VALUES (".substr($value, 1, strlen($value) - 1).")" ;

//        var_dump($sql);

        $result = $this->db->query($sql);

        return $result;
    }
}