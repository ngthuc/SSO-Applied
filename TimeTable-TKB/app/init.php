<?php
// Require các thư viện PHP
require_once 'Session.php';
require_once 'Function.php';
require_once 'DB.php';
include 'routes.php';

//Khai bao dia chi
$_DOMAINS = $base_url;

// Khởi tạo session
$session = new Session();
$session->start();

// Kiểm tra session

if ($session->get() != '')
{
    $user = $session->get();
}
else
{
    $user = '';
}

// Nếu đăng nhập

if ($user)
{
    // Lấy dữ liệu tài khoản
      $data_user = $dbuser;
}

?>
