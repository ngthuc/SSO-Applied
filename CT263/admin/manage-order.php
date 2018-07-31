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
require "function/header.php";

?>
<!DOCTYPE html>
<html lang="en">

<?php
create_header("Admin Panel");
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php create_navbar("Manage Order");?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="manage-order.php">Manage Order</a>
            </li>
            <li class="breadcrumb-item active">Orders</li>
        </ol>
<!--        code here-->

    </div>
<!-- <div id="exTab1" style="margin-left:40px">
  <button type="button" class="btn btn-primary">Mới đặt </button>
  <button type="button" class="btn btn-light">Đang giao</button>
  <button type="button" class="btn btn-light">Đã giao</button>
  <button type="button" class="btn btn-light">Hủy bỏ</button>
  <button type="button" class="btn btn-light">Tất cả hóa đơn</button>


</div> -->
<form action="#" method="post" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="row">
                  <div class="" style="margin-left:50px">
                    <button type="button" class="btn btn-primary">Mới đặt </button>
                    <button type="button" class="btn btn-light">Đang giao</button>
                    <button type="button" class="btn btn-light">Đã giao</button>
                    <button type="button" class="btn btn-light">Hủy bỏ</button>
                    <button type="button" class="btn btn-light">Tất cả hóa đơn</button>
                  </div>



                    <div class="search-form form-group form-inline ml-auto">
                        <div class="input-group ">
                            <input type="text" class="form-control" id="search-text" name="search" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-outline-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                      </button>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="form-inline">
                        <span class="product-number">
                          <span class="_text">Number Products in page</span>
                          <select class="_size form-control" name="limit" onchange="location = 'manage-product.php?limit='+this.options[this.selectedIndex].value+'';">
                            <option value="10">10</option>

                            <option value="50">50</option>

                            <option value="100">100</option>

                          </select>
                        </span>
                                <nav class="ml-auto">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                            <a class="page-link" href="manage-product.php?&amp;limit=10&amp;page=1">1</a>
                        </li>            </ul>
        </nav>
                            </div>
                </div>

                        <div id="table-product">
            <table class="table table-hover" id="accordion" data-children=".product">
                <thead>
                <tr>
                    <th style="width: 20px">
                        <input id="check-all" class="checkbox-style" type="checkbox">
                    </th>
                    <th class="img-th">
                        <span class="fa fa-image"></span>
                    </th>
                    <th>Name Customer</th>
                    <th>Email Customer</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
                </thead>

                <tbody class="product">
                <tr class="product-row" id="product-10">

                </tr>


                </tbody>

                                </table>
        </div>
                        <div class="container-fluid">
                    <div class="form-inline">
                        <span class="product-number">
                          <span class="_text">Number Products in page</span>
                          <select class="_size form-control" name="limit" onchange="location = 'manage-product.php?limit='+this.options[this.selectedIndex].value+'';">
                            <option value="10">10</option>

                            <option value="50">50</option>

                            <option value="100">100</option>

                          </select>
                        </span>
                                <nav class="ml-auto">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                            <a class="page-link" href="manage-product.php?&amp;limit=10&amp;page=1">1</a>
                        </li>            </ul>
        </nav>
                            </div>
                </div>
            </div>

    </form>


</body>

</html>
