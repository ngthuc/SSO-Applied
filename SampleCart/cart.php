<?php
session_start();

if(isset($_POST['submit']))
{
 foreach($_POST['qty'] as $key=>$value)
 {
  if( ($value == 0) and (is_numeric($value)))
  {
   unset ($_SESSION['cart'][$key]);
  }
  elseif(($value > 0) and (is_numeric($value)))
  {
   $_SESSION['cart'][$key]=$value;
  }
 }
 header("location:cart.php");
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
          $total = 0;
          echo "<form action='cart.php' method='post'>";
          foreach($_SESSION['cart'] as $key => $value) {
            $item[] = $key;
          }
          // $str = implode(",",$item);
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
          // while($row = mysqli_fetch_array($query)) {
          //   echo "<div class='pro'>";
          //   echo "<h3>$row[title]</h3>";
          //   echo "Tac gia: $row[author] - Gia: ".number_format($row[price],3)." VND<br />";
          //   echo "<p align='right'>So Luong: <input type='number' name='qty[$row[id]]' size='5' value='{$_SESSION['cart'][$row[id]]}'> - ";
          //   echo "<a href='delcart.php?productid=$row[id]' class='a-style'>Xoa Sach Nay</a></p>";
          //   echo "<p align='right'> Gia tien cho mon hang: ". number_format($_SESSION['cart'][$row[id]]*$row[price],3) ." VND</p>";
          //   echo "</div>";
          //   $total+=$_SESSION['cart'][$row[id]]*$row[price];
          // }
          echo "<div class='pro' align='right'>";
          echo "<b>Tong tien cho cac mon hang: <font color='red'>". number_format($total,3)." VND</font></b>";
          echo "</div>";
          echo "<input type='submit' name='submit' value='Cap Nhat Gio Hang'> - <button type='button'><a href='invoice.php'>Dat Hang</a></button>";
          echo "<div class='pro' align='center'>";
          echo "<b><a href='index.php' class='a-style'>Mua Sach Tiep</a> - <a href='delcart.php?productid=0' class='a-style'>Xoa Bo Gio Hang</a></b>";
          echo "</div>";
        }
        else {
          echo "<div class='pro'>";
          echo "<p align='center'>Ban khong co mon hang nao trong gio hang<br /><a href='index.php' class='a-style'>Buy Ebook</a></p>";
          echo "</div>";
        }
      ?>
    </center>
  </body>
</html>
