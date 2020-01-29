<?php

$server_name = 'localhost';
$user_name = 'root';
$pass_word = 'root';

$conn = new mysqli($server_name, $user_name, $pass_word);

if ($conn->connect_error) {

	 die(" Died ") .$conn->connect_error ;

} else {

	 echo " Alive "; 

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


