<?php
	$host = "localhost";
	$user = "root";
	$pass = "mysql";
	$database = "shophtx2";
	global $conn; 
	$conn = mysqli_connect($host, $user, $pass, $database) or die ("Could not connect: " . mysqli_error());
	mysqli_query($conn,"SET NAMES 'utf8'");
//	$db = mysql_select_db($database, $conn) or die ("Could not select database");
?>
