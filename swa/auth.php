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


  if (!$userInfo) {
      // We have no user info
      // redirect to Login
      $loginTo = 'http://localhost/sso/swa/login.php';
      header('Location: ' . $loginTo);
  } else {
      // User is authenticated
      // Say hello to $userInfo['name']
      // print logout button
      $_SESSION['userinfo'] = $userInfo;

      echo '<body onload="window.history.go(-3);"></body>';
  }
?>
