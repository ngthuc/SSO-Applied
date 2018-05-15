
<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Demo Giỏ hàng | Đăng nhập</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <center>
      <h1>Đăng nhập để mua hàng</h1>
      <button type="button"><a href="index.php" style="text-decoration: none">Quay lại trang chủ</a></button>
      <form method="post">
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
            <td><button type="reset" style="width: 100%">Nhập lại</button></td>
            <td><button type="submit" name="login" style="background-color: blue; color: white; width: 100%">Đăng nhập</button></td>
          </tr>
          <tr>
            <td colspan="2">
              <hr>
              <button type="button" id="login" style="background-color: red; color: white; width: 100%">Đăng nhập với Auth0</button>
            </td>
          </tr>
        </table>
      </form>
    </center>
  </body>
</html>
