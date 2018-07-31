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
require_once "controller/manage_staff_controller.php";

$manage = new manage_staff_controller();
?>
<!DOCTYPE html>
<html lang="en">

<?php
create_header("Manage Supplier");
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php create_navbar("Manage Staff");?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href=manage-staff.php">Manage Staff</a>
            </li>
            <li class="breadcrumb-item active">Staffs</li>
        </ol>
<!--        code here-->
        <?php
        $linkFirst ="manage-staff.php";
        $manage->create_form_manage($linkFirst);
        ?>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php create_footer();?>
</div>
</body>

</html>
