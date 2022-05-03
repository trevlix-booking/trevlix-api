<?php
$path = '../';
require $path.'init.php';
include $path.'template/head.php';

$id_booking = 123;

$body = array(
    'id' => $id_booking
);

$url = '?';
foreach ($body as $param => $value) {
    $url .= $param.'='.$value.'&';
}

echo "<h1>GET /booking</h1>";
echo "<h4>Booking Id: ".$id_booking."</h4>";

$response = \Httpful\Request::get($api_json_url.'booking/'.$url)
->authenticateWith($api_key_username, $api_key_password)
->expectsJson()
->send();

if ($response->code != 200) {
    die('Error '.$response->code.': '.$response->body->error);
}

$booking = $response->body->booking;

echo "<pre>";
print_r($booking);
echo "</pre>";

include $path.'template/back.php';
