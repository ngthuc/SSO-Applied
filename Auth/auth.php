<?php
session_start();

// // Kiem tra su ton tai cua trang dich
// if(isset($_GET['next'])) {
//   if(!isset($_SESSION['endpoint'])) {
//     $_SESSION['endpoint'] = $_GET['next'];
//   }
// }

include 'connect.php';

if(isset($_POST['user']) && isset($_POST['token'])) {
  $user = $_POST['user'];
  $token = $_POST['token'];

  $sql = "SELECT * FROM auth WHERE user = '{$user}'";
  $exe_qry = mysqli_query($conn,$sql);
  if(mysqli_num_rows($exe_qry) > 0) {
    while ($row = mysqli_fetch_array($exe_qry)) {
      if($row['token'] == NULL) {
        // ...
      } else {
        $data['CODE'] = 200;
        $data['MESSAGE'] = TRUE;
        $data['TOKEN_RESULT'] = $row['user'];
        echo json_encode($data);
      }
    }
  }

  foreach ($dbtkb as $mon){
  	if ($tenmon==$mon['TEN_MON']){
  		echo json_encode($mon);
  	}
  }
} else {
  echo '<p>Directory access is forbidden.</p>';
}
$tenmon = $_POST['tenmon'];

foreach ($dbtkb as $mon){
	if ($tenmon==$mon['TEN_MON']){
		echo json_encode($mon);
	}
}

// echo '<a href="'.$_GET['next'].'" target="_blank">'.$_GET['next'].'</a>';
//
// if(isset($_SESSION['user_auth'])) {
//   setcookie('user',$_SESSION['user_auth'],time() + 3600);
//   setcookie('name',$_SESSION['name_auth'],time() + 3600);
//   setcookie('avatar',$_SESSION['avatar_auth'],time() + 3600);
// } else {
//   setcookie('user','',time() - 3600);
//   setcookie('name','',time() - 3600);
//   setcookie('avatar','',time() - 3600);
// }
?>
