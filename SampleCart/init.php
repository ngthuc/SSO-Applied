<?php

require "vendor/autoload.php";

use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'tuyetnghi96.auth0.com',
  'client_id' => 'FWy8Q20551Yn4xOrb93FIrexpINmLpLx',
  'client_secret' => 'h6Igp8SS32ay9jhNhlOdbKl8DSpt0qtjXG0jY5g6znzK2KeLEgdo6P8MMJhy8k56',
  'redirect_uri' => 'http://localhost/sso/SampleCart/callback.php',
  'audience' => 'https://tuyetnghi96.auth0.com/userinfo',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);
