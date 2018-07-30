<?php
if(isset($_COOKIE['user'])) {
  var_dump($_COOKIE);
} else {
  header("Location: index.html");
}
?>
