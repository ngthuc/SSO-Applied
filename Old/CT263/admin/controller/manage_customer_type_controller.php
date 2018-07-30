<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/7/2017
 * Time: 8:12 AM
 */

require_once __DIR__."/../module/customer_type.php";
require_once __DIR__."/../view/customer_type_view.php";

class manage_customer_type_controller
{
    private $customer_type, $customer_type_view;

    public function __construct()
    {
        $this->customer_type = new customer_type();
        $this->customer_type_view = new customer_type_view();
    }

    public function create_option($select, $add)
    {
        $array = $this->customer_type->get_customer_type();
        $this->customer_type_view->create_option($array, $select, $add);
    }

    public function create_table_nav_page($search, $page, $limit, $link){

//        var_dump($this->product->get_total_product());
        $this->customer_type_view->create_table_nav_page($page, $this->customer_type->get_total_customer_type($search), $limit, $link);
    }

    public function create_form($linkFirst)
    {
        $limit = 10;
        $search = "";
        $page = 1;

        if (isset($_GET['limit']))
            $limit = $_GET['limit'];
        if (isset($_GET['page']))
            $page = $_GET['page'];

        if (isset($_POST['search']))
            $search = $_POST['search'];
        else if (isset($_GET['search']))
            $search = $_GET['search'];

//        var_dump($search);

        //Delete a product
        if (isset($_GET['action'])) {
            if ($_GET['action'] == "delete") {
                $id = $_GET['id'];
                $this->delete_customer_type($id);
            }
        }

        //Delete multiple products
//        var_dump(isset($_POST['delete-multiple']));
//        var_dump(isset($_POST['check-customer_type']));
        if(isset($_POST['delete-multiple']) && isset($_POST['check-customer_type']))
        {
            $array= array();
            $cnt=count($_POST['check-customer_type']);
            for($i=0;$i<$cnt;$i++)
            {
                $del_id=$_POST['check-customer_type'][$i];
//                var_dump($_POST['check-customer_type'][$i]);
                $array[] = $del_id;
            }
            $this->delete_customer_type_multiple($array);
//            var_dump("Delete multiple");
        }

//        add new
        if (isset($_POST['add-new'])) {

            $this->insert_customer_type($_POST['customer_type-name'], $_POST['customer_type-discount'], $_POST['customer_type-description']);
        }

//        update
        if (isset($_POST['save'])) {

            $this->update_customer_type($_POST['customer_type-id'],$_POST['customer_type-name'], $_POST['customer_type-discount'], $_POST['customer_type-description']);
        }

        ?>

        <div class="row">
            <div class='col-md-5 col-xs-6'>
                <form action="#" method="post" enctype="multipart/form-data">
                    <?php

                    if(isset($_GET['action']) && isset($_GET['id'])){
                        if ($_GET['action']=="edit") {
                            $customer_type = $this->customer_type->get_customer_type_id($_GET['id']);
                            $this->customer_type_view->create_form_edit($customer_type);
                        }
                        else {
                            $this->customer_type_view->create_form_add_new();
                        }
                    } else {
                        $this->customer_type_view->create_form_add_new();
                    }
                    ?>
                </form>
            </div>
            <div class="col-md-7 col-xs-6">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="row">
                            <button class="btn btn-danger mb-2" name="delete-multiple" type="submit">
                                <span class="fa fa-remove"></span> Delete
                            </button>
                            <div class="search-form form-group form-inline ml-auto">
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="search-text" name="search" placeholder="<?php echo $search!=""?$search:"Search" ?>">
                                    <span class="input-group-btn">
                                    <?php
                                    if($search != "") {
                                        $link = $linkFirst . "?" . ($limit != 1 ? "&limit=" . $limit : ""). ($page!=1?"&page=".$page:"");
                                        echo "<button class='btn btn-outline-secondary' type='submit'>
                                        <i class='fa fa-search'></i>
                                      </button>";
                                        echo "
                                        <a class='btn btn-outline-secondary' href='".$link."'>
                                            <i class='fa fa-remove'></i>
                                          </a>
                                    ";
                                    } else
                                        echo "<button class='btn btn-outline-secondary' type='submit'>
                                        <i class='fa fa-search'></i>
                                      </button>";
                                    ?>
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-inline">
                        <span class="product-number">
                          <span class="_text">Number customer_type in page </span>
                          <select class="_size form-control" name="limit"
                                  onchange="location = '<?php echo $linkFirst; ?>?limit='+this.options[this.selectedIndex].value+'<?php
                                  echo $search != "" ? "&search=" . $search : "";
                                  echo $page != 1 ? "&page=" . $page : "";
                                  echo "';";
                                  ?>">
                            <option value="10"<?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 10) echo " selected";
                            } ?> >10</option>

                            <option value="30" <?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 30) echo " selected";
                            } ?> >30</option>

                            <option value="50" <?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 50) echo " selected";
                            } ?> >50</option>

                          </select>
                        </span>
                            <?php
                            $link = $linkFirst . "?" . ($search != "" ? "&search=" . $search : "") . ($limit != 1 ? "&limit=" . $limit : "");
                            $this->create_table_nav_page($search, $page, $limit, $link);
                            ?>
                        </div>
                    </div>
                    <?php
                    $customer_type = $this->customer_type->get_customer_type_table($page, $limit,$search);

                    $this->customer_type_view->create_table_customer_type($customer_type);

                    ?>
                    <div class="container-fluid">
                        <div class="form-inline">
                        <span class="product-number">
                          <span class="_text">Number customer_type in page </span>
                          <select class="_size form-control" name="limit"
                                  onchange="location = '<?php echo $linkFirst; ?>?limit='+this.options[this.selectedIndex].value+'<?php
                                  echo $search != "" ? "&search=" . $search : "";
                                  echo $page != 1 ? "&page=" . $page : "";
                                  echo "';";
                                  ?>">
                            <option value="10"<?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 10) echo " selected";
                            } ?> >10</option>

                            <option value="30" <?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 30) echo " selected";
                            } ?> >30</option>

                            <option value="50" <?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 50) echo " selected";
                            } ?> >50</option>

                          </select>
                        </span>
                            <?php
                            $link = $linkFirst . "?" . ($search != "" ? "&search=" . $search : "") . ($limit != 1 ? "&limit=" . $limit : "");
                            $this->create_table_nav_page($search, $page, $limit, $link);
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }

    public function update_customer_type($id, $name, $discount, $description)
    {
        if($this->customer_type->exits_customer_type($id)) {
            $result = $this->customer_type->update_customer_type($id, $name, $discount , $description);
            $this->customer_type_view->update_alert($result,$id);
        }
    }
    public function insert_customer_type( $name, $discount, $description)
    {
//        if(!$this->customer_type->exits_customer_type_code($customer_type_id)) {
            $result = $this->customer_type->insert_customer_type($name, $discount, $description);
            $this->customer_type_view->insert_alert($result);
//        } else{
//            echo "<div class='alert alert-danger alert-dismissable'>
//                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
//                  customer_type id = ".$customer_type_id." exits.
//             </div>
//            ";
//        }
    }
    public function delete_customer_type($id)
    {
        if($this->customer_type->exits_customer_type($id)) {
            $result = $this->customer_type->delete_customer_type($id);
            $this->customer_type_view->delete_alert($result, $id);
        }
    }
    public function delete_customer_type_multiple($array)
    {
        $total = count($array);
        $deleted = 0;
        for($i=0;$i<$total;$i++) {
//            var_dump($array[$i]);
            if ($this->customer_type->exits_customer_type($array[$i])) {
                $result = $this->customer_type->delete_customer_type($array[$i]);
                if ($result) $deleted++;
            }
        }
        $this->customer_type_view->delete_alert_multiple($deleted, $total);
    }

}