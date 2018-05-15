<?php
// Khởi tạo phiên làm việc
session_start();

// Hành động đăng nhập
if(isset($_POST['submit'])) {
  if($_POST['pwd'] != '') {
    $_SESSION['user'] = $_POST['uid'];
    echo '<script>alert("Đăng nhập thành công!")</script>';
    echo '<meta http-equiv="refresh" content="0,url=index.php">';
  } else {
    echo '<script>alert("Đăng nhập thất bại!")</script>';
    echo '<meta http-equiv="refresh" content="0,url=index.php">';
  }
} else {
  echo '<meta http-equiv="refresh" content="0,url=index.php">';
}
?>
