<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/7/2017
 * Time: 9:31 AM
 */

require_once "module/supplier.php";
require_once "view/supplier_view.php";

class manage_supplier_controller
{
    private $supplier, $supplier_view;

    public function __construct()
    {
        $this->supplier = new supplier();
        $this->supplier_view = new supplier_view();
    }

    public function create_option($select, $add)
    {
        $array = $this->supplier->get_supplier();
        $this->supplier_view->create_option($array, $select, $add);
    }

    public function create_table($page, $limit, $search)
    {
        $array = $this->supplier->get_supplier($page, $limit, $search);
        $this->supplier_view->create_table_supplier($array);
    }

    public function create_table_nav_page($search, $page, $limit, $link)
    {

//        var_dump($this->product->get_total_product());
        $this->supplier_view->create_table_nav_page($page, $this->supplier->get_total_supplier($search), $limit, $link);
    }

    public function create_form_manage($linkFirst)
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
                $this->delete_supplier($id);
            }
        }

        //Delete multiple products
//        var_dump(isset($_POST['delete-multiple']));
//        var_dump(isset($_POST['check-supplier']));
        if (isset($_POST['delete-multiple']) && isset($_POST['check-supplier'])) {
            $array = array();
            $cnt = count($_POST['check-supplier']);
            for ($i = 0; $i < $cnt; $i++) {
                $del_id = $_POST['check-supplier'][$i];
//                var_dump($_POST['check-supplier'][$i]);
                $array[] = $del_id;
            }
            $this->delete_supplier_multiple($array);
//            var_dump("Delete multiple");
        }


        ?>

        <form action="#" method="post" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group mr-4">
                        <a class="btn btn-primary text-white" href="supplier.php?action=new">
                            <span class="fa fa-plus"></span> Add new
                        </a>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger mb-2" name="delete-multiple" type="submit">
                            <span class="fa fa-remove"></span> Delete
                        </button>
                    </div>
                    <div class="search-form form-group form-inline ml-auto">
                        <div class="input-group ">
                            <input type="text" class="form-control" id="search-text" name="search"
                                   placeholder="<?php echo $search != "" ? $search : "Search" ?>">
                            <span class="input-group-btn">
                                    <?php
                                    if ($search != "") {
                                        $link = $linkFirst . "?" . ($limit != 1 ? "&limit=" . $limit : "") . ($page != 1 ? "&page=" . $page : "");
                                        echo "<button class='btn btn-outline-secondary' type='submit'>
                                        <i class='fa fa-search'></i>
                                      </button>";
                                        echo "
                                        <a class='btn btn-outline-secondary' href='" . $link . "'>
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
                          <span class="_text">Number Supplier in page </span>
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
            $supplier = $this->supplier->get_supplier_table($page, $limit, $search);

            $this->supplier_view->create_table_supplier($supplier);

            ?>
            <div class="container-fluid">
                <div class="form-inline">
                        <span class="product-number">
                          <span class="_text">Number Supplier in page </span>
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
        <?php
    }

    /**
     * @return supplier
     */
    public function create_form_edit($id)
    {
//        update
        if (isset($_POST['save'])) {

            $this->update_supplier($_POST['supplier-id'], $_POST['supplier-address'], $_POST['supplier-phone'], $_POST['supplier-email'], $_POST['supplier-country']);
        }

        ?>
        <div class="row">
            <div class='col-md-5 col-xs-6'>
                <form action="#" method="post" enctype="multipart/form-data">
                    <?php
                    if ($this->supplier->exits_supplier($id)) {
                        $supplier = $this->supplier->get_supplier_id($id);
                        $this->supplier_view->create_form_edit($supplier);
                    } else echo "supplier not exits.";
                    ?>
                </form>
            </div>
        </div>
        <?php
    }

    public function create_form_add()
    {

//        add new
        if (isset($_POST['add-new'])) {

            $this->insert_supplier($_POST['supplier-name'], $_POST['supplier-address'], $_POST['supplier-phone'], $_POST['supplier-email'], $_POST['supplier-country']);
        }
        ?>
        <div class="row">
            <div class='col-md-5 col-xs-6'>
                <form action="#" method="post" enctype="multipart/form-data">
                    <?php
                    $this->supplier_view->create_form_add_new();
                    ?>
                </form>
            </div>
        </div>
        <?php
    }

    public function update_supplier($id, $name, $address, $phone, $email, $country)
    {
        if ($this->supplier->exits_supplier($id)) {
            $result = $this->supplier->update_supplier($id, $name, $address, $phone, $email, $country);
            $this->supplier_view->update_alert($result, $id);
        }
    }

    public function insert_supplier($name, $address, $phone, $email, $country)
    {
        if (!$this->supplier->exits_supplier_name($name)) {
            $result = $this->supplier->insert_supplier($name, $address, $phone, $email, $country);
            $this->supplier_view->insert_alert($result);
        } else {
            echo "<div class='alert alert-danger alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                  supplier name = " . $name . " exits.
             </div>
            ";
        }
    }

    public function delete_supplier($id)
    {
        if ($this->supplier->exits_supplier($id)) {
            $result = $this->supplier->delete_supplier($id);
            $this->supplier_view->delete_alert($result, $id);
        }
    }

    public function delete_supplier_multiple($array)
    {
        $total = count($array);
        $deleted = 0;
        for ($i = 0; $i < $total; $i++) {
//            var_dump($array[$i]);
            if ($this->supplier->exits_supplier($array[$i])) {
                $result = $this->supplier->delete_supplier($array[$i]);
                if ($result) $deleted++;
            }
        }
        $this->supplier_view->delete_alert_multiple($deleted, $total);
    }

}