<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/1/2017
 * Time: 8:24 PM
 */

require_once __DIR__."/DB.php";

class product
{
    private $db;

    public function __construct()
    {
        GLOBAL $db;
        $this->db = $db;
    }

    public function get_product($category, $supplier, $page, $limit, $search)
    {
        $sql = "SELECT * FROM vegetable";

        if ($category != "All" || $supplier != "All" || $search != "") {
            $sql = $sql . " WHERE";
        }
        if ($category != "All") {
            $category_value = $category == "" ? (" CATEGORY_ID IS NULL") : (" CATEGORY_ID = '" . $category . "'");
            $sql = $sql . $category_value;
        }

        if ($supplier != "All") {
            if ($category != "All") {
                $sql = $sql . " AND ";
            }
            $supplier_value = $supplier == "" ? (" SUPPLIER_ID IS NULL") : (" SUPPLIER_ID = '" . $supplier . "'");
            $sql = $sql . $supplier_value;
        }

        $sql_search = "";
        if ($search != "") {
            $sql_search = " NAME lIKE \"%" . $search . "%\" OR PRODUCT_ID lIKE \"%" . $search . "%\"";
        }
        if (($category != "All" || $supplier != "All") && $sql_search != "") {
            $sql = $sql . " AND (" . $sql_search . ")";
        } else  $sql = $sql . $sql_search;

        $sql = $sql . " ORDER BY id DESC ";

        if ($page > 0) {
            $sql = $sql . " LIMIT " . (($page - 1) * $limit) . "," . ($page * $limit);
        }

        //var_dump($sql);

        return $this->db->query($sql);
    }

    public function get_product_id($id)
    {
        $sql = "SELECT * FROM vegetable WHERE ID =" . $id;
        return $this->db->query($sql);
    }

    public function get_total_product($category, $supplier, $search)
    {
        $sql = "SELECT COUNT(*) AS totalproduct FROM vegetable";

        if ($category != "All" || $supplier != "All" || $search != "") {
            $sql = $sql . " WHERE";
        }
        if ($category != "All") {
            $category_value = $category == "" ? (" CATEGORY_ID IS NULL") : (" CATEGORY_ID = '" . $category . "'");
            $sql = $sql . $category_value;
        }

        if ($supplier != "All") {
            if ($category != "All") {
                $sql = $sql . " AND ";
            }
            $supplier_value = $supplier == "" ? (" SUPPLIER_ID IS NULL") : (" SUPPLIER_ID = '" . $supplier . "'");
            $sql = $sql . $supplier_value;
        }

        $sql_search = "";
        if ($search != "") {
            $sql_search = " NAME lIKE \"%" . $search . "%\" OR PRODUCT_ID lIKE \"%" . $search . "%\"";
        }
        if (($category != "All" || $supplier != "All") && $sql_search != "") {
            $sql = $sql . " AND (" . $sql_search . ")";
        } else  $sql = $sql . $sql_search;

//        var_dump($sql);

        $total = $this->db->fetch($sql);
        return $total['totalproduct'];
    }

    public function name_product($id)
    {
        $result = $this->db->fetch("SELECT NAME FROM vegetable WHERE ID =" . $id);
        $result = $result['NAME'] !="" ? $result['NAME'] : "";
        return $result;
    }

    public function delete_product($id)
    {
        return $this->db->query("DELETE FROM vegetable WHERE ID =" . $id);
    }

    public function exits_product($id)
    {
        $result = $this->db->fetch("SELECT COUNT(*) AS exits FROM vegetable WHERE ID =" . $id);
        $result = $result['exits'] > 0 ? true : false;
        return $result;
    }

    public function exits_product_code($product_id)
    {

//        var_dump("SELECT COUNT(*) AS exits FROM vegetable WHERE PRODUCT_ID ='" . $product_id."'");
        $result = $this->db->fetch("SELECT COUNT(*) AS exits FROM vegetable WHERE PRODUCT_ID ='" . $product_id."'");
        $result = $result['exits'] > 0 ? true : false;
        return $result;
    }

    public function update_product($id, $name, $product_id, $image, $volume, $abv, $price, $discount, $category_id, $supplier_id, $description)
    {
        $sql = "UPDATE vegetable SET ";
        $value = "";
        if ($name != "") {
            $value = $value . "  NAME=\"" . $name . "\"";
        }
        if ($product_id != "") {
            $value = $value . ", PRODUCT_ID='" . $product_id . "'";
        }
        if ($image != "") {
            $value = $value . ", IMAGE='" . $image . "'";
        }
        if ($volume != "") {
            $value = $value . ", VOLUME='" . $volume . "'";
        }
        if ($abv != "") {
            $value = $value . ", ABV='" . $abv . "'";
        }
        if ($price != "") {
            $value = $value . ", PRICE='" . $price . "'";
        }
        if ($discount != "") {
            $value = $value . ", DISCOUNT='" . $discount . "'";
        }
        if ($category_id != "") {
            $value = $value . ", CATEGORY_ID='" . $category_id . "'";
        }
        if ($supplier_id != "") {
            $value = $value . ", SUPPLIER_ID='" . $supplier_id . "'";
        }
        if ($description != "") {
            $value = $value . ", DICRIPTION='" . $description . "'";
        }
        $sql = $sql . substr($value, 1, strlen($value) - 1) . " WHERE ID ='" . $id . "'";
//        var_dump($sql);
        $result = $this->db->query($sql);

        return $result;
    }

    public function insert_product($name, $product_id, $image, $volume, $abv, $price, $discount, $category_id, $supplier_id, $description)
    {
        $sql = "INSERT INTO vegetable";
        $index = "";
        $value = "";
        if ($name != "") {
            $index = $index . "  NAME";
            $value = $value . " \"" . $name . "\"";
        }
        if ($product_id != "") {
            $index = $index . ", PRODUCT_ID";
            $value = $value . ",'" . $product_id . "'";
        }
        if ($image != "") {
            $index = $index . ", IMAGE";
            $value = $value . ",'" . $image . "'";
        }
        if ($volume != "") {
            $index = $index . ", VOLUME";
            $value = $value . ",'" . $volume . "'";
        }
        if ($abv != "") {
            $index = $index . ", ABV";
            $value = $value . ",'" . $abv . "'";
        }
        if ($price != "") {
            $index = $index . ", PRICE";
            $value = $value . ", PRICE,'" . $price . "'";
        }
        if ($discount != "") {
            $index = $index . ", DISCOUNT";
            $value = $value . ",'" . $discount . "'";
        }
        if ($category_id != "") {
            $index = $index . ", CATEGORY_ID";
            $value = $value . ",'" . $category_id . "'";
        }
        if ($supplier_id != "") {
            $index = $index . ", SUPPLIER_ID";
            $value = $value . ",'" . $supplier_id . "'";
        }
        if ($description != "") {
            $index = $index . ", DICRIPTION";
            $value = $value . ",'" . $description . "'";
        }
        $sql = $sql ." (".substr($index, 1, strlen($index) - 1).") VALUES (".substr($value, 1, strlen($value) - 1).")" ;

//        var_dump($sql);

        $result = $this->db->query($sql);

        return $result;
    }
}