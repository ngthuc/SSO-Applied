<?php

require "vendor/autoload.php";

use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'tuyetnghi96.auth0.com',
  'client_id' => '7Hr6oFjh6XJa4nkesvi3sbXclnXkIKjd',
  'client_secret' => 'IhllwDznLEELSZY7j6Zz_m5LDqTnHu-EzihMxoJn5fPd2Wha8QPkg7pIl_6QOteg',
  'redirect_uri' => 'http://localhost/Exercise2/callback.php',
  'audience' => 'https://tuyetnghi96.auth0.com/userinfo',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);