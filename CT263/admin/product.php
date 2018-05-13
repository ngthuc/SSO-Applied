<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/9/2017
 * Time: 11:17 PM
 */


require "function/navbar.php";
require "function/footer.php";
require "function/logout.php";
require_once "function/header.php";
require_once "controller/manage_product_controller.php";

?>
<!DOCTYPE html>
<html lang="en">
<?php
create_header("Edit Product");

$manageProduct = new manage_product_controller();
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php create_navbar("Manage Product");?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="manage-product.php">Manage Product</a>
            </li>
            <li class="breadcrumb-item active"><?php if(isset($_GET['id'])) $manageProduct->name_product($_GET['id']); ?></li>
        </ol>
        <!--        code here-->
        <?php
        $manageProduct->edit_product_view($_GET['id']);
        ?>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php create_footer();?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php create_logout();?>
</div>

<script src="vendor/ckeditor/ckeditor.js"></script>
</body>

</html>