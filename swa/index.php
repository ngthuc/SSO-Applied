<?php

  // Require composer autoloader
  require "vendor/autoload.php";

  use Auth0\SDK\Auth0;

  $auth0 = new Auth0([
    'domain' => 'ngthuc.auth0.com',
    'client_id' => 'rYuzanR_2s25Wpy6wXqgnJvgHLy-njY0',
    'client_secret' => 'wMmawuSq2b_scPCBBIhOUsJYThRZzKGqITr_J4WPvYG4Cgznacaef1ETl1mkIKCQ',
    'redirect_uri' => 'http://localhost/sso/swa/',
    'audience' => 'https://ngthuc.auth0.com/userinfo',
    'persist_id_token' => true,
    'persist_access_token' => true,
    'persist_refresh_token' => true,
  ]);

  $userInfo = $auth0->getUser();

  // if (!$userInfo) {
  //     // We have no user info
  //     // redirect to Login
  //     // $loginTo = 'http://localhost/sso/swa/login.php';
  //     // header('Location: ' . $loginTo);
  // } else {
  //     // User is authenticated
  //     // Say hello to $userInfo['name']
  //     // print logout button
  //     // var_dump($userInfo);
  // }


?>
<html>
    <head>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- font awesome from BootstrapCDN -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

        <link href="public/app.css" rel="stylesheet">
        <!-- Auth0 -->
        <script src="https://cdn.auth0.com/js/auth0/8.8/auth0.min.js"></script>
        <!-- Bootstrap 4 -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> -->



    </head>
    <body class="home">
        <div class="container">
            <div class="login-page clearfix">
              <?php if(!$userInfo): ?>
              <div class="login-box auth0-box before">
                <img src="https://c1.staticflickr.com/1/851/29824109178_e5d5395989_o.png" />
                <h3>Authentication App</h3>
                <!-- <p>Zero friction identity infrastructure, built for developers</p> -->
                <a id="qsLoginBtn" class="btn btn-primary btn-lg btn-login btn-block" href="login.php">Sign In</a>
              </div>
              <?php else: ?>
              <div class="logged-in-box auth0-box logged-in">
                <h1 id="logo"><img src="https://c1.staticflickr.com/1/851/29824109178_e5d5395989_o.png" /></h1>
                <img class="avatar" src="<?php echo $userInfo['picture'] ?>" width="100px"/>
                <h2>Welcome <span class="nickname"><?php echo $userInfo['name'] ?></span></h2>
                <h3>Email: <span class="nickname"><?php echo $userInfo['email'] ?></span></h3>
                <a id="qsLogoutBtn" class="btn btn-warning btn-logout" href="logout.php">Logout</a>
              </div>
              <?php endif ?>
            </div>
        </div>
    </body>
</html>
