<?php

$server_name = 'localhost';
$username = 'root';
$password = 'root';

$conn = new mysqli($server_name, $username, $password);

if ($conn->connect_error) {

	/* die(" Died ") .$conn->connect_error */;

} else {

	/* echo " Alive "; */

	$db = "CREATE DATABASE comfort_furniture";

	if ($conn->query($db) === True) {
		
		/* echo " NewDB "; */ 
	
	} else {
		
		/* die(" OldDB "); */
		
	}
}

/* All errors are commented out, for live runs */
/* $conn->close(); individually disconnecting */

?>


