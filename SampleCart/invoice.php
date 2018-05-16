<?php
session_start();

if(!isset($_SESSION['user'])) {
  echo '<script>alert("Bạn chưa đăng nhập!")</script>';
  echo '<meta http-equiv="refresh" content="0,url=index.php">';
}

date_default_timezone_set("Asia/Ho_Chi_Minh");
$numberInvoice = "#".date("YmdHis");

if(isset($_POST['submit'])) {
  $_SESSION['invoice'] = $numberInvoice;
  $_SESSION['price'] = $_POST['price'];
  echo '<meta http-equiv="refresh" content="0,url=success.php">';
}
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
        $ok=1;
        if(isset($_SESSION['cart'])) {
          foreach($_SESSION['cart'] as $k => $v) {
            if(isset($k)) {
              $ok=2;
            }
          }
        }
        if($ok == 2) {
          echo "<form action='invoice.php' method='post'>";

          echo "<div class='pro' align='center'>";
          echo "Khach hang: <b>".$_SESSION['user']."</b>";
          echo "<br />";
          echo "Ma don hang: <b>".$numberInvoice."</b>";
          echo "</div>";

          foreach($_SESSION['cart'] as $key=>$value) {
            $item[]=$key;
          }
          // $str=implode(",",$item);
          include 'connect.php';
          foreach ($item as $key => $value) {
            $sql = "SELECT * FROM books WHERE id='$value'";
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($query)) {
              echo "<div class='pro'>";
              echo "<h3>$row[title]</h3>";
              echo "Tac gia: $row[author] - Gia: ".number_format($row['price'],3)." VND<br />";
              echo "<p align='right'>So Luong: <input type='number' name='qty[$row[id]]' size='5' value='{$_SESSION['cart'][$row['id']]}'> - ";
              echo "<a href='delcart.php?productid=$row[id]' class='a-style'>Xoa Sach Nay</a></p>";
              echo "<p align='right'> Gia tien cho mon hang: ". number_format($_SESSION['cart'][$row['id']]*$row['price'],3) ." VND</p>";
              echo "</div>";
              $total+=$_SESSION['cart'][$row['id']]*$row['price'];
            }
          }
          // $sql = "SELECT * FROM books WHERE id IN ($str)";
          // $query = mysqli_query($conn,$sql);
          // while($row = mysql_fetch_array($query)) {
          //   echo "<div class='pro'>";
          //   echo "<h3>$row[title]</h3>";
          //   echo "Tac gia: $row[author] <br />
          //         Don gia: ".number_format($row[price],3)." VND<br />";
          //   echo "So luong: {$_SESSION['cart'][$row[id]]} <br />
          //         Thanh tien: ". number_format($_SESSION['cart'][$row[id]]*$row[price],3) ." VND</p>";
          //   echo "</div>";
          //   $total+=$_SESSION['cart'][$row[id]]*$row[price];
          // }
          echo "<div class='pro' align='center'>";
          echo "<b>Tong tien cho cac mon hang: <font color='red'>" . number_format($total,3) . " VND</font></b>";
          echo "</div>";
          echo "<input type='hidden' name='price' value='" . number_format($total,3) . "' />";
          echo "<input type='submit' name='submit' value='Thanh Toan'>";
        } else {
          echo '<script>alert("Ban khong co mon hang nao trong gio hang!")</script>';
          echo '<meta http-equiv="refresh" content="0,url=index.php">';
        }
      ?>
    </center>
  </body>
</html>
