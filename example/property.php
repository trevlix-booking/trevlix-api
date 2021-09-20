<?php
$path = '../';
require $path.'init.php';
include $path.'template/head.php';

echo "<h1>GET /property</h1>";

$response = \Httpful\Request::get($api_json_url.'property/')
->authenticateWith($api_key_username, $api_key_password)
->expectsJson()
->send();

if ($response->code != 200) {
    die('Error '.$response->code.': '.$response->body->error);
}

$property = $response->body->property;

echo "<h2>".$property->name."</h2>";

echo "<pre>";
print_r($property);
echo "</pre>";

include $path.'template/back.php';