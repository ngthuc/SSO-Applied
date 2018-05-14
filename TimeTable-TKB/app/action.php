<?php
require 'DB.php';

$tenmon = $_POST['tenmon'];

foreach ($dbtkb as $mon){
	if ($tenmon==$mon['TEN_MON']){
		echo json_encode($mon);
	}
}

?>
