<?php
$path = '../';
require $path.'init.php';
include $path.'template/head.php';

// prepare some random days
$today = new \DateTime;
$dateFrom = clone($today);
$dateTo = clone($today);
$dateFrom->modify('+1 days');
$dateTo->modify('+3 days');

$body = array(
    'dateFrom' => $dateFrom->format('Y-m-d'),
    'dateTo' => $dateTo->format('Y-m-d'),
);

$url = '?';
foreach ($body as $param => $value) {
    $url .= $param.'='.$value.'&';
}

echo "<h1>GET availability-all</h1>";
echo "<h4>".$dateFrom->format('j.n.Y')." - ".$dateTo->format('j.n.Y')."</h4>";

$response = \Httpful\Request::get($api_json_url.'availability-all/'.$url)
->authenticateWith($api_key_username, $api_key_password)
->expectsJson()
->send();


if ($response->code != 200) {
    die('Error '.$response->code.': '.$response->body->error);
}

$availabilityRoomTypes = $response->body->availabilityRoomTypes;

echo "<pre>";
print_r($availabilityRoomTypes);
echo "</pre>";

include $path.'template/back.php';