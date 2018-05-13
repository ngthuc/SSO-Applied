<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 10/28/2017
 * Time: 1:29 PM
 */
require "function/navbar.php";
require "function/footer.php";
require "function/logout.php";
require_once "function/header.php";
//require "module/DB.php";
require "controller/manage_product_controller.php";
require "controller/manage_category_controller.php";
require "controller/manage_supplier_controller.php";

?>
<!DOCTYPE html>
<html lang="en">
<?php
create_header("Manage Product");
?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php create_navbar("Manage Product"); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="manage-product.php">Manage Product</a>
            </li>
            <li class="breadcrumb-item active">Products</li>
        </ol>
        <?php

        $linkFirst = "manage-product.php";
        $manage_product = new manage_product_controller();
        $manage_category = new manage_category_controller();
        $manage_supplier = new manage_supplier_controller();

        $limit = 10;
        $category = "All";
        $supplier = "All";
        $search = "";
        $page = 1;

        if (isset($_GET['limit']))
            $limit = $_GET['limit'];
        if (isset($_GET['category']))
            $category = $_GET['category'];
        if (isset($_GET['supplier']))
            $supplier = $_GET['supplier'];
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
                $manage_product->delete_product($id);
            }
        }

        //Delete multiple products
        if(isset($_POST['delete-multiple']) && isset($_POST['check-product']))
        {
            $array= array();
            $cnt=count($_POST['check-product']);
            for($i=0;$i<$cnt;$i++)
            {
                $del_id=$_POST['check-product'][$i];
                $array[] = $del_id;
            }
            $manage_product->delete_product_multiple($array);
        }

        //Quick edit product update
        if (isset($_POST['save'])) {
//            echo "id " . $_POST['id-product'] . "| name " . $_POST['name-product'] . "| code " . $_POST['product-code'] . "| price " . $_POST['product-price'] . "| supplier " . $_POST['product-supplier'] . "| category " . $_POST['product-category'] . "" . $_POST['save'] . "| file " . $_POST['fileToUpload'] . "";
            if (isset($_FILES['fileToUpload'])) {
                // Nếu file upload không bị lỗi,
                // Tức là thuộc tính error > 0
//                var_dump($_FILES['fileToUpload'] != "");
                if ($_FILES['fileToUpload']['name'] != "") {
                    $uploadOk = 1;
                    $imageFileType = pathinfo('../images/image/product/' . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION);

                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif") {
                        echo "<div class='alert alert-danger alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                              Sorry, only JPG, JPEG, PNG & GIF files are allowed.
                         </div>
                        ";
                        $uploadOk = 0;
                    }
                    if ($_FILES['fileToUpload']['error'] < 0 && $uploadOk == 0) {
                        echo "<div class='alert alert-danger alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                              Sorry, your file was not uploaded.
                         </div>
                        ";
                    } else {
                        // Upload file
                        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], '../images/image/product/' . $_FILES['fileToUpload']['name'])) {
                            echo "<div class='alert alert-success alert-dismissable'>
                                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                                  The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.
                              </div>
                            ";
                        } else {
                            echo "<div class='alert alert-danger alert-dismissable'>
                                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                                  Sorry, there was an error uploading your file.
                             </div>
                            ";
                        }
                    }
                }
            } else {
                echo "<div class='alert alert-danger alert-dismissable'>
                                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                                  No file chosen.
                             </div>
                            ";
            }

            $manage_product->update_product($_POST['id-product'], $_POST['name-product'], $_POST['product-code'], $_FILES['fileToUpload']['name'], "", "", $_POST['product-price'], $_POST['product-category'], $_POST['product-discount'], $_POST['product-supplier'], "");
        }

        ?>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group">
                        <a class="btn btn-primary text-white" href="add-new-product.php">
                            <span class="fa fa-plus"></span> Add new
                        </a>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-danger ml-1 text-white" type="submit" name="delete-multiple">
                            <span class="fa fa-remove"></span> Delete</button>
                    </div>

                    <div class="filter-form form-group form-inline ">
                        <div class="input-group form-group ml-4">
                            <span class="input-group-addon">Category</span>
                            <select class="form-control" name="category" id="product-category-filter"
                                    onchange="location = '<?php echo $linkFirst; ?>?category='+this.options[this.selectedIndex].value+'<?php
                                    echo $limit != 0 ? "&limit=" . $limit : "";
                                    echo $supplier != "All" ? "&supplier=" . $supplier : "";
                                    echo $search != "" ? "&search=" . $search : "";
                                    echo $page != 1 ? "&page=" . $page : "";
                                    echo "';";
                                    ?>">
                                <?php
                                $manage_category->create_option($category, false);
                                ?>
                            </select>
                        </div>
                        <div class="input-group form-group ml-2">
                            <span class="input-group-addon">Supplier</span>
                            <select class="form-control" name="supplier" id="product-supplier-filter"
                                    onchange="location = '<?php echo $linkFirst; ?>?supplier='+this.options[this.selectedIndex].value+'<?php
                                    echo $limit != 0 ? "&limit=" . $limit : "";
                                    echo $category != "All" ? "&category=" . $category : "";
                                    echo $search != "" ? "&search=" . $search : "";
                                    echo $page != 1 ? "&page=" . $page : "";
                                    echo "';";
                                    ?>">
                                <?php
                                $manage_supplier->create_option($supplier, false);
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="search-form form-group form-inline ml-auto">
                        <div class="input-group ">
                            <input type="text" class="form-control" id="search-text" name="search" placeholder="<?php echo $search!=""?$search:"Search" ?>">
                            <span class="input-group-btn">
                                <?php
                                if($search != "") {
                                    $link = $linkFirst . "?" . ($category != "All" ? "&category=" . $category : "") . ($supplier != "All" ? "&supplier=" . $supplier : "") . ($limit != 1 ? "&limit=" . $limit : ""). ($page!=1?"&page=".$page:"");
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

                <div class="container-fluid">
                    <div class="form-inline">
                        <span class="product-number">
                          <span class="_text">Number Products in page</span>
                          <select class="_size form-control" name="limit"
                                  onchange="location = '<?php echo $linkFirst; ?>?limit='+this.options[this.selectedIndex].value+'<?php
                                  echo $category != "All" ? "&category=" . $category : "";
                                  echo $supplier != "All" ? "&supplier=" . $supplier : "";
                                  echo $search != "" ? "&search=" . $search : "";
                                  echo $page != 1 ? "&page=" . $page : "";
                                  echo "';";
                                  ?>">
                            <option value="10"<?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 10) echo " selected";
                            } ?> >10</option>

                            <option value="50" <?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 50) echo " selected";
                            } ?> >50</option>

                            <option value="100" <?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 100) echo " selected";
                            } ?> >100</option>

                          </select>
                        </span>
                        <?php
                        $link = $linkFirst . "?" . ($category != "All" ? "&category=" . $category : "") . ($supplier != "All" ? "&supplier=" . $supplier : "") . ($search != "" ? "&search=" . $search : "") . ($limit != 1 ? "&limit=" . $limit : "");
                        $manage_product->create_table_nav_page($category, $supplier, $search, $page, $limit, $link);
                        ?>
                    </div>
                </div>

                <?php
                //CREATE TABLE PRODUCT
                $manage_product->create_table($category, $supplier, $page, $limit, $search);
                ?>
                <div class="container-fluid">
                    <div class="form-inline">
                        <span class="product-number">
                          <span class="_text">Number Products in page</span>
                          <select class="_size form-control" name="limit"
                                  onchange="location = '<?php echo $linkFirst; ?>?limit='+this.options[this.selectedIndex].value+'<?php
                                  echo $category != "All" ? "&category=" . $category : "";
                                  echo $supplier != "All" ? "&supplier=" . $supplier : "";
                                  echo $search != "" ? "&search=" . $search : "";
                                  echo $page != 1 ? "&page=" . $page : "";
                                  echo "';";
                                  ?>">
                            <option value="10"<?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 10) echo " selected";
                            } ?> >10</option>

                            <option value="50" <?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 50) echo " selected";
                            } ?> >50</option>

                            <option value="100" <?php if (isset($_GET['limit'])) {
                                if ($_GET['limit'] == 100) echo " selected";
                            } ?> >100</option>

                          </select>
                        </span>
                        <?php
                        $link = $linkFirst . "?" . ($category != "All" ? "&category=" . $category : "") . ($supplier != "All" ? "&supplier=" . $supplier : "") . ($search != "" ? "&search=" . $search : "") . ($limit != 1 ? "&limit=" . $limit : "");
                        $manage_product->create_table_nav_page($category, $supplier, $search, $page, $limit, $link);
                        ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php create_footer(); ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php create_logout(); ?>

</div>
</body>

</html>
