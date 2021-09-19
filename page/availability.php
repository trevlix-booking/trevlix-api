<?php
$path = '../';
require $path.'init.php';
include $path.'template/head.php';

// vars 
$id_room_type = 1; // change it to your real idRoomType (find it in GET room-types)

// prepare some random days
$today = new \DateTime;
$dateFrom = clone($today);
$dateTo = clone($today);
$dateFrom->modify('+1 days');
$dateTo->modify('+3 days');

$body = array(
    'idRoomType' => $id_room_type,
    'dateFrom' => $dateFrom->format('Y-m-d'),
    'dateTo' => $dateTo->format('Y-m-d'),
);

$url = '?';
foreach ($body as $param => $value) {
    $url .= $param.'='.$value.'&';
}

echo "<h1>GET availability</h1>";
echo "<h4>idRoomType: ".$id_room_type."</h4>";
echo "<h4>Dates: ".$dateFrom->format('j.n.Y')." - ".$dateTo->format('j.n.Y')."</h4>";

$response = \Httpful\Request::get($api_json_url.'availability/'.$url)
->authenticateWith($api_key_username, $api_key_password)
->expectsJson()
->send();


if ($response->code != 200) {
    die('Error '.$response->code.': '.$response->body->error);
}

$availability = $response->body->availability;

echo "<pre>";
print_r($availability);
echo "</pre>";

include $path.'template/back.php';