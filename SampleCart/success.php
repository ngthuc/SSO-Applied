<?php
session_start();

if(!isset($_SESSION['user']) && !isset($_SESSION['invoice'])) {
  echo '<script>alert("Bạn chưa đặt hàng!")</script>';
  echo '<meta http-equiv="refresh" content="0,url=index.php">';
}

echo '<meta http-equiv="refresh" content="3,url=index.php">';
?>
<html>
  <head>
    <title>Demo Shopping Cart</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <center>
      <h1>Demo Shopping Cart</h1>
      <?php
        echo "<div class='pro' align='center'>";
        echo "Xin chao <b>".$_SESSION['user']."</b>!";
        echo "<br />";
        echo "Ban da dat hang thanh cong voi so tien ".$_SESSION['price']." VND";
        echo "<br />";
        echo "Ma so don hang la <b>".$_SESSION['invoice']."</b>";
        echo "</div>";
      ?>
      <a href="index.php">Cho trong 3s hoac click de quay ve trang chu</a>
    </center>
  </body>
</html>
