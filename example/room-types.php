<?php
$path = '../';
require $path.'init.php';
include $path.'template/head.php';

echo "<h1>GET /room-types</h1>";

$response = \Httpful\Request::get($api_json_url.'room-types/')
->authenticateWith($api_key_username, $api_key_password)
->expectsJson()
->send();

if ($response->code != 200) {
    die('Error '.$response->code.': '.$response->body->error);
}

$roomTypes = $response->body->roomTypes;

echo "<h2>roomTypes</h2>";

echo "<pre>";
print_r($roomTypes);
echo "</pre>";

include $path.'template/back.php';