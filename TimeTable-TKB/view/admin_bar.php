<?php
// Require default
require_once 'app/init.php';

//Khu vuc code
// Them mon hoc
if (isset($_POST['addSubject'])) {
  $TEN_MON = $_POST['TEN_MON'];

  new addSubject($TEN_MON,$_DOMAINS);
}

// Cap nhat mon hoc
if (isset($_POST['updateSubject'])) {
  $STT_MON = $_POST['STT_MON'];
  $TEN_MON = $_POST['TEN_MON'];
  $PHONG = $_POST['PHONG'];
  $THU = $_POST['THU'];
  $TIET_BD = $_POST['TIET_BD'];
  $SO_TIET = $_POST['SO_TIET'];
  $NHOM = $_POST['NHOM'];
  $DESC = $_POST['DESC'];

  new updateSubject($STT_MON,$TEN_MON,$PHONG,$THU,$TIET_BD,$SO_TIET,$NHOM,$DESC,$_DOMAINS);
}

// Xóa mon hoc
if (isset($_POST['deleteSubject'])) {
  $STT_MON = $_POST['STT_MON'];

  new deleteSubject($STT_MON,$_DOMAINS);
}

// Cap nhat thong tin
if (isset($_POST['updateInfo'])) {
  $id = $_POST['id'];
  $user = $_POST['user'];
  $pwd = $_POST['pwd'];
  $email = $_POST['email'];
  $name = $_POST['name'];
  $analytics = $_POST['analytics'];
  $slogan = $_POST['slogan'];

  new updateInfo($id,$user,$pwd,$email,$name,$analytics,$slogan,$_DOMAINS);
}

?>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#admin-bar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $_DOMAINS; ?>">Schedule</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class='collapse navbar-collapse' id='admin-bar'>
          <ul class='nav navbar-nav'>
            <li><a href='<?php echo $_DOMAINS; ?>'>Trang chủ</a></li>
            <li><a href='<?php echo $_DOMAINS; ?>listsubject'>Danh sách môn học</a></li>
            <li><a href='#' data-toggle='modal' data-target='#add_subject'>Thêm môn học</a></li>
          </ul>
          <form action="<?php echo $_DOMAINS; ?>" method="post" id="formLogout">
            <input type="hidden" name="logout">
            <ul class='nav navbar-nav navbar-right'>
              <li><a>Xin chào, <b style="color:blue;"><?php echo $dbuser['name']; ?></b></a></li>
              <li><a href='#' data-toggle='modal' data-target='#update_info'>Cập nhật thông tin</a></li>
              <li><a href="#" onclick="document.getElementById('formLogout').submit()">Đăng xuất</a></li>
            </ul>
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
