<?php

	session_start();
	
	if($_SESSION['admin'] == 'admin'){
		$_SESSION['home'] = 'home';
		
		//echo 'Connected to admin<br>';
		//echo $_SESSION['admin'];
	} else {
		header('location: ../index.php');
	}
	
	
?>