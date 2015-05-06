<?php



//echo $mysqli->host_info . "\n";
?>


<!-- started at 12:38 -->
<!DOCTYPE html>
<html>
<head></head>
<body>
  <form id="movieParams" method="GET">
    <input type = "text" name = "name">
    <input type = "text" name = "category">
    <input type = "number" name = "length">
    <input type = "submit">
  </form>
  <?php

  $dbhost = 'oniddb.cws.oregonstate.edu';
  $dbname = 'fitzsimk-db';
  $dbuser = 'fitzsimk-db';
  $dbpass = 'j7ls3CXDsvxQUO71';

  $mysqli = new mysqli($dbhost, $dbname, $dbpass, $dbuser);
  if (!$mysqli||$mysqli->connect_errno) {
     echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }


  // $reqName = $_GET['name'];
  // $reqCat = $_GET['category'];
  // $reqLen = $_GET['length'];


  ?>
</body>
</html>
