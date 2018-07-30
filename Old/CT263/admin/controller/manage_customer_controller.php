<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/10/2017
 * Time: 11:45 AM
 */

require_once "module/customer.php";
require_once "view/customer_view.php";

class manage_customer_controller
{
    private $customer, $customer_view;

    public function __construct()
    {
        $this->customer = new customer();
        $this->customer_view = new customer_view();
    }

    public function create_table($page, $limit, $search)
    {
        $array = $this->customer->get_customer($page, $limit, $search);
        $this->customer_view->create_table_customer($array);
    }

    public function create_table_nav_page($search, $page, $limit, $link)
    {

//        var_dump($this->product->get_total_product());
        $this->customer_view->create_table_nav_page($page, $this->customer->get_total_customer($search), $limit, $link);
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
                $this->delete_customer($id);
            }
        }

        //Delete multiple products
//        var_dump(isset($_POST['delete-multiple']));
//        var_dump(isset($_POST['check-customer']));
        if (isset($_POST['delete-multiple']) && isset($_POST['check-customer'])) {
            $array = array();
            $cnt = count($_POST['check-customer']);
            for ($i = 0; $i < $cnt; $i++) {
                $del_id = $_POST['check-customer'][$i];
//                var_dump($_POST['check-customer'][$i]);
                $array[] = $del_id;
            }
            $this->delete_customer_multiple($array);
//            var_dump("Delete multiple");
        }


        ?>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group mr-4">
                        <a class="btn btn-primary text-white" href="customer.php?action=new">
                            <span class="fa fa-plus"></span> Add new
                        </a>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger mb-2" name="delete-multiple" type="submit">
                            <span class="fa fa-remove"></span> Delete
                        </button>
                    </div>
                    <!-- <div class="search-form form-group form-inline ml-auto">
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
                    </div> -->
                </div>
            </div>
            <div class="container-fluid">
                <!-- <div class="form-inline">
                        <span class="product-number">
                          <span class="_text">Number Customer in page </span>
                          <select class="_size form-control" name="limit"
                                  onchange="location = '<?php echo $linkFirst; ?>?limit='+this.options[this.selectedIndex].value+'<?php
                                  echo $search != "" ? "&search=" . $search : "";
                                  echo $page != 1 ? "&page=" . $page : "";
                                  echo "';";
                                  ?>">
                            <option value="10"<?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 10) echo " selected";
                            } ?> >10</option>

                            <option value="50" <?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 50) echo " selected";
                            } ?> >30</option>

                            <option value="100" <?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 100) echo " selected";
                            } ?> >50</option>

                          </select>
                        </span>
                    <?php
                    $link = $linkFirst . "?" . ($search != "" ? "&search=" . $search : "") . ($limit != 1 ? "&limit=" . $limit : "");
                    $this->create_table_nav_page($search, $page, $limit, $link);
                    ?>
                </div> -->
            </div>
            <?php
            $customer = $this->customer->get_customer_table($page, $limit, $search);

            $this->customer_view->create_table_customer($customer);

            ?>
            <div class="container-fluid">
                <!-- <div class="form-inline">
                        <span class="product-number">
                          <span class="_text">Number Customer in page </span>
                          <select class="_size form-control" name="limit"
                                  onchange="location = '<?php echo $linkFirst; ?>?limit='+this.options[this.selectedIndex].value+'<?php
                                  echo $search != "" ? "&search=" . $search : "";
                                  echo $page != 1 ? "&page=" . $page : "";
                                  echo "';";
                                  ?>">
                            <option value="10"<?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 10) echo " selected";
                            } ?> >10</option>

                            <option value="50" <?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 50) echo " selected";
                            } ?> >30</option>

                            <option value="100" <?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 100) echo " selected";
                            } ?> >50</option>

                          </select>
                        </span>
                    <?php
                    $link = $linkFirst . "?" . ($search != "" ? "&search=" . $search : "") . ($limit != 1 ? "&limit=" . $limit : "");
                    $this->create_table_nav_page($search, $page, $limit, $link);
                    ?>
                </div> -->
            </div>
        </form>
        <?php
    }

    /**
     * @return customer
     */
    public function create_form_edit($id)
    {
//        update
        if (isset($_POST['save'])) {

            $this->update_customer($_POST['customer-id'], $_POST['customer-name'], $_POST['customer-gender'], $_POST['customer-address'], $_POST['customer-phone'], $_POST['customer-email'], $_POST['customer-typeid'],"");
        }

        ?>
        <div class="row">
            <div class='col-md-5 col-xs-6'>
                <form action="#" method="post" enctype="multipart/form-data">
                    <?php
                    if ($this->customer->exits_customer($id)) {
                        $customer = $this->customer->get_customer_id($id);
                        $this->customer_view->create_form_edit($customer);
                    } else echo "customer not exits.";
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

            $this->insert_customer($_POST['customer-name'], $_POST['customer-gender'], $_POST['customer-address'], $_POST['customer-phone'], $_POST['customer-email'], $_POST['customer-typeid'],"");
        }
        ?>
        <div class="row">
            <div class='col-md-5 col-xs-6'>
                <form action="#" method="post" enctype="multipart/form-data">
                    <?php
                    $this->customer_view->create_form_add_new();
                    ?>
                </form>
            </div>
        </div>
        <?php
    }

    public function update_customer($id, $name, $gender, $address, $phone, $email, $typeID, $useID)
    {
        if ($this->customer->exits_customer($id)) {
            $result = $this->customer->update_customer($id, $name, $gender, $address, $phone, $email, $typeID, $useID);
            $this->customer_view->update_alert($result, $id);
        }
    }

    public function insert_customer($name, $gender, $address, $phone, $email, $typeID, $useID)
    {
        if (!$this->customer->exits_customer_name($name)) {
            $result = $this->customer->insert_customer($name, $gender, $address, $phone, $email, $typeID, $useID);
            $this->customer_view->insert_alert($result);
        } else {
            echo "<div class='alert alert-danger alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                  customer name = " . $name . " exits.
             </div>
            ";
        }
    }

    public function delete_customer($id)
    {
        if ($this->customer->exits_customer($id)) {
            $result = $this->customer->delete_customer($id);
            $this->customer_view->delete_alert($result, $id);
        }
    }

    public function delete_customer_multiple($array)
    {
        $total = count($array);
        $deleted = 0;
        for ($i = 0; $i < $total; $i++) {
//            var_dump($array[$i]);
            if ($this->customer->exits_customer($array[$i])) {
                $result = $this->customer->delete_customer($array[$i]);
                if ($result) $deleted++;
            }
        }
        $this->customer_view->delete_alert_multiple($deleted, $total);
    }
}
