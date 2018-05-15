<?php

require "vendor/autoload.php";

use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'tuyetnghi96.auth0.com',
  'client_id' => 'f8VIaKqvS2rzGXw0kbrn2uSm9gkH6MpE',
  'client_secret' => 'o14XLG9-MuabnYrKeQLWJEkizthEINZTVAMKRty3CSt-32l_gdCxoNtrTZlGORUK',
  'redirect_uri' => 'http://localhost/sso/TimeTable-TKB/callback_sso',
  'audience' => 'https://tuyetnghi96.auth0.com/userinfo',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);
