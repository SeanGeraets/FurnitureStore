<?php

	require_once('library/session.php');
	require_once('library/head_sec.html');
	require_once('procedures/pdo_connect.php');
	
	try {
		$sql = 'CALL getProducts()';
		$query = $connect->query($sql);
		$result = $query->setFetchMode(PDO::FETCH_ASSOC);
		
		
	} catch (PDOException $q_error){
		print($q_error);
	}
	if(!$result){
		echo 'Damn It!! Not again.';
	} else {
		echo ' Good news<br><br><br>';
	}
	
	echo '<div class="row">';
	while ($row = $query->fetch()){
		echo '<div class="card" style = "width:30%"><div class="card-body">';
		echo $row['product_id'].'<br>';
		echo $row['product_category'].'<br>';
		echo $row['product_name'].'<br>';
		echo $row['product_desc'].'<br>';
		echo $row['product_price'].'<br>';
		echo $row['product_quant'].'<br></div></div>';
	}
	echo '</div>';
	//echo 'Hello World';

?>