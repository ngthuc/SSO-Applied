<?php
session_start();

// $_SESSION['user'] = null;
if(isset($_COOKIE['userid'])) {
  $_SESSION['user'] = $_COOKIE['userid'];
  // echo '<meta http-equiv="refresh" content="0,url=index.php">';
}
?>
<html>
  <head>
    <title>Demo Shopping Cart</title>
    <link rel="stylesheet" href="style.css" />

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Auth0 -->
    <script src="https://cdn.auth0.com/js/auth0/8.8/auth0.min.js"></script>

    <!-- Initializing Script -->
    <script>
       $(document).ready(function() {
        var webAuth = new auth0.WebAuth({
           domain: 'tuyetnghi96.auth0.com',
           clientID: 'FWy8Q20551Yn4xOrb93FIrexpINmLpLx',
           redirectUri: 'http://localhost/sso/SampleCart/callback.php',
           audience: `https://tuyetnghi96.auth0.com/userinfo`,
           responseType: 'code',
           scope: 'openid profile'
         });

        $('#sso-login').click(function(e) {
           e.preventDefault();
           webAuth.authorize();
         });
       });
     </script>
  </head>
  <body>
  <center>
    <h1>Demo Shopping Cart</h1>
    <div id='cart'>
      <?php
        if($_SESSION['user'] != '') {
          echo 'Xin chào, <b style="color: red">' . $_SESSION['user'] . '!</b>';
          echo '<a href="logout.php" style="color: blue"> Đăng xuất</a>';
        } else {
          echo '<center>
          <form action="login.php" method="post">
            <table>
              <tr>
                <td>Tên đăng nhập</td>
                <td><input type="text" name="uid" placeholder="Tài khoản"></td>
              </tr>
              <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="pwd" placeholder="Mật khẩu"></td>
              </tr>
              <tr>
                <hr>
                <td><button type="reset" style="width: 100%">Nhập lại</button></td>
                <td><button type="submit" name="submit" style="width: 100%">Đăng nhập</button></td>
              </tr>
            </table>
          </form>
          <hr>
          <button id="sso-login" style="background-color: red; color: white; width: 100%">Đăng nhập với Auth0</button>
          </center>';
        }
      ?>
    <?php
      $ok=1;
      if(isset($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $k=>$v) {
           if(isset($v)) {
             $ok=2;
           }
        }
      }
      if ($ok != 2) {
        echo '<p>Ban khong co mon hang nao trong gio hang</p>';
      } else {
        $items = $_SESSION['cart'];
        echo '<p>Ban dang co <a href="cart.php" class="a-style">'.count($items).' mon hang trong gio hang</a></p>';
      }
    ?>
    </div>
    <?php
      include 'connect.php';
      $sql = "SELECT * FROM books ORDER BY id DESC";
      $query = mysql_query($sql);
      if(mysql_num_rows($query) > 0) {
        while($row = mysql_fetch_array($query)) {
          echo "<div class=pro>";
          echo "<h3>$row[title]</h3>";
          echo "Tac Gia: $row[author] - Gia: ".number_format($row[price],3)." VND<br />";
          echo "<p align='right'><a href='addcart.php?item=$row[id]' class='a-style'>Mua Sach Nay</a></p>";
          echo "</div>";
        }
      }
    ?>
    </center>
  </body>
</html>
