<?php
session_start();

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
