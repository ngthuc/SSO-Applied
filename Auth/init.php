<?php

require "vendor/autoload.php";

use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'tuyetnghi96.auth0.com',
  'client_id' => 'PBFfXd64gcJFT5kZQaBgJ4unGnSAB6oi',
  'client_secret' => '-2a1TiMA1rWhmpgKKthPcTEGv5q6jNMebtueNFQ4I3iif1OCh7wt64XEt6o7kRtq',
  'redirect_uri' => 'http://localhost/sso/Auth/callback.php',
  'audience' => 'https://tuyetnghi96.auth0.com/userinfo',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);
