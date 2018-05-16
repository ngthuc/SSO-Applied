<?php

require "init.php";

$userInfo = $auth0->getUser();

if (!$userInfo) {
    die("Error while logging you in. Please retry");
}
else {
    // var_dump($userInfo);
    $_SESSION['user_auth'] = $userInfo['nickname'];
    $_SESSION['name_auth'] = $userInfo['family_name'] . ' ' . $userInfo['given_name'];
    $_SESSION['avatar_auth'] = $userInfo['picture'];
    // $cookie_name = "userid";
    // $cookie_value = $userInfo['nickname'];
    // setcookie($cookie_name, $cookie_value, time() + 3600);
    // // var_dump($_COOKIE[$cookie_name]);
    // echo '<script>alert("Đăng nhập thành công!")</script>';
    // echo '<meta http-equiv="refresh" content="0,url=index.php">';
    var_dump($_SESSION);
}
