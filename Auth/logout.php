<?php
session_start();

if(isset($_SESSION['user_auth'])) {
  setcookie('user','',time() - 3600);
  setcookie('name','',time() - 3600);
  setcookie('avatar','',time() - 3600);
  session_destroy();
} else {
  echo 'Error: 500';
}
?>
