<?php require_once('library/session.php');?>

<?php 

	function loadCode(){
		require_once('library/head_sec.html');
		require_once('library/header_sec.html');
		require_once('library/main_menu.html');
	}
	
	if (@$_REQUEST['id'] == ''){
		header('location:index.php');
	} else {
		loadCode();
		
		$caller = ucfirst($_REQUEST['id']);
		
		require_once('procedures/pdo_connect.php');
		
		$sql = "CALL productCall('$caller')";
		
		try {
			$query = $connect->query($sql);
			$query->setFetchMode(PDO::FETCH_ASSOC);
		} catch(PDOException $q_error){
			echo 'Damn it'. $q_error;
		}
		if (!$query){
			echo 'No products found';
		} else {
			echo '<div class="container">';
			echo '<div class="card-columns">';
			while ($row = $query->fetch()){
				
				echo '<div class="card">';
				
				$product_thing = $row['product_id'];
				echo '<a href="product_builder.php?id='.$product_thing.'">';
				echo '<img src="images/'.$row['product_img1'].'" class="card-img-top" alt="'.$row['product_img1'].'">';
				echo '</a>';
				
				echo '<div class="card-body">';
				echo '<h5 class="card-title">'.$row['product_name'].'</h5>';
				echo '<p class="card-text">'.$row['product_desc'].'</p>';
				echo '<p class="card-text">'.'$'.$row['product_price'].'</p>';
				echo '<form method="post" action="product_builder.php">';
				echo '<input type="hidden" name="product_id" value="'.$row['product_id'].'">';
				echo '<button type="submit" name="submit" value="" class="btn btn-secondary btn-sm">Learn More</button>';
				echo '</form>';
				echo '</div>';
				echo '</div>';
				
			}
			echo '</div>';
			echo '</div>';
		}
	}
	
	
	require_once('library/footer.html');
	//<div class="card-body">
		  //<h5 class="card-title">Card title</h5>
		  //<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
		//</div>
	//</div>
	
?>