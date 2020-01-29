<?php require_once('../library/session.php')?>

<?php
	print_r($_POST);
	
	$f_user_type = $_POST['form_user_type'];
	$f_user_name = $_POST['form_user_name'];
	$f_password = md5($_POST['form_password']);

	
	try {
		require_once('pdo_connect.php');
		
		$query = "CALL uploadUsers('$f_user_name', '$f_password', '$f_user_type')";
		
		$sql = $connect->prepare($query);
		if(!$sql->execute()){
			echo 'Damn it';
		} else {
			echo 'probably worked';
		}
	} catch (PDOException $q_error){
		echo 'ERROR - '.$q_error;
	}
	
?>