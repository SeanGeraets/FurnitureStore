<?php require_once('../library/session.php')?>

<?php
	print_r($_POST);
	
	$product_category = $_POST['product_category'];
	$product_name = addslashes($_POST['product_name']);
	$product_desc = addslashes($_POST['product_desc']);
	$product_price = addslashes($_POST['product_price']);
	$product_quant = $_POST['product_quant'];
	$product_img1 = $_FILES['product_img1']['name'];
	$product_img2 = $_FILES['product_img2']['name'];
	$img_tmp1 = '../../images/'.$_FILES['product_img1']['tmp_name'];
	$img_tmp2 = '../../images/'.$_FILES['product_img2']['tmp_name'];
	
	
	/*
	echo '<br>';
	echo $product_category.'<br>';
	echo $product_name.'<br>';
	echo $product_desc.'<br>';
	echo $product_price.'<br>';
	echo $product_quant.'<br>';
	echo $product_img1.'<br>';
	echo $product_img2;
	*/
	try {
		require_once('pdo_connect.php');
		
		$query = "CALL uploadProducts('$product_category', '$product_name', '$product_desc', '$product_price', '$product_quant','$product_img1', '$product_img2')";
		
		$sql = $connect->prepare($query);
		if(!$sql->execute()){
			echo 'Damn it';
		} else {
			echo 'probably worked';
			
			//$pic1 = 
			move_uploaded_file('$product_img1', '$img_tmp1');
			//$pic2 = 
			move_uploaded_file('$product_img2', '$img_tmp2');
			/*
			if(!$pic1 && !$pic2){
				echo 'Damn this thing';
			} else {
				echo 'hopefully worked';
			}
			*/
		}
	} catch (PDOException $q_error){
		echo 'ERROR - '.$q_error;
	}
	
?>