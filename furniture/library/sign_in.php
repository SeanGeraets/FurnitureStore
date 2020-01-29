<?php
	session_start();
	require('connect.php');
	$cf_username = trim($_POST['username']);
	$cf_password = md5(trim($_POST['password']));
	
	$query = "SELECT * FROM users WHERE cf_username = '$cf_username' AND cf_password = '$cf_password'";
	$db = mysqli_select_db($conn, 'comfort_furniture');
	
	
	if ($db){
		$sql = mysqli_query($conn, $query);
		if(mysqli_num_rows($sql) == 1){
			
			$query = "SELECT * FROM users WHERE cf_username = '$cf_username' AND cf_password = '$cf_password'";
			$result = mysqli_query($conn, $query);
			
			WHILE($row = mysqli_fetch_assoc($result)){
				$user_type = $row['user_type'];
			}
			//echo 'Yes, there is a record';
			$_SESSION['admin'] = $user_type;
			header('location: ../admin/index.php');
			
		}else {
			//echo ' No, there is not a record';
			$_SESSION['general'] = 'Welcome Guest';
			header('location: index.php');
		}
	
	}
?>