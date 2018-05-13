<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/7/2017
 * Time: 8:12 AM
 */

require_once __DIR__."/../module/category.php";
require_once __DIR__."/../view/category_view.php";

class manage_category_controller
{
    private $category, $category_view;

    public function __construct()
    {
        $this->category = new category();
        $this->category_view = new category_view();
    }

    public function create_option($select, $add)
    {
        $array = $this->category->get_category();
        $this->category_view->create_option($array, $select, $add);
    }

    public function create_table_nav_page($search, $page, $limit, $link){

//        var_dump($this->product->get_total_product());
        $this->category_view->create_table_nav_page($page, $this->category->get_total_category($search), $limit, $link);
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
                $this->delete_category($id);
            }
        }

        //Delete multiple products
//        var_dump(isset($_POST['delete-multiple']));
//        var_dump(isset($_POST['check-category']));
        if(isset($_POST['delete-multiple']) && isset($_POST['check-category']))
        {
            $array= array();
            $cnt=count($_POST['check-category']);
            for($i=0;$i<$cnt;$i++)
            {
                $del_id=$_POST['check-category'][$i];
//                var_dump($_POST['check-category'][$i]);
                $array[] = $del_id;
            }
            $this->delete_category_multiple($array);
//            var_dump("Delete multiple");
        }

//        add new
        if (isset($_POST['add-new'])) {

            $this->insert_category($_POST['category-name'], $_POST['category-code'], $_POST['category-description']);
        }

//        update
        if (isset($_POST['save'])) {

            $this->update_category($_POST['category-id'], $_POST['category-name'], $_POST['category-code'], $_POST['category-description']);
        }

        ?>

        <div class="row">
            <div class='col-md-5 col-xs-6'>
                <form action="#" method="post" enctype="multipart/form-data">
                    <?php

                    if(isset($_GET['action']) && isset($_GET['id'])){
                        if ($_GET['action']=="edit") {
                            $category = $this->category->get_category_id($_GET['id']);
                            $this->category_view->create_form_edit($category);
                        }
                        else {
                            $this->category_view->create_form_add_new();
                        }
                    } else {
                            $this->category_view->create_form_add_new();
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
                          <span class="_text">Number Category in page </span>
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
                    $category = $this->category->get_category_table($page, $limit,$search);

                    $this->category_view->create_table_category($category);

                    ?>
                    <div class="container-fluid">
                        <div class="form-inline">
                        <span class="product-number">
                          <span class="_text">Number Category in page </span>
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

    public function update_category($id, $name, $category_id, $description)
    {
        if($this->category->exits_category($id)) {
            $result = $this->category->update_category($id, $name, $category_id, $description);
            $this->category_view->update_alert($result,$id);
        }
    }
    public function insert_category( $name, $category_id, $description)
    {
        if(!$this->category->exits_category_code($category_id)) {
            $result = $this->category->insert_category($name, $category_id, $description);
            $this->category_view->insert_alert($result);
        } else{
            echo "<div class='alert alert-danger alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                  category id = ".$category_id." exits.
             </div>
            ";
        }
    }
    public function delete_category($id)
    {
        if($this->category->exits_category($id)) {
            $result = $this->category->delete_category($id);
            $this->category_view->delete_alert($result, $id);
        }
    }
    public function delete_category_multiple($array)
    {
        $total = count($array);
        $deleted = 0;
        for($i=0;$i<$total;$i++) {
//            var_dump($array[$i]);
            if ($this->category->exits_category($array[$i])) {
                $result = $this->category->delete_category($array[$i]);
                if ($result) $deleted++;
            }
        }
        $this->category_view->delete_alert_multiple($deleted, $total);
    }

}