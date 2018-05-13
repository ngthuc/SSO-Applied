<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/10/2017
 * Time: 11:44 AM
 */
require_once "DB.php";

class staff
{
    private $db;
    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function get_staff(){
        $sql = "select * from staff";
        return $this->db->query($sql);
    }

    public function get_name($id){
        $name = $this->db->fetch("SELECT NAME FROM staff WHERE ID ='".$id."'");
        $result = $name['NAME']!=""?$name['NAME']:"-";
        return $result;
    }

    public function get_staff_id($id){
        $sql = "select * from staff WHERE ID ='".$id."'";
        return $this->db->query($sql);
    }

    public function get_staff_table($page, $limit, $search){
        $sql = "select ID, NAME, ADDRESS, PHONE, EMAIL, MANAGER_ID, USER_ID from staff";

        $sql_search = "";
        if ($search != "") {
            $sql = $sql . " WHERE";
            $sql_search = " NAME LIKE \"%" . $search . "%\" OR ADDRESS LIKE \"%" . $search . "%\" OR PHONE LIKE \"%" . $search . "%\" OR EMAIL LIKE \"%".$search."%\"";
            $sql = $sql . $sql_search;
        }

        $sql = $sql." ORDER BY NAME ASC ";
//        var_dump($sql);
        if ($page > 0) {
            $sql = $sql . " LIMIT " . (($page - 1) * $limit) . "," . ($page * $limit);
        }
        return $this->db->query($sql);
    }

    public function get_total_staff($search)
    {
        $sql = "SELECT COUNT(*) AS total FROM staff";

        $sql_search = "";
        if ($search != "") {
            $sql = $sql . " WHERE";
            $sql_search = " NAME lIKE \"%" . $search . "%\" OR ADDRESS lIKE \"%" . $search . "%\" OR PHONE lIKE \"%" . $search . "%\" OR EMAIL LIKE \"%".$search."%\"";
            $sql = $sql . $sql_search;
        }

//        var_dump($sql);

        $total = $this->db->fetch($sql);
        return $total['total'];
    }

    public function delete_staff($id)
    {
        $userID = $this->db->fetch("select USER_ID FROM staff where ID = ".$id);
        $this->db->query("delete from account WHERE ID =".$userID['USER_ID']);
//        var_dump($this->db->query("UPDATE Vegetable SET STAFF_ID = NULL WHERE STAFF_ID =".$id));
        return $this->db->query("DELETE FROM staff WHERE ID =" . $id);
    }

    public function exits_staff($id)
    {
        $result = $this->db->fetch("SELECT COUNT(*) AS exits FROM staff WHERE ID =" . $id);
        $result = $result['exits'] > 0 ? true : false;
        return $result;
    }

    public function exits_staff_name($name)
    {

        $result = $this->db->fetch("SELECT COUNT(*) AS exits FROM `staff`  WHERE NAME ='" . $name."'");
        $result = $result['exits'] > 0 ? true : false;
        return $result;
    }

    public function update_staff($id, $name, $address, $phone, $email, $managerID, $useID)
    {
        $sql = "UPDATE staff SET ";
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
        if ($managerID != "") {
            $value = $value . ", MANAGER_ID='" . $managerID . "'";
        }if ($useID != "") {
            $value = $value . ", USER_ID='" . $useID . "'";
        }
        $sql = $sql . substr($value, 1, strlen($value) - 1) . " WHERE ID ='" . $id . "'";
//        var_dump($sql);
        $result = $this->db->query($sql);

        return $result;
    }

    public function insert_staff($name, $address, $phone, $email, $managerID, $useID)
    {
        $sql = "INSERT INTO staff";
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
        if ($managerID != "") {
            $index = $index . ", MANAGER_ID";
            $value = $value . ",'" . $managerID . "'";
        }
        if ($useID != "") {
            $index = $index . ", USER_ID";
            $value = $value . ",'" . $useID . "'";
        }
        $sql = $sql ." (".substr($index, 1, strlen($index) - 1).") VALUES (".substr($value, 1, strlen($value) - 1).")" ;

//        var_dump($sql);

        $result = $this->db->query($sql);

        return $result;
    }

}