<?php
require 'DB.php';

$mamon = $_POST['mamon'];
$tenmon = $_POST['tenmon'];

foreach ($tkb as $mon){
	if ($mon[$mamon]){
    if ($tenmon==$mon[$mamon]['TEN_MON']){
      $tkbarray = array(
        'STT_MON' => $mamon,
        'TEN_MON' => $mon[$mamon]['TEN_MON'],
        'PHONG' => $mon[$mamon]['PHONG'],
        'THU' => $mon[$mamon]['THU'],
        'TIET_BD' => $mon[$mamon]['TIET_BD'],
        'SO_TIET' => $mon[$mamon]['SO_TIET'],
        'NHOM' => $mon[$mamon]['NHOM'],
        'DESC' => $mon[$mamon]['DESC'],
      );

      echo json_encode($tkbarray);
    }
	}
}

?>
