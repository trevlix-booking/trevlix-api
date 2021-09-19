<?php
$path = '../';
require $path.'init.php';
include $path.'template/head.php';

echo "<h1>GET ping</h1>";

$response = \Httpful\Request::get($api_json_url.'ping/')
->authenticateWith($api_key_username, $api_key_password)
->expectsJson()
->send();

if ($response->code != 200) {
    die('Error '.$response->code.': '.$response->body->error);
}

echo "<h2>Response</h2>";

echo "<pre>";
print_r($response->body);
echo "</pre>";

include $path.'template/back.php';