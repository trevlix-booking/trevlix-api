<?php
$path = './';
include $path.'template/head.php';
?>
  
  <h1>Trevlix API demo</h1>
	<p>API DOC: <a href="https://app.swaggerhub.com/apis-docs/trevlix/trevlix/0.3.0" target="_blank">https://app.swaggerhub.com/apis-docs/trevlix/trevlix/0.3.0</a></p>

  <p>Please enter your username and password in the config.php file before testing the API.</p>

  <h3>Info</h3>
  <ul>
    <li><a href="example/ping.php">GET /ping</a>
    <li><a href="example/account.php">GET /account</a>
  </ul>

  <h3>Property</h3>
  <ul>
    <li><a href="example/property.php">GET /property</a>
    <li><a href="example/room-types.php">GET /room-types</a>
  </ul>

  <h3>Availability</h3>
  <ul>
    <li><a href="example/availability-all.php">GET /availability-all</a>
    <li><a href="example/availability.php">GET /availability</a>
  </ul>

  <h3>Bookings</h3>
  <ul>
    <li><a href="example/bookings.php">GET /bookings</a>
    <li><a href="example/bookings-latest.php">GET /bookings-latest</a>
    <li><a href="example/booking-create.php">POST /booking-create</a>
    <li><a href="example/booking-cancel.php">POST /booking-cancel</a>
  </ul>

</body>
</html>
