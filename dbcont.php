<?php
	
	$dbhost="localhost";
	$dbname="root";
	$dbpass="";
	$dbserver="cswebbo";
	
	$conn = new mysqli($dbhost,$dbname,$dbpass,$dbserver);
	if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>