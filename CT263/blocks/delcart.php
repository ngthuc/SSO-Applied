<?php
// session_start();
$cart=$_SESSION['cart'];
$id=$_GET['productid'];
if($id == 0)
{
 unset($_SESSION['cart']);
}
else
{
unset($_SESSION['cart'][$id]);
}
echo '<meta http-equiv="refresh" content="0,url=index.php?p=Cart">';
// exit();
?>
