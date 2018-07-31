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
  $_SESSION['username'] = $userInfo['nickname'];
  $_SESSION['isSSO'] = TRUE;
  $_SESSION['role'] = "Customer";
} else {
  $_SESSION['isSSO'] = FALSE;
}
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
