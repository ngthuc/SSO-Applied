<?php
// Kiem tra su ton tai cua trang dich
if(isset($_GET['next'])) {
  echo '<a href="'.$_GET['next'].'" target="_blank">'.$_GET['next'].'</a>';
}
?>
<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Authentication | Chứng thực đăng nhập</title>
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Auth0 -->
    <script src="https://cdn.auth0.com/js/auth0/8.8/auth0.min.js"></script>

    <!-- Initializing Script -->
    <script>
      // $(document).ready(function() {
      //   var webAuth = new auth0.WebAuth({
      //       domain: 'tuyetnghi96.auth0.com',
      //       clientID: 'PBFfXd64gcJFT5kZQaBgJ4unGnSAB6oi',
      //       redirectUri: 'http://localhost/sso/Auth/callback.php',
      //       audience: `https://tuyetnghi96.auth0.com/userinfo`,
      //       responseType: 'code',
      //       scope: 'openid profile'
      //   });
      //
      //   webAuth.authorize();
      // });
    </script>
  </head>
  <body>
    <!-- Not content | Khong co noi dung -->
  </body>
</html>
