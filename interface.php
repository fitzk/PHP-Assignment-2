<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'main.php';
include 'state.php';

$mysqli = connectToServer();
createTable($mysqli);
$mysqli->close();
?>
<!-- started at 12:38 -->
<!DOCTYPE html>
<html>
<head>
</head>
<header>
<h1>Movie Rental Database</h1>


</header>
<body>
<section id = "isForm">
<?php 


if ($_SERVER['REQUEST_METHOD'] == "POST"){
	if(isset($_POST["addBtn"])){
		addFormInfo();
	}
}
	displayAddForm();
	dropDownMenu();
?>
</section>

<main>
 <section id="isTable">
<?php 

$var_str= NULL;
if ($_SERVER['REQUEST_METHOD'] == "POST"){

	if(isset($_POST["selected"])){	
		$var_str = $_POST["selected"];

	}
}
if($_SERVER['REQUEST_METHOD'] == "GET"){
	if(isset($_GET['submit'])){
		updateDB($_GET["rentId"],$_GET["rentStat"]);
	}
}
if($_SERVER['REQUEST_METHOD'] == "GET"){
	if(isset($_GET['remove'])){
		remove($_GET["rentId"]);
	}
}
if($_SERVER['REQUEST_METHOD'] == "GET"){
	if(isset($_GET['all'])){
		deleteAll();
	}
}
 genTable($var_str);
 
 ?>


  </section>
  </main>
</body>
</html>
