<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/6/2017
 * Time: 7:48 PM
 */

require_once __DIR__."/../module/product.php";
require_once __DIR__."/../view/product_view.php";

class manage_product_controller
{
    private $product;
    private $product_view;
    public function __construct(){
        $this->product = new product();
        $this->product_view = new product_view();
    }
    public function create_table($categrory, $supplier, $page, $number_product, $search){
        $array_product = $this->product->get_product($categrory, $supplier, $page, $number_product, $search);
        $array_categrory = "";
        $this->product_view->create_table_product($array_product);
    }
    public function create_table_nav_page($category, $supplier, $search, $page, $limit, $link){

//        var_dump($this->product->get_total_product());
        $this->product_view->create_table_nav_page($page, $this->product->get_total_product($category, $supplier, $search), $limit, $link);
    }

    /**
     * @return product
     */
    public function update_product($id, $name, $product_id, $image, $volume, $abv, $price, $discount, $category_id, $supplier_id, $discription)
    {
        if($this->product->exits_product($id)) {
            $result = $this->product->update_product($id, $name, $product_id, $image, $volume, $abv, $price, $discount, $category_id, $supplier_id, $discription);
            $this->product_view->update_alert($result,$id);
        }
    }
    public function insert_product( $name, $product_id, $image, $volume, $abv, $price, $discount, $category_id, $supplier_id, $discription)
    {
        if(!$this->product->exits_product_code($product_id)) {
            $result = $this->product->insert_product($name, $product_id, $image, $volume, $abv, $price, $discount, $category_id, $supplier_id, $discription);
            $this->product_view->insert_alert($result);
        } else{
            echo "<div class='alert alert-danger alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                  product code = ".$product_id." exits.
             </div>
            ";
        }
    }
    public function delete_product($id)
    {
        if($this->product->exits_product($id)) {
            $result = $this->product->delete_product($id);
            $this->product_view->delete_alert($result, $id);
        }
    }
    public function delete_product_multiple($array)
    {
        $total = count($array);
        $deleted = 0;
        for($i=0;$i<$total;$i++) {
//            var_dump($array[$i]);
            if ($this->product->exits_product($array[$i])) {
                $result = $this->product->delete_product($array[$i]);
                if ($result) $deleted++;
            }
        }
        $this->product_view->delete_alert_multiple($deleted, $total);
    }

    public function add_new_view(){
        if (isset($_POST['add-new'])) {
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

            $this->insert_product($_POST['name-product'], $_POST['product-code'], $_FILES['fileToUpload']['name'], $_POST['product-volume'], $_POST['product-abv'], $_POST['product-price'], $_POST['product-discount'], $_POST['product-category'], $_POST['product-supplier'], $_POST['product-description']);
        }
        $this->product_view->create_form_add_new();
    }
    public function edit_product_view($id)
    {
        if ($this->product->exits_product($id)) {
            if (isset($_POST['save'])) {
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

                $this->update_product($_POST['id-product'], $_POST['name-product'], $_POST['product-code'], $_FILES['fileToUpload']['name'], $_POST['product-volume'], $_POST['product-abv'], $_POST['product-price'], $_POST['product-discount'], $_POST['product-category'], $_POST['product-supplier'], $_POST['product-description']);
            }
            $product = $this->product->get_product_id($id);
            $this->product_view->create_form_edit_new($product);
        }
    }
    public function name_product($id){
        echo $this->product->name_product($id);
    }
}