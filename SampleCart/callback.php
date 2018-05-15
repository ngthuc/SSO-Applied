<?php

require "init.php";

$userInfo = $auth0->getUser();

if (!$userInfo) {
    die("Error while logging you in. Please retry");
}
else {
    // var_dump($userInfo);
    $_SESSION['user'] = $userInfo['nickname'];
    echo '<script>alert("Đăng nhập thành công!")</script>';
    echo '<meta http-equiv="refresh" content="0,url=index.php">';
}
