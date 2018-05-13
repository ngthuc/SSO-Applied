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
require_once "controller/manage_supplier_controller.php";

$manageSupplier = new manage_supplier_controller();
?>
<!DOCTYPE html>
<html lang="en">

<?php
create_header("Manage Supplier");
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php create_navbar("Manage Supplier");?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="manage-supplier.php">Manage Supplier</a>
            </li>
            <li class="breadcrumb-item active">Suppliers</li>
        </ol>
<!--        code here-->
        <?php
        $linkFirst ="manage-supplier.php";
        $manageSupplier->create_form_manage($linkFirst);
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
</body>

</html>
