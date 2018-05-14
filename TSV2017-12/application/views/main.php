<?php
// Check login
$loginStatus = $this->session->userdata('user');
$user = $loginStatus['username'];

// Check role
$sessRole = $this->session->userdata('access');
$_role = $sessRole['rolesGroup'];
$fetchRole = explode(',',$_role);
?>
<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta http-equiv="content-Type" content="text/html; charset=utf-8">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title><?php echo $titlePage; ?></title>
    <meta name="robots" content="INDEX, FOLLOW" />
    <link rel="icon" href="<?php echo base_url('public/images/ctu_logo.gif'); ?>" type="image/png">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <!-- Core CSS in public directory -->
   <link href="<?php echo base_url('public/css/style.css'); ?>" rel="stylesheet">
   <link href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet">
   <link href="<?php echo base_url('public/css/main_style.css'); ?>" rel="stylesheet">
   <link href="<?php echo base_url('public/extensions/font-awesome/4.7.0/css/font-awesome.min.css'); ?>">

   <!-- Core JS in public directory -->
   <script src="<?php echo base_url('public/js/jquery-3.2.1.min.js'); ?>"></script>
   <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
   <script src="<?php // echo base_url('js/main.js'); ?>"></script>

   <!-- DataTable 1.10.16 -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/extensions/DataTables/datatables.min.css'); ?>"/>
   <script type="text/javascript" src="<?php echo base_url('public/extensions/DataTables/datatables.min.js'); ?>"></script>
   <!-- Using DataTables -->
   <script type="text/javascript">
   $(document).ready(function () {
       $('#datatables').DataTable({
         "language" : {
           "url" : "//cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json"
       }
     });
   });
   </script>

   <!-- JSTree 3.3.4 -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/extensions/jstree/dist/themes/default/style.min.css'); ?>"/>
   <script type="text/javascript" src="<?php echo base_url('public/extensions/jstree/dist/jstree.min.js'); ?>"></script>

   <!-- College of ICT - Can Tho University Library -->
   <link href="<?php echo base_url('public/css/cit_main_style.css'); ?>" rel="stylesheet">
   <!-- <link rel="stylesheet" href="<?php echo base_url('public/css/cit_login_style.css'); ?>"/> -->

   <!-- Ho Chi Minh University of Sciences - Viet Nam University, Ho Chi Minh City Library -->
   <link href="<?php echo base_url('public/css/hcmus_common_style.css'); ?>" rel="stylesheet">

   <!-- CSS and JS internal -->
   <style type="text/css">
     body
     {
       background-color: white !important;
     }

     .navbar-toggle
     {
       border-color: black !important;
     }

    .icon-bar
     {
       background-color: black !important;
     }

    .nav a
     {
       color: black !important;
     }
    </style>
</head>
<body id="page-header">
  <!--Menu bar-->
  <nav class="navbar navbar-fixed-top app-menu" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <a href="<?php echo base_url(); ?>"><img class="navbar-left logo-ctu" src="<?php echo base_url('public/images/ctu_logo.gif'); ?>" alt="logo-CTU"></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ctudocsnavbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>"> HỆ THỐNG QUẢN LÝ ĐIỂM DANH </a>
      </div>

      <div class="collapse navbar-collapse" id="ctudocsnavbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
          <li><a href="<?php echo base_url('events/'); ?>">Sự kiện</a></li>
          <li><a href="<?php echo base_url('organizations/'); ?>">Tổ chức</a></li>
          <?php
          if(in_array('admin',$fetchRole)) {
            echo '<li><a href="'.base_url('admin/').'">Quản trị</a></li>';
          }

          if($loginStatus) {
            echo '<li class="dropdown">
              <a class="dropdown-toggle" type="button" data-toggle="dropdown">
                Hi, '.$user.'!<span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#">Tài khoản</a></li>
                <li><a href="'.base_url('auth/logout/?next='.$_SERVER['REQUEST_URI']).'">Đăng xuất</a></li>
              </ul>
            </li>';
          } else {
            echo '<li><a href="#" data-toggle="modal" data-target="#loginform">Đăng nhập</a></li>';
          }
          ?>
          <li>
        </ul>
      </div> <!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <script type="text/javascript">
  $(document).click(function(e) {
  if (!$(e.target).is('a')) {
      $('.collapse').collapse('hide');
    }
  });
  </script>
<!-- End Nav -->

<!-- Begin Login form -->
<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" action="<?php echo base_url('auth/login/?next='.$_SERVER['REQUEST_URI']); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title">Đăng nhập</h4>
        </div>
        <div class="modal-body">
          <label for="uid">Tài khoản</label>
          <input type="text" name="uid" class="form-control" placeholder="Nhập tài khoản">
          <label for="pwd">Mật khẩu</label>
          <input type="password" name="pwd" class="form-control" placeholder="Nhập mật khẩu">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="submit" name="loginSubmit" class="btn btn-primary">Đăng nhập</button>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Login form -->

<!-- Load subview -->
<div class="con">
<?php $this->load->view($subview); ?>
</div>
<!-- End subview -->

</body>
<div class="footer">
  <div class="container">
    <div class="col-md-12 contact">
Khoa Công nghệ Thông tin &amp; Truyền thông - Trường Đại học Cần Thơ<br>
Khu 2, đường 3/2, Phường Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ, Việt Nam;<br>
Điện thoại: <span style="font-size: 10pt; font-family: 'Arial','sans-serif';">(+84) 2923 831 301;
Fax: <span style="font-size: 10pt; font-family: 'Arial','sans-serif';">(+84) 2923 830 841;
Email: <a href="http://www.cit.ctu.edu.vn">Webmaster@cit.ctu.edu.vn</a></span>
    </div>
  </div>
</div>
</html>
