<?php
$path = './';
include $path.'template/head.php';
?>
  
  <h1>Trevlix API demo</h1>
	<p>API DOC: <a href="https://app.swaggerhub.com/apis-docs/trevlix/trevlix/0.3.0" target="_blank">https://app.swaggerhub.com/apis-docs/trevlix/trevlix/0.3.0</a></p>

  <p>Please enter your username and password in the config.php file before testing the API.</p>

  <h3>Tests</h3>
  <ul>
    <li><a href="page/ping.php">GET ping</a>
  </ul>

  <h3>Property</h3>
  <ul>
    <li><a href="page/property.php">GET property</a>
    <li><a href="page/room-types.php">GET room-types</a>
    <li><a href="page/account.php">GET account</a>

  </ul>

  <h3>Availability</h3>
  <ul>
    <li><a href="page/availability-all.php">GET availability-all</a>
    <li><a href="page/availability.php">GET availability</a>
  </ul>

  <h3>Bookings</h3>
  <ul>
    <li><a href="page/bookings.php">GET bookings</a>
    <li><a href="page/bookings-latest.php">GET bookings-latest</a>
    <li><a href="page/booking-create.php">POST booking-create</a>
    <li><a href="page/booking-cancel.php">POST booking-cancel</a>
  </ul>

</body>
</html>