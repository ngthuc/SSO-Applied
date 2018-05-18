<?php
// Yêu cầu tạo kết nối đến CSDL
include 'connect.php';
// Yêu cầu các khai báo cần thiết
require "init.php";

// Yêu cầu thông tin người dùng từ kết quả trả về
$userInfo = $auth0->getUser();

if (!$userInfo) {
    die("Error while logging you in. Please retry");
}
else {
    $user = $userInfo['nickname'];
    $sql_select_user = "SELECT * FROM auth WHERE user = '$user'";
    $exe_qry_user = mysqli_query($conn,$sql);
    if(mysqli_num_rows($exe_qry) > 0) {
      $sql_upd_token = "UPDATE auth SET token = '$token' WHERE user = '$user'";
    }
    // $cookie_name = "userid";
    // $cookie_value = $userInfo['nickname'];
    // setcookie($cookie_name, $cookie_value, time() + 3600);
    // // var_dump($_COOKIE[$cookie_name]);
    // echo '<script>alert("Đăng nhập thành công!")</script>';
    // echo '<meta http-equiv="refresh" content="0,url=index.php">';
    var_dump($_SESSION);
}
