<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 10/28/2017
 * Time: 1:29 PM
 */
require "function/header.php";
require "function/navbar.php";
require "function/footer.php";
require "function/logout.php";

?>
<!DOCTYPE html>
<html lang="en">

<?php
create_header("Admin Panel");
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <?php create_navbar("");?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">My Dashboard</li>
            </ol>
            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card o-hidden h-100">
                        <div class="card-header">
                            <i class="fa fa-fw fa-shopping-cart"></i> Store info </div>
                        <div class="card-body">
                            <b>Products:</b> 10
-
                            <b>Category:</b> 10
-
                            <b>Supplier:</b> 10
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5"><b style="font-size: 20pt">10</b> New Orders!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
                    </div>
                </div>
            </div>
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-area-chart"></i> Orders</div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="30"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <!-- Example Bar Chart Card-->
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fa fa-bar-chart"></i> Reveune</div>
                        <div class="card-body">
                            <canvas id="myBarChart" width="100" height="50"></canvas>
                        </div>
                    </div>

                    <!-- /Card Columns-->
                </div>
                <div class="col-lg-4">
                    <!-- Example Pie Chart Card-->
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fa fa-pie-chart"></i> Selling Products</div>
                        <div class="card-body">
                            <canvas id="myPieChart" width="100%" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
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
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="js/sb-admin-datatables.min.js"></script>
        <script src="js/sb-admin-charts.min.js"></script>
    </div>
</body>

</html>
