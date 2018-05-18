<?php
if(!isset($_SESSION['user'])) {
  if(isset($_COOKIE['userid']) {
    $_SESSION['user'] = $_COOKIE['userid'];
  } else {
    echo '<meta http-equiv="refresh" content="0,url=index.php">';
  }
} else {
  echo '<meta http-equiv="refresh" content="0,url=index.php">';
}
?>
