<?php
// session_start();
$id=$_GET['item'];
if(isset($_SESSION['cart'][$id]))
{
 $qty = $_SESSION['cart'][$id] + 1;
}
else
{
 $qty=1;
}
$_SESSION['cart'][$id]=$qty;
// header("location: index.php");
echo '<meta http-equiv="refresh" content="0,url=index.php">';
// exit();
?>
