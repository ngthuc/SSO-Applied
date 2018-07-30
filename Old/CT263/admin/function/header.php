<?php
/**
 * Created by PhpStorm.
 * User: trana
 * Date: 11/9/2017
 * Time: 7:50 PM
 */
function create_header($name)
{
    session_start();

    if (!isset($_SESSION['role'])) {
        header("location:login.php");
    } else {
        if ($_SESSION['role'] != "Admin") {
            header("location:logout.php");
        }
    }

    echo '<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>' . $name . ' - HTX Store</title>
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
        <!-- Custom styles-->
        <link href="css/style.css" rel="stylesheet">
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
        <script src="js/customAdmin.js"></script>';
    echo "<!-- Using DataTables -->
    <script type='text/javascript'>
    $(document).ready(function () {
        $('.datatables').DataTable({".'
          "language" : {
            "url" : "//cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json"
        }
      });
    });
    </script>';
    echo '</head>';
}
