<?php
include 'interface.css';
//echo $mysqli->host_info . "\n";
?>


<!-- started at 12:38 -->
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <section id = "isForm">
  <form id="addVideo" method="GET">
    Movie Name <input type = "text" name = "name">
    Category <input type = "text" name = "category">
    Length <input type = "number" name = "length">
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
  ?>
</section>
<section id="isTable">

<?php

  $reqName = $_GET['name'];
  $reqCat = $_GET['category'];
  $reqLen = $_GET['length'];
echo "<table>";

for($i = 0; $i < 2; $i++){
  echo "<tr>";
  for($j = 0; $j < 5; $j++){

    if($i == 0 && $j == 0){  echo "<td></td>";}
    else if($i == 0 && $j == 1){  echo "<td>Title</td>";}
    else if($i == 0 && $j == 2){  echo "<td>Category</td>";}
    else if($i == 0 && $j == 3){  echo "<td>Length</td>";}
    else{
        if($j == 0){  echo "<td><input type='button'></input></td>"; }
        else if($j == 1){  echo "<td>" . $reqName . "</td>"; }
        else if($j == 2){  echo "<td>" . $reqCat . "</td>"; }
        else if($j == 3){  echo "<td>" . $reqLen . "</td>"; }
    }

  }
  echo "</tr>";
}
echo"</table>";


?>


  </section>
</body>
</html>
