<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/1/2017
 * Time: 8:41 PM
 */

require_once __DIR__."/DB.php";

class customer_type
{
    private $db;
    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function get_customer_type(){
        $sql = "select * from customer_type ";
        return $this->db->query($sql);
    }
    public function get_customer_type_id($id){
        $sql = "select * from customer_type WHERE ID ='".$id."'";
        return $this->db->query($sql);
    }
    public function get_customer_type_table($page, $limit, $search){
        $sql = "select ID, NAME, DISCOUNT, SUBSTRING(`Describe`, 1, 100) as Describe2 from customer_type";
        if ($search != "") {
            $sql = $sql . " WHERE";
        }

        $sql_search = "";
        if ($search != "") {
            $sql_search = " NAME lIKE \"%" . $search . "%\"";
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
        $name = $this->db->fetch("SELECT NAME FROM customer_type WHERE ID ='".$id."'");
        $result = $name['NAME']!=""?$name['NAME']:"-";
        return $result;
    }

    public function get_total_customer_type($search)
    {
        $sql = "SELECT COUNT(*) AS total FROM customer_type";

        if ($search != "") {
            $sql = $sql . " WHERE";
        }

        $sql_search = "";
        if ($search != "") {
            $sql_search = " NAME lIKE \"%" . $search . "%\"";
            $sql = $sql . $sql_search;
        }

//        var_dump($sql);

        $total = $this->db->fetch($sql);
        return $total['total'];
    }

    public function delete_customer_type($id)
    {
        $this->db->query("UPDATE customer SET customer_type_ID = NULL WHERE customer_type_ID =".$id);

        return $this->db->query("DELETE FROM customer_type WHERE ID =" . $id);
    }

    public function exits_customer_type($id)
    {
        $result = $this->db->fetch("SELECT COUNT(*) AS exits FROM customer_type WHERE ID =" . $id);
        $result = $result['exits'] > 0 ? true : false;
        return $result;
    }

//    public function exits_customer_type_code($customer_type_id)
//    {
//
////        var_d ump("SELECT COUNT(*) AS exits FROM Vegetable WHERE customer_type_ID ='" . $customer_type_id."'");
//        $result = $this->db->fetch("SELECT COUNT(*) AS exits FROM `customer_type`  WHERE customer_type_ID ='" . $customer_type_id."'");
//        $result = $result['exits'] > 0 ? true : false;
//        return $result;
//    }

    public function update_customer_type($id, $name, $discount, $description)
    {
        $sql = "UPDATE customer_type SET ";
        $value = "";
        if ($name != "") {
            $value = $value . "  NAME=\"" . $name . "\"";
        }
        if ($discount != "") {
            $value = $value . ", discount='" . $discount . "'";
        }
        if ($description != "") {
            $value = $value . ", `Describe`='" . $description . "'";
        }
        $sql = $sql . substr($value, 1, strlen($value) - 1) . " WHERE ID ='" . $id . "'";
//        var_dump($sql);
        $result = $this->db->query($sql);

        return $result;
    }

    public function insert_customer_type($name, $discount, $description)
    {
        $sql = "INSERT INTO customer_type";
        $index = "";
        $value = "";
        if ($name != "") {
            $index = $index . "  NAME";
            $value = $value . " \"" . $name . "\"";
        }
        if ($discount != "") {
            $index = $index . ", Discount";
            $value = $value . ",'" . $discount . "'";
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
