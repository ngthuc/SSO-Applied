<?php
session_start();

// Kiem tra su ton tai cua trang dich
if(isset($_GET['next'])) {
  if(!isset($_SESSION['endpoint'])) {
    $_SESSION['endpoint'] = $_GET['next'];
  }  
}

echo '<a href="'.$_GET['next'].'" target="_blank">'.$_GET['next'].'</a>';

if(isset($_SESSION['user_auth'])) {
  setcookie('user',$_SESSION['user_auth'],time() + 3600);
  setcookie('name',$_SESSION['name_auth'],time() + 3600);
  setcookie('avatar',$_SESSION['avatar_auth'],time() + 3600);
} else {
  setcookie('user','',time() - 3600);
  setcookie('name','',time() - 3600);
  setcookie('avatar','',time() - 3600);
}
?>
