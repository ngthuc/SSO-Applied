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
    $exe_qry_user = mysqli_query($conn,$sql_select_user);
    if(mysqli_num_rows($exe_qry) > 0) {
      $sql_upd_token = "UPDATE auth SET token = '$token' WHERE user = '$user'";
    } else {
      $sql_upd_token = "INSERT INTO auth(user,token) VALUES ('$user','$token')";
    }

    if($sql_upd_token) {
      mysqli_query($conn,$sql_upd_token);
    }

    echo '<meta http-equiv="refresh" content="0,url=auth.php">';
}
