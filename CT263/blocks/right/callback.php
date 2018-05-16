<?php

require "init.php";

$userInfo = $auth0->getUser();

if (!$userInfo) {
    die("Error while logging you in. Please retry");
}
else {
    // foreach ($userInfo as $key=>$info) {
    // 	$data[] = $info;
    // }
    // $cookie_name = "userid";
    // $cookie_value = $userInfo['nickname'];
    // setcookie($cookie_name, $cookie_value, time() + 3600);
    // var_dump($_COOKIE[$cookie_name]);
    $_SESSION['username'] = $userInfo['nickname'];
    $_SESSION['isSSO'] = TRUE;
    $_SESSION['role'] = "Customer";
    // echo '<meta http-equiv="refresh" content="0,url=index.php">';
}
