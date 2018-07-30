<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/10/2017
 * Time: 11:45 AM
 */

require_once "module/staff.php";
require_once "view/staff_view.php";

class manage_staff_controller
{
    private $staff, $staff_view;

    public function __construct()
    {
        $this->staff = new staff();
        $this->staff_view = new staff_view();
    }

    public function create_table($page, $limit, $search)
    {
        $array = $this->staff->get_staff($page, $limit, $search);
        $this->staff_view->create_table_staff($array);
    }

    public function create_table_nav_page($search, $page, $limit, $link)
    {

//        var_dump($this->product->get_total_product());
        $this->staff_view->create_table_nav_page($page, $this->staff->get_total_staff($search), $limit, $link);
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
                $this->delete_staff($id);
            }
        }

        //Delete multiple products
//        var_dump(isset($_POST['delete-multiple']));
//        var_dump(isset($_POST['check-staff']));
        if (isset($_POST['delete-multiple']) && isset($_POST['check-staff'])) {
            $array = array();
            $cnt = count($_POST['check-staff']);
            for ($i = 0; $i < $cnt; $i++) {
                $del_id = $_POST['check-staff'][$i];
//                var_dump($_POST['check-staff'][$i]);
                $array[] = $del_id;
            }
            $this->delete_staff_multiple($array);
//            var_dump("Delete multiple");
        }


        ?>

        <form action="#" method="post" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group mr-4">
                        <a class="btn btn-primary text-white" href="staff.php?action=new">
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
                          <span class="_text">Number Staff in page </span>
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
            $staff = $this->staff->get_staff_table($page, $limit, $search);

            $this->staff_view->create_table_staff($staff);

            ?>
            <div class="container-fluid">
                <div class="form-inline">
                        <span class="product-number">
                          <span class="_text">Number Staff in page </span>
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
     * @return staff
     */
    public function create_form_edit($id)
    {
//        update
        if (isset($_POST['save'])) {

            $this->update_staff($_POST['staff-id'], $_POST['staff-name'], $_POST['staff-address'], $_POST['staff-phone'], $_POST['staff-email'], $_POST['staff-managerid'],"");
        }

        ?>
        <div class="row">
            <div class='col-md-5 col-xs-6'>
                <form action="#" method="post" enctype="multipart/form-data">
                    <?php
                    if ($this->staff->exits_staff($id)) {
                        $staff = $this->staff->get_staff_id($id);
                        $this->staff_view->create_form_edit($staff);
                    } else echo "staff not exits.";
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

            $this->insert_staff($_POST['staff-name'], $_POST['staff-name'], $_POST['staff-address'], $_POST['staff-phone'], $_POST['staff-email'], $_POST['staff-managerid'],"");
        }
        ?>
        <div class="row">
            <div class='col-md-5 col-xs-6'>
                <form action="#" method="post" enctype="multipart/form-data">
                    <?php
                    $this->staff_view->create_form_add_new();
                    ?>
                </form>
            </div>
        </div>
        <?php
    }

    public function update_staff($id, $name, $address, $phone, $email, $managerID, $useID)
    {
        if ($this->staff->exits_staff($id)) {
            $result = $this->staff->update_staff($id, $name, $address, $phone, $email, $managerID, $useID);
            $this->staff_view->update_alert($result, $id);
        }
    }

    public function insert_staff($name, $address, $phone, $email, $managerID, $useID)
    {
        if (!$this->staff->exits_staff_name($name)) {
            $result = $this->staff->insert_staff($name, $address, $phone, $email, $managerID, $useID);
            $this->staff_view->insert_alert($result);
        } else {
            echo "<div class='alert alert-danger alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                  staff name = " . $name . " exits.
             </div>
            ";
        }
    }

    public function delete_staff($id)
    {
        if ($this->staff->exits_staff($id)) {
            $result = $this->staff->delete_staff($id);
            $this->staff_view->delete_alert($result, $id);
        }
    }

    public function delete_staff_multiple($array)
    {
        $total = count($array);
        $deleted = 0;
        for ($i = 0; $i < $total; $i++) {
//            var_dump($array[$i]);
            if ($this->staff->exits_staff($array[$i])) {
                $result = $this->staff->delete_staff($array[$i]);
                if ($result) $deleted++;
            }
        }
        $this->staff_view->delete_alert_multiple($deleted, $total);
    }    
}