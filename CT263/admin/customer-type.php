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
require_once "controller/manage_customer_type_controller.php";

$manage = new manage_customer_type_controller();
?>
<!DOCTYPE html>
<html lang="en">

<?php
create_header("Manage Cutomer");
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php create_navbar("Manage Customer");?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href=manage-customer.php">Manage customer</a>
            </li>
            <li class="breadcrumb-item active">Customer type</li>
        </ol>
        <!--        code here-->
        <?php
        $linkFirst ="customer-type.php";
        $manage->create_form($linkFirst);
        ?>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php create_footer();?>
</div>

<script src="vendor/ckeditor/ckeditor.js"></script>
<script>
    $(document).ready(function(e) {
        CKEDITOR.replace('customer_type-description');
    });
</script>
</body>

</html>
