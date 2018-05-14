<?php

require "vendor/autoload.php";

use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'tuyetnghi96.auth0.com',
  'client_id' => 'rqCGmBggUQt1zPkqUZj0sKOkpCQNfJG8',
  'client_secret' => 'kLPGFIZJmFw9GRgg6RG1CUls-E2_JgbgQvyeiJqJSb2zHo1FVRgpakmUpVbywQnn',
  'redirect_uri' => 'http://localhost/sso/CT263/index.php?p=sso',
  'audience' => 'https://tuyetnghi96.auth0.com/userinfo',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);
