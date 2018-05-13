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

require_once "controller/manage_category_controller.php";

$manageCategory = new manage_category_controller();
?>
<!DOCTYPE html>
<html lang="en">
<?php
create_header("Category");
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
            <li class="breadcrumb-item active">
                <a href="category.php">Category</a></li>
        </ol>
        <!--        code here-->
        <?php
        $linkFirst ="category.php";
        $manageCategory->create_form($linkFirst);
        ?>
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

<script src="vendor/ckeditor/ckeditor.js"></script>
<script>
    $(document).ready(function(e) {
        CKEDITOR.replace('category-description');
    });
</script>
</div>
</body>

</html>
