<?php
  $cssFile = "interface.css";
  echo "<link rel='stylesheet' href='" . $cssFile . "'></link>";
  
  
function connectToServer(){
	$dbhost = 'oniddb.cws.oregonstate.edu';
	$dbname = 'fitzsimk-db';
	$dbuser = 'fitzsimk-db';
	$dbpass = 'j7ls3CXDsvxQUO71';

	$mysqli = new mysqli($dbhost, $dbname, $dbpass, $dbuser);
	if (mysqli_connect_errno()) {
	   echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	return $mysqli;
}

function createTable($mysqli){
	$mysqli->query("CREATE TABLE Movies(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	category VARCHAR(255) NOT NULL,
	length INT(10) UNSIGNED,
	RENTED BOOL DEFAULT TRUE)");
}

function genTable($input){

	$conn = connectToServer();
	$query = "SELECT id, name, category, length, RENTED FROM Movies ORDER by ID";

	if($input != NULL){
		$query ="SELECT id, name,category,length, RENTED FROM Movies WHERE category = '" . $input . "' ORDER by ID";
	}
	echo "Query: ". $query;

	$result = $conn->query($query);

	echo "<table>";
	echo '<tr>';
	echo "<td> TITLE </td>";
	echo "<td> CATEGORY </td>";
	echo "<td> LENGTH </td>";
	echo "<td> STATUS </td>";
	echo "<td> RENT/RETURN </td>";
	echo "<td></td>";
	echo "</tr>";
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo '<tr>';
			echo "<td>" . $row["name"]."</td>";
			echo "<td>" . $row["category"]."</td>";
			echo "<td>" . $row["length"]."min </td>";
			 if($row["RENTED"] == TRUE){
				echo "<form method='UPDATE'>";
				echo "<td> checked out </td>";
				echo "<td>";
				echo "<input type='hidden' name='rentStat' value='".$row["RENTED"]."'>";
				echo "<button type ='button' name='rentBtn' value='".$row["id"]."'> return </button>";
				echo "</td>";
				echo "</form>";
			}else{
				echo "<form method='UPDATE'>";
				echo "<td> avaliable </td>";
				echo "<td>";
				echo "<input type='hidden' name='rentStat' value='".$row["RENTED"]."'>";
				echo "<button type ='button' name='rentBtn' value='".$row["id"]."'> rent </button>";
				echo "</td>";
				echo "</form>";
			} 
			echo "<td>";
			echo "<button type ='button'> remove </button>";
			echo "</td>";
			echo "</tr>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();
	echo "</table>";

}
function dropDownMenu(){
	$conn = connectToServer();
	$query = "SELECT DISTINCT category FROM Movies ORDER by ID";
	$result = $conn->query($query);
	echo "<form name= 'dropdown' method = 'POST' >";
	echo "<select name='selected'>";
	$idNum = 0;
	while($row = $result->fetch_array()) {
		echo "<option value='" . $row[0] . "' id = '" . $idNum . "'>" . $row[0] . "</option>";
		$idNum++;
	}
	echo "</select>";
	echo "<input type = 'submit' value = 'submit'></input>";
	echo "</form>";
}


function displayAddForm(){
	  echo "<form id='addVideo' method='POST'>";
	  echo  "Movie <input type = 'text' name = 'name'>";
	  echo "category <input type = 'text' name = 'category'>";
	  echo  "Length <input type = 'number' name = 'length'>";
	  echo  "<input type = 'submit' name='addBtn' class = 'button' action = 'interface.php' value='select'>";
	  echo "</form>";
	}

function addFormInfo(){
	$mysqli = connectToServer();
	$reqName = $_POST['name'];
	$reqCat = $_POST['category'];
	$reqLen = $_POST['length'];
	$rented = true;
		if (!($stmt = $mysqli->prepare("INSERT INTO Movies(name,category,length,rented) VALUES (?,?,?,?)"))) {
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("ssii", $reqName,$reqCat,$reqLen,$rented)) {
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		} 
}

function updateDB($id,$bool){
	
	$conn = connectToServer();
	$query = "UPDATE Movies set RENTED = '".$bool."' WHERE id ='".$id."'";
	$result = $conn->query($query);
	
	
}
?>
<!-- started at 12:38 -->
