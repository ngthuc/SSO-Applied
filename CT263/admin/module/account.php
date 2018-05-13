<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/10/2017
 * Time: 12:38 PM
 */

require "DB.php";

class account
{

    private $db;
    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function get_account(){
        $sql = "select * from account";
        return $this->db->query($sql);
    }

    public function get_name($id){
        $name = $this->db->fetch("SELECT NAME FROM account WHERE ID ='".$id."'");
        $result = $name['NAME']!=""?$name['NAME']:"-";
        return $result;
    }

    public function get_account_id($id){
        $sql = "select * from account WHERE ID ='".$id."'";
        return $this->db->query($sql);
    }

    public function get_account_table($page, $limit, $search){
        $sql = "select ID, NAME, GENDER, ADDRESS, PHONE, EMAIL, account_TYPE_ID, USER_ID from account";

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

    public function get_total_account($search)
    {
        $sql = "SELECT COUNT(*) AS total FROM account";

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

    public function delete_account($id)
    {
        $userID = $this->db->fetch("select USER_ID FROM account where ID = ".$id);
        $this->db->query("delete from account WHERE ID =".$userID['USER_ID']);
//        var_dump($this->db->query("UPDATE Vegetable SET account_ID = NULL WHERE account_ID =".$id));
        return $this->db->query("DELETE FROM account WHERE ID =" . $id);
    }

    public function exits_account($id)
    {
        $result = $this->db->fetch("SELECT COUNT(*) AS exits FROM account WHERE ID =" . $id);
        $result = $result['exits'] > 0 ? true : false;
        return $result;
    }

    public function exits_account_name($name)
    {

        $result = $this->db->fetch("SELECT COUNT(*) AS exits FROM `account`  WHERE NAME ='" . $name."'");
        $result = $result['exits'] > 0 ? true : false;
        return $result;
    }

    public function update_account($id, $name, $gender, $address, $phone, $email, $typeID, $useID)
    {
        $sql = "UPDATE account SET ";
        $value = "";
        if ($name != "") {
            $value = $value . "  NAME=\"" . $name . "\"";
        }
        if ($gender != "") {
            $value = $value . ", GENDER='" . $gender . "'";
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
        if ($typeID != "") {
            $value = $value . ", account_TYPE_ID='" . $typeID . "'";
        }if ($useID != "") {
        $value = $value . ", USER_ID='" . $useID . "'";
    }
        $sql = $sql . substr($value, 1, strlen($value) - 1) . " WHERE ID ='" . $id . "'";
//        var_dump($sql);
        $result = $this->db->query($sql);

        return $result;
    }

    public function insert_account($name,  $gender, $address, $phone, $email, $typeID, $useID)
    {
        $sql = "INSERT INTO account";
        $index = "";
        $value = "";
        if ($name != "") {
            $index = $index . "  NAME";
            $value = $value . " \"" . $name . "\"";
        }
        if ($gender != "") {
            $index = $index . ", GENDER";
            $value = $value . ",'" . $gender . "'";
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
        if ($typeID != "") {
            $index = $index . ", account_TYPE_ID";
            $value = $value . ",'" . $typeID . "'";
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