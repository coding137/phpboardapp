<?php
	$servername = "localhost";
	$username = "wilson";
	$password = "1234";
	$dbname = "php_lecture";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

ini_set('display_errors', '0');
	//$conn->close();
?>