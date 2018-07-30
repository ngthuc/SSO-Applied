<?php

require "vendor/autoload.php";

use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'ngthuc.auth0.com',
  'client_id' => 'rYuzanR_2s25Wpy6wXqgnJvgHLy-njY0',
  'client_secret' => 'wMmawuSq2b_scPCBBIhOUsJYThRZzKGqITr_J4WPvYG4Cgznacaef1ETl1mkIKCQ',
  'redirect_uri' => 'http://localhost/sso/SSO_Lib_and_Callback/callback.php',
  'audience' => 'https://ngthuc.auth0.com/userinfo',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);
