<?php

require "init.php";

$userInfo = $auth0->getUser();

if (!$userInfo) {
    die("Error while logging you in. Please retry");
} 
else {
    print_r($userInfo);
}

// foreach ($userInfo as $key=>$data) {
	// echo $data . "<br />";
// }
