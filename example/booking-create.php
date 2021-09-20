<?php
$path = '../';
require $path.'init.php';
include $path.'template/head.php';

// prepare some random days
$today = new \DateTime;
$dateFrom = clone($today);
$dateTo = clone($today);
$dateFrom->modify('+10 days');
$dateTo->modify('+13 days');

$body = array(
    'idRoomType' => 1,
    'dateFrom' => $dateFrom->format('Y-m-d'),
    'dateTo' => $dateTo->format('Y-m-d'),
    'timeArrival' => '16:30',
    'name' => 'John Newman',
    'email' => 'john.newman@mydomain.com',
    'phone' => '(+420) 777 123 456',
    'price' => 230.5,
    'currency' => 'EUR',
    'voucher' => 'DSCNT-20',
    'numberOfGuests' => 3,
    'numberOfChildren' => 1,
    'numberOfAdults' => 2,
);

echo "<h1>POST /booking-create</h1>";
echo "<h4>Booking:</h4>";
echo "<pre>";
print_r($body);
echo "</pre>";

$response = \Httpful\Request::post($api_json_url.'booking-create/')
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