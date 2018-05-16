<?php session_start();

// if(isset($_COOKIE['userid'])) {
//   $_SESSION['username'] = $_COOKIE['userid'];
//   $_SESSION['isSSO'] = TRUE;
//   $_SESSION['role'] = "Customer";
//   // echo '<meta http-equiv="refresh" content="0,url=index.php">';
// }
?>
<?php
    require "lib/dbCon.php";
    require "lib/dbHomePage.php";
    require "lib/checkAccount.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>YourVegetable</title>
        <link rel="shortcut icon" href="images/sc-lionicon-dribbble-2016.png" type="image/x-icon" />

        <link href="css/style.css" type="text/css"  rel="stylesheet"/>
        <link href="css/style-2.css" type="text/css"  rel="stylesheet"/>


        <link href="css/fonts.css" type="text/css" rel="stylesheet"/>

        <link href="css/vendors/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet"/>

        <script type="text/javascript" src="jq/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="jq/jquery.slides.js"></script>

        <!-- Auth0 -->
        <script src="https://cdn.auth0.com/js/auth0/8.8/auth0.min.js"></script>

        <!-- Initializing Script -->
        <script>
            $(document).ready(function() {
             var webAuth = new auth0.WebAuth({
                domain: 'tuyetnghi96.auth0.com',
                clientID: 'rqCGmBggUQt1zPkqUZj0sKOkpCQNfJG8',
                redirectUri: 'http://localhost/sso/CT263/index.php?p=sso',
                audience: `https://tuyetnghi96.auth0.com/userinfo`,
                responseType: 'code',
                scope: 'openid profile'
              });

              $('#login').click(function(e) {
                e.preventDefault();
                webAuth.authorize();
              });
            });
        </script>
    </head>

    <body>
    	<div id="wanner">
         	<!--header-->
            <?php require "blocks/header.php" ; ?>
            <!--/header-->
            <!--content-->
            <?php require "blocks/content.php" ; ?>
            <!--/content-->
            <!--footer-->
            <?php require "blocks/footer.php" ; ?>
            <!--/foote-->
        </div>
    </body>
</html>
