<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/7/2017
 * Time: 1:02 AM
 */

require_once __DIR__."/../module/category.php";
require_once __DIR__."/../module/supplier.php";
require_once __DIR__."/category_view.php";
require_once __DIR__."/supplier_view.php";

class product_view
{
    public function create_table_product($product)
    {
        $_category = new category();
        $_supplier = new supplier();
        $_category_view = new category_view();
        $_supplier_view = new supplier_view();
        ?>
        <div id="table-product">
            <table class="table table-hover" id="accordion" data-children=".product">
                <thead>
                <tr>
                    <th style="width: 20px">
                        <input id="check-all" class='checkbox-style' type='checkbox'>
                    </th>
                    <th class="img-th">
                        <span class="fa fa-image"></span>
                    </th>
                    <th>Name</th>
                    <th>Product Code</th>
                    <th>Price</th>
                    <th>Categlory</th>
                    <th>Supplier</th>
                </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($product)) {

                    $image = "image/wine.png";
                    if ($row['IMAGE'] != "") {
                        $image = $row['IMAGE'];
                    }
                    echo "
                <tbody class='product'>
                <tr class='product-row' id='product-" . $row['ID'] . "'>
                    <td>
                        <input class='checkbox-style' type='checkbox' name='check-product[]' value='" . $row['ID'] . "'>
                    </td>
                    <td>
                        <div class='img-layout'>
                            <img class='img-product' src='../images/image/product/" . $image . "' alt=''>
                        </div>
                    </td>
                    <td class='name-product'>
                        <strong>
                            <a href='product.php?id=" . $row['ID'] . "'>" . $row['NAME'] . "</a>
                        </strong>
                        <div class='row-action'>
                            <span class='id'>ID:" . $row['ID'] . " |</span>
                            <span class='edit'>
                        <a href='product.php?id=" . $row['ID'] . "'>Edit</a> |</span>
                            <span class='quick-edit'>
                        <a data-toggle='collapse' data-parent='#accordion' href='#edit-" . $row['ID'] . "'>Quick Edit</a> |</span>
                            <span class='delete'>
                        <a href='manage-product.php?action=delete&id=" . $row['ID'] . "'>Delete</a> |</span>
                            <span class='preview'>
                        <a href='#'>Preview</a>
                      </span>
                        </div>
                    </td>
                    <td>" . $row['PRODUCT_ID'] . "</td>
                    <td>" . $row['PRICE'] . "</td>
                    <td>" . $_category->get_name($row['CATEGORY_ID']) . "</td>
                    <td>" . $_supplier->get_name($row['SUPPLIER_ID']) . "</td>
                </tr>
                <tr id='edit-" . $row['ID'] . "' class='collapse product-change'>
                    <td colspan='8'>
                       <form action='#' method='post'  enctype=\"multipart/form-data\">
                        <div class='container-fluid'>
                            <div class='row'>
                                <h5> Quick Edit</h5>                                
                            </div>
                         
                            <div class='row'>
                                <div class='col-md-4 col-xs-6'>
                                    <div class='input-group form-group'>
                                        <span class='input-group-addon input-group-addon-label'>ID</span>
                                        <input class='form-control' id='id-product' name='id-product' type='text' value=\"" . $row['ID'] . "\" placeholder=\"" . $row['ID'] . "\" readonly>
                                    </div>
                                    <div class='input-group form-group'>
                                        <span class='input-group-addon input-group-addon-label'>Name</span>
                                        <input class='form-control' id='name-product' name='name-product' type='text' placeholder=\"" . $row['NAME'] . "\">
                                    </div>
                                    <div class='input-group form-group'>
                                        <span class='input-group-addon input-group-addon-label'>Product code</span>
                                        <input class='form-control' id='product-code' name='product-code' type='text' value=\"" . $row['PRODUCT_ID'] . "\" placeholder=\"" . $row['PRODUCT_ID'] . "\" readonly>
                                    </div>
                                    <div class='input-group form-group'>
                                        <span class='input-group-addon input-group-addon-label'>Price</span>
                                        <input class='form-control' id='product-price' name='product-price' type='text' placeholder=\"" . $row['PRICE'] . "\">
                                        <span class='input-group-addon'>$</span>
                                    </div>
                                    <div class='input-group form-group'>
                                        <span class='input-group-addon input-group-addon-label'>Discount</span>
                                        <input class='form-control' id='product-discount' name='product-discount' type='text' placeholder=\"" . $row['DISCOUNT'] . "\">
                                        <span class='input-group-addon'>%</span>
                                    </div>
                                </div>
                                <div class='col-md-4 col-xs-6'>
                                    <div class='input-group form-group'>
                                        <span class='input-group-addon input-group-addon-label'>Supplier</span>
                                        <select class='form-control' name='product-supplier' id='product-supplier'>
                                            ";
                    $_supplier_view->create_option($_supplier->get_supplier(), $row['SUPPLIER_ID'], true);
                    echo "
                                        </select>
                                    </div>
                                    <div class='input-group form-group'>
                                        <span class='input-group-addon input-group-addon-label'>Category</span>
                                        <select class='form-control' name='product-category' id='product-category'>
                                            ";
                    $_category_view->create_option($_category->get_category(), $row['CATEGORY_ID'], true);
                    echo "
                                        </select>
                                    </div>
                                </div>
                                <div class='col-md-4 col-xs-6'>
                                    <div class='img-product'>
                                        Image Product
                                        <br>                                        
                                        <div class='img-product-show'>
                                            <img id= 'img-product-upload' src='../images/image/product/" . $image . "' alt='product-image' width='124px' height='124px' >     
                                        </div>          
                                        <div class='inline-flex mt-3'>            
                                        <input type='file' name='fileToUpload' id='uploadBtn'>
                                        <a id='cancel-upload' class='btn btn-danger text-white' ><span class=\"fa fa-remove\"></span></a>
                                        <input id='old-url' value='../images/image/product/" . $image . "' type='hidden'>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class='row'>
                                <a id='cancel-change' class='btn btn-secondary ml-3' data-toggle='collapse' data-target='#edit-" . $row['ID'] . "'
                                   href='#product-" . $row['ID'] . "'>Cancel</a>
                                <button class='btn btn-primary ml-auto mr-3' name='save' type='submit'>Save</button>
                            </div>
                        </div>
                        </form>
                    </td>
                </tr>
                </tbody>";
                    ?>


                    <?php
                }
                ?>
            </table>
        </div>
        <?php
    }

    public function create_table_nav_page($currentPage, $totalProduct, $limit, $link)
    {
        $totalPage = ceil($totalProduct/$limit);
        $totalPage = $totalPage<0?1:$totalPage;
//        $totalPage = 5;
        $currentPage = $currentPage>$totalPage?1:$currentPage;

        ?>
        <nav class='ml-auto'>
            <ul class='pagination justify-content-end'>
                <?php
                if ($currentPage > 1) {
                    echo "<li class='page-item'>
                            <a class='page-link' href='" . $link . "&page=" . ($currentPage - 1)."'><span class='fa fa-chevron-left'></span></a>
                        </li>";
                }

//                Create page layout

                if (($currentPage - 1) < 3 && $currentPage !=1) {
                    echo "<li class='page-item " . ($currentPage == 1 ? " disabled" : "" ). "'>
                        <a class='page-link' href='" . $link . "&page=1'>1</a>
                    </li>";
                } else if (($currentPage - 1) > 1) {
                    echo "<li class='page-item'>
                        <a class='page-link' href='" . $link . "&page=1'>1</a>
                    </li>
                    <li class='page-item disabled'>
                        <a class='page-link' href='#'>...</a>
                    </li>";
                }

                    if(($currentPage -1) - 1 > 0){
                        echo "<li class='page-item'>
                            <a class='page-link' href='" . $link . "&page=" . ($currentPage-1)."'>" . ($currentPage-1)."</a>
                        </li>";
                    }
                    echo "<li class='page-item disabled'>
                            <a class='page-link' href='" . $link . "&page=" . ($currentPage)."'>" . ($currentPage)."</a>
                        </li>";
                    if($totalPage - ($currentPage + 1) > 0){
                        echo "<li class='page-item '>
                            <a class='page-link' href='" . $link . "&page=" . ($currentPage+1)."'>" . ($currentPage+1)."</a>
                        </li>";
                    }
                if(($totalPage - ($currentPage + 1))>=0) {
                    if (($totalPage - ($currentPage + 1)) < 2 && $currentPage != $totalPage) {
                        echo "<li class='page-item " . ($currentPage == $totalPage ? " disabled" : "") . "'>
                        <a class='page-link' href='" . $link . "&page=" . $totalPage . "'>" . $totalPage . "</a>
                    </li>";
                    } else if (($totalPage - ($currentPage + 1)) > 1) {
                        echo "<li class='page-item disabled'>
                        <a class='page-link' href='#'>...</a>
                    </li>
                    <li class='page-item'>
                        <a class='page-link' href='" . $link . "&page=" . $totalPage . "'>" . $totalPage . "</a>
                    </li>";
                    }
                }
                if ($currentPage < $totalPage && $totalPage > 1) {
                    echo "<li class='page-item'>
                            <a class='page-link' href='" . $link . "&page=" . ($currentPage + 1)."'><span class='fa fa-chevron-right'></span></a>
                        </li>";
                }
                ?>
            </ul>
        </nav>
        <?php
    }

    public function update_alert($result, $id){
        if ($result){
            echo "
                    <div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Success!</strong> Update success product id = " . $id .
                "</div>
                ";
        }else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Update not success product id = " . $id .
                "</div>
                ";
        }
    }
    public function delete_alert($result, $id){
        if ($result){
            echo "
                    <div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Success!</strong> Delete product id = " . $id ." success
                      </div>
                ";
        }else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete product id = " . $id ." not success
                      </div>
                ";
        }
    }
    public function insert_alert($result){
        if ($result){
            echo "
                    <div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Success!</strong> Add new product success
                      </div>
                ";
        }else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Add new product not success
                      </div>
                ";
        }
    }
    public function delete_alert_multiple($deleted, $total){
        if ($total-$deleted == 0){
            echo "
                    <div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Success!</strong> Delete ".$total." products success
                      </div>
                ";
        }else if($total-$deleted > 0){
            echo "
                    <div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Success!</strong> Delete ".$deleted." products success
                      </div>
                ";
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete ".$total-$deleted." products not success
                      </div>
                ";
        }else {
            echo "
                    <div class='alert alert-Danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
                      <strong>Error!</strong> Delete ".$total." products not success
                      </div>
                ";
        }
    }
    public function create_form_add_new(){$_category = new category();
        $_supplier = new supplier();
        $_category_view = new category_view();
        $_supplier_view = new supplier_view();
        ?>
        <form action="#" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-9">
            <div class='input-group form-group'>
              <span class='input-group-addon input-group-addon-label'>Name</span>
              <input class='form-control' id='name-product' name='name-product' type='text' maxlength='30' placeholder=''>
            </div>
            <div class='input-group form-group'>
              <span class='input-group-addon input-group-addon-label'>Product code</span>
              <input class='form-control' id='product-code' name='product-code' type='text' maxlength='6' required>
            </div>
            <div class="col-md-6 pl-0">
              <div class='input-group form-group'>
                <span class='input-group-addon input-group-addon-label'>Price</span>
                <input class='form-control' id='product-price' name='product-price' type='text' placeholder='' ''>
                <span class='input-group-addon'>$</span>
              </div>
              <div class='input-group form-group'>
                <span class='input-group-addon input-group-addon-label'>Discout</span>
                <input class='form-control' id='product-discount' name='product-discount' type='text' placeholder=''>
                <span class='input-group-addon'>%</span>
              </div>
              <div class='input-group form-group'>
                <span class='input-group-addon input-group-addon-label'>Volume</span>
                <input class='form-control' id='product-volume' name='product-volume' type='text' placeholder=''>
                <span class='input-group-addon'>mL</span>
              </div>
              <div class='input-group form-group'>
                <span class='input-group-addon input-group-addon-label'>ABV</span>
                <input class='form-control' id='product-abv' name='product-abv' type='text' placeholder=''>
                <span class='input-group-addon'>°</span>
              </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label'>Category</span>
                    <select class='form-control' name='product-category' id='product-category'>
                        <?php
                        $_category_view->create_option($_category->get_category(), "", true);
                        ?>
                    </select>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label'>Supplier</span>
                    <select class='form-control' name='product-supplier' id='product-supplier'>
                        <?php
                        $_supplier_view->create_option($_supplier->get_supplier(), "", true);
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
              <label for="description">Discription:</label>
              <textarea class="form-control" rows="30" id="product-description" name="product-description"></textarea>
                <script>

                    $(document).ready(function(e) {
                        CKEDITOR.replace('product-description');
                    });

                </script>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card mb-4">
              <div class="card-header">
        Add New Product
        </div>
              <div class='card-body m-auto'>
                <a class="btn btn-secondary mr-4 text-white" href='manage-product.php'><span class="fa fa-remove" ></span> Cancel</a>
                <button class="btn btn-primary" type="submit" name="add-new"><span class="fa fa-plus"></span> Add</button>
              </div>
            </div>
            <div class='card'>
              <div class="card-header">
        Image Product
        </div>
              <div class="card-body img-product">
                <div class='img-product-show'>
                  <img id='img-product-upload' src='image/wine.png' alt='product-image' width='124px' height='124px'>
                </div>
                <div class="inline-flex mt-3">
                <input type='file' name='fileToUpload' id='uploadBtn'>
                <a id='cancel-upload' class='btn btn-danger text-white'>
                  <span class='fa fa-remove'></span>
                </a>
                <input id='old-url' value='/image/wine.png' type='hidden'>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
<?php
    }
    public function create_form_edit_new($product){
        $_category = new category();
        $_supplier = new supplier();
        $_category_view = new category_view();
        $_supplier_view = new supplier_view();
        $row = mysqli_fetch_assoc($product);
        ?>
        <form action="#" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-9">
             <div class='input-group form-group'>
              <span class='input-group-addon input-group-addon-label'>ID</span>
              <input class='form-control' id='id-product' name='id-product' type='text' value='<?php echo $row['ID'] ?>', readonly>
             </div>
            <div class='input-group form-group'>
              <span class='input-group-addon input-group-addon-label'>Name</span>
              <input class='form-control' id='name-product' name='name-product' type='text' maxlength='30' value='<?php echo $row['NAME']; ?>'>
            </div>
            <div class='input-group form-group'>
              <span class='input-group-addon input-group-addon-label'>Product code</span>
              <input class='form-control' id='product-code' name='product-code' type='text' maxlength='6' value='<?php echo $row['PRODUCT_ID']; ?>' required>
            </div>
            <div class="col-md-6 pl-0">
              <div class='input-group form-group'>
                <span class='input-group-addon input-group-addon-label'>Price</span>
                <input class='form-control' id='product-price' name='product-price' type='text' value='<?php echo $row['PRICE']; ?>' >
                <span class='input-group-addon'>$</span>
              </div>
              <div class='input-group form-group'>
                <span class='input-group-addon input-group-addon-label'>Discout</span>
                <input class='form-control' id='product-discount' name='product-discount' type='text' value='<?php echo $row['DISCOUNT']; ?>'>
                <span class='input-group-addon'>%</span>
              </div>
              <div class='input-group form-group'>
                <span class='input-group-addon input-group-addon-label'>Volume</span>
                <input class='form-control' id='product-volume' name='product-volume' type='text' value='<?php echo $row['VOLUME']; ?>'>
                <span class='input-group-addon'>mL</span>
              </div>
              <div class='input-group form-group'>
                <span class='input-group-addon input-group-addon-label'>ABV</span>
                <input class='form-control' id='product-abv' name='product-abv' type='text' value='<?php echo $row['ABV']; ?>'>
                <span class='input-group-addon'>°</span>
              </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label'>Category</span>
                    <select class='form-control' name='product-category' id='product-category'>
                        <?php
                        $_category_view->create_option($_category->get_category(), $row['CATEGORY_ID'], true);
                        ?>
                    </select>
                </div>
                <div class='input-group form-group'>
                    <span class='input-group-addon input-group-addon-label'>Supplier</span>
                    <select class='form-control' name='product-supplier' id='product-supplier'>
                        <?php
                        $_supplier_view->create_option($_supplier->get_supplier(), $row['SUPPLIER_ID'], true);
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
              <label for="description">Discription:</label>
              <textarea class="form-control" rows="30" id="product-description" name="product-description"><?php echo $row['DICRIPTION']; ?></textarea>
                <script>

                    $(document).ready(function(e) {
                        CKEDITOR.replace('product-description');
                    });

                </script>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card mb-4">
              <div class="card-header">
        Add New Product
        </div>
              <div class='card-body m-auto'>
                <a class="btn btn-secondary mr-4 text-white" href='manage-product.php'><span class="fa fa-remove" ></span> Cancel</a>
                <button class="btn btn-primary" type="submit" name="save"><span class="fa fa-save"></span> Save</button>
              </div>
            </div>
            <div class='card'>
              <div class="card-header">
        Image Product
        </div>
              <div class="card-body img-product">
                <div class='img-product-show'>
                  <img id='img-product-upload' src='../images/image/product/<?php echo $row['IMAGE']; ?>' alt='product-image' width='124px' height='124px'>
                </div>
                <div class="inline-flex mt-3">
                <input type='file' name='fileToUpload' id='uploadBtn'>
                <a id='cancel-upload' class='btn btn-danger text-white'>
                  <span class='fa fa-remove'></span>
                </a>
                <input id='old-url' value='../images/image/product/<?php echo $row['IMAGE']; ?>' type='hidden'>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
<?php
    }
}