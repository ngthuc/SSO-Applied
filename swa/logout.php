<?php
require __DIR__ . '/vendor/autoload.php';
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

$auth0->logout();
$return_to = 'http://localhost/sso/swa/';
// $logout_url = sprintf('http://%s/v2/logout?client_id=%s&returnTo=%s', domain, client_id, $return_to);
$logout_url = sprintf('http://%s/v2/logout?client_id=%s&returnTo=%s', 'ngthuc.auth0.com', 'rYuzanR_2s25Wpy6wXqgnJvgHLy-njY0', $return_to);
header('Location: ' . $logout_url);
die();
