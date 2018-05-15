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
    $_SESSION['username'] = $userInfo['nickname'];
    $_SESSION['isSSO'] = TRUE;
    $_SESSION['role'] = "Customer";
    // header("location:index.php");
    echo '<meta http-equiv="refresh" content="0,url=index.php">';
}
