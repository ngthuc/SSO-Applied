<?php
include 'routes.php';
/// Read Method
$db = json_decode(file_get_contents($base_url.'app/user.json'), TRUE);
$dbuser = $db['user'][0];
$tkb = json_decode(file_get_contents($base_url.'app/tkbdb.json'), TRUE);
$dbtkb = $tkb['monhoc'];
?>
