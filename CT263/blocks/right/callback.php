<?php

require "init.php";

$userInfo = $auth0->getUser();

if (!$userInfo) {
    die("Error while logging you in. Please retry");
}
else {
    var_dump($userInfo);
}

// foreach ($userInfo as $key=>$data) {
	// echo $data . "<br />";
// }
