<?php require_once('library/session.php');?>
<?php
	
	function loadCode(){
		require_once('library/head_sec.html');
		require_once('library/header_sec.html');
		require_once('library/main_menu.html');
	}
	
	loadCode();
	echo '<div class="container listings">';
		
		if(isset($_POST['search']) AND $_POST['search'] != ""){
			require_once('procedures/pdo_connect.php');
			$search = $_POST['search'];
			$sql = "CALL searchQueryTwo('$search')";
			
			try {
				$query = $connect->query($sql);
				$query->setFetchMode(PDO::FETCH_ASSOC);
			} catch (PDOException $q_error){
				echo 'No query results for you';
			}
			if(!$query){
				echo 'No results found';
			}else{
				while ($row = $query->fetch()){
					echo '<p>'.$row['product_desc'].'</p>';
				}
			}
		}else{
			echo "No results for you";
		}
		
		
		
	echo '</div>';
	require_once('library/footer.html');
?>