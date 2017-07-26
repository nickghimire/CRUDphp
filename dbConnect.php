<?php
function connect(){
	include("./dbConfig.php");
	$conn = new mysqli($servername,$username,$password,$dbName);

	if($conn-> connect_error){
		return false;
	}
	return $conn;
}