<?php
session_start();

// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'ngthuc.auth0.com',
  'client_id' => 'rYuzanR_2s25Wpy6wXqgnJvgHLy-njY0',
  'client_secret' => 'wMmawuSq2b_scPCBBIhOUsJYThRZzKGqITr_J4WPvYG4Cgznacaef1ETl1mkIKCQ',
  'redirect_uri' => 'http://localhost/sso/swa/auth.php',
  'audience' => 'https://ngthuc.auth0.com/userinfo',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);

$userInfo = $auth0->getUser();

if ($userInfo) {
  $_SESSION['userSSO'] = $userInfo;
}

// if(!isset($_SESSION['user'])) {
//   if(isset($_COOKIE['userid'])) {
//     echo '<meta http-equiv="refresh" content="0,url=addsession.php">';
//   }
// }

?>
<html>
  <head>
    <title>Demo Shopping Cart</title>
    <link rel="stylesheet" href="style.css" />

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Single Sign-on -->
    <!-- <script src="http://localhost/sso/Auth/main.js"></script> -->

    <!-- Initializing Script -->
    <!-- <script>
       // Hàm thiết lập Cookie
       function setCookie(cname, cvalue, exdays) {
         var d = new Date();
         d.setTime(d.getTime() + (exdays*24*60*60*1000));
         var expires = "expires="+d.toUTCString();
         document.cookie = cname + "=" + cvalue + "; " + expires;
       }

       <?php
         // if(!isset($_COOKIE['user'])) {
         //   echo '$(document).ready(function() {
         //     load_ajax("http://localhost/sso/Auth/auth.php?next=http://localhost/sso/SampleCart/","nguyenminhvy987","FWy8Q20551Yn4xOrb93FIrexpINmLpLx","addsession.php");
         //   });';
         // }
       ?>
     </script> -->
  </head>
  <body>
  <center>
    <h1>Demo Shopping Cart</h1>
    <div id='cart'>
      <?php
        if(isset($_SESSION['userSSO'])) {
          echo 'Xin chào, <b style="color: red">' . $_SESSION['userSSO']['name'] . '!</b>';
          echo '<a href="http://localhost/sso/swa/logout.php?return=http://localhost/sso/SampleCart" style="color: blue"> Đăng xuất</a>';
        } else if(isset($_SESSION['user'])) {
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
          <a href="http://localhost/sso/swa/auth.php?return=http://localhost/sso/SampleCart" id="sso-login" style="background-color: red; color: white; width: 100%">Đăng nhập với Auth0</a>
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
      $query = mysqli_query($conn,$sql);
      // if(mysqli_num_rows($query) > 0) {
        while($row = mysqli_fetch_array($query)) {
          echo "<div class='pro'>";
          echo "<h3>".$row['title']."</h3>";
          echo "Tac Gia: ".$row['author']." - Gia: ".number_format($row['price'],3)." VND<br />";
          echo "<p align='right'><a href='addcart.php?item=".$row['id']."' class='a-style'>Mua Sach Nay</a></p>";
          echo "</div>";
        }
      // }
    ?>
    </center>
  </body>
</html>
