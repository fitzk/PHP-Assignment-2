<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'main.php';

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
<section id = "isForm">
<?php 
	displayAddForm();
	dropDownMenu();
$length = 0;
/* if ($_SERVER['REQUEST_METHOD'] == "GET"){
	
	displayAddForm();
	dropDownMenu();

} */
if ($_SERVER['REQUEST_METHOD'] == "POST"){
	if(isset($_POST["addBtn"])){
		addFormInfo();
	}
}
?>
</section>

</header>
<body>
<main>
 <section id="isTable">
<?php 

$input = NULL;
if ($_SERVER['REQUEST_METHOD'] == "POST"){

	if(isset($_POST["selected"])){
		$input=$_POST["selected"];
	}
}

if($_SERVER['REQUEST_METHOD'] == "UPDATE"){
	
	if(isset($_POST["rentBtn"])){
		if($_POST["rentStat"] == 'TRUE'){
			updateDB($_POST["rentBtn"],'FALSE');
		}else if ($_POST["rentStat"] == 'TRUE'){
		updateDB($_POST["rentBtn"],'FALSE');
		}
	}
}
 genTable($input); 
 
 
 ?>


  </section>
  </main>
</body>
</html>
