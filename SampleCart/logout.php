<?php
session_start();

if(isset($_SESSION['user'])) {
  session_destroy();
  // if(isset($_COOKIE['userid'])){
  //     setcookie("userid", "", time()-3600);
  // }

  echo '<script>alert("Đăng xuất thành công!")</script>';
  if(isset($_SESSION['type']) == 'SSO'){
    echo '<meta http-equiv="refresh" content="0,url=http://localhost/sso/swa/logout.php?return=http://localhost/sso/SampleCart">';
  } else {
    echo '<meta http-equiv="refresh" content="0,url=index.php">';
  }
} else {
  echo '<meta http-equiv="refresh" content="0,url=index.php">';
}
?>
