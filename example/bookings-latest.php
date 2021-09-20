<?php
$path = '../';
require $path.'init.php';
include $path.'template/head.php';

// vars
$days = 3;

$body = array(
    'days' => $days,
);

$url = '?';
foreach ($body as $param => $value) {
    $url .= $param.'='.$value.'&';
}

echo "<h1>GET /bookings-latest</h1>";
echo "<h4>Days: ".$days."</h4>";

$response = \Httpful\Request::get($api_json_url.'bookings-latest/'.$url)
->authenticateWith($api_key_username, $api_key_password)
->expectsJson()
->send();

if ($response->code != 200) {
    die('Error '.$response->code.': '.$response->body->error);
}

$bookings = $response->body->bookings;

echo "<pre>";
print_r($bookings);
echo "</pre>";

include $path.'template/back.php';