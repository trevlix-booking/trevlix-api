<?php
$path = '../';
require $path.'init.php';
include $path.'template/head.php';

// vars
$id_booking_cancel = 59; // change it to your real booking id to cancel (Please note, that you can cancel only bookings created by your API Key)

$body = array(
    'id' => $id_booking_cancel,
);

echo "<h1>POST /booking-cancel</h1>";
echo "<h4>cancel booking id ".$id_booking_cancel."</h4>";

$response = \Httpful\Request::post($api_json_url.'booking-cancel/')
->authenticateWith($api_key_username, $api_key_password)
->sendsType(\Httpful\Mime::FORM)
->body($body)
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