<?php
	require_once('library/session.php');
	
	function buildProduct($product_num){
		require_once('procedures/pdo_connect.php');
		$caller = $product_num;
		$sql = "CALL productBuild('$caller')";
		
		try {
			$query = $connect->query($sql);
			$query->setFetchMode(PDO::FETCH_ASSOC);
		} catch(PDOException $q_error){
			echo 'Damn it'. $q_error;
		}
		if (!$query){
			echo 'Something went wrong';
		} else {
			while ($row = $query->fetch()){
				
				echo '<div class="container" style="border: 1px solid #000">';
					echo '<div class="row">';
						echo '<div class="col-sm-6">'; //Left Hand Side
							echo '<h3 class="products">'.$row['product_category'].'</h3>';
							echo '<br>';
							echo '<img src="images/'.$row['product_img1'].'">';
							
							echo '<hr width="90%" color="black";>';
							
							echo '<button type="image" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin: 0px; padding:0px; border: 0px;">';
							echo '<img src="images/'.$row['product_img1'].'"class="img_thumb">';
							echo '</button>';
							
							echo '<button type="image" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin: 2px; padding:2px; border: 0px;">';
							echo '<img src="images/'.$row['product_img2'].'"class="img_thumb">';
							echo '</button>';
							
							
							
							echo'<!-- Large modal -->
								<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
												  <ol class="carousel-indicators">
													<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"style= "margin-right: 20px;"><img src="images/'.$row['product_img1'].'"class="img_thumb2"></li>
													<li data-target="#carouselExampleIndicators" data-slide-to="1"><img src="images/'.$row['product_img2'].'"class="img_thumb2"></li>
												  </ol>
												  <div class="carousel-inner">
													<div class="carousel-item active">
													  <img src="images/'.$row['product_img1'].'" class="d-block w-100" alt="...">
													</div>
													<div class="carousel-item">
													  <img src="images/'.$row['product_img2'].'" class="d-block w-100" alt="...">
													</div>
												  </div>
												  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
													<span class="carousel-control-prev-icon" aria-hidden="true"></span>
													<span class="sr-only">Previous</span>
												  </a>
												  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
													<span class="carousel-control-next-icon" aria-hidden="true"></span>
													<span class="sr-only">Next</span>
												  </a>
												</div>
											</div>
										</div>
									</div>
								</div>';

							
						echo '</div>';
						echo '<div class="col-sm-6">'; //Right Side Here
							echo '<h3 class="products">'.$row['product_name'].'</h3>';
							echo '<br><br><p>'.$row['product_desc'].'</p>';
							echo '<br><br><h4>$'.$row['product_price'].'</h4>';
							
							if($row['product_quant'] <= 10){
								echo '<br><h3 style="color: red; font-style:italic;">Quantities are limited, only '.$row['product_quant'].' left in stock.</h3>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
		}
	}
	function loadCode(){
		require_once('library/head_sec.html');
		require_once('library/header_sec.html');
		require_once('library/main_menu.html');
	}
	

	if (ISSET($_POST['submit'])){
		loadCode();
		$product_num = $_POST['product_id'];
		buildProduct($product_num);
		require_once('library/footer.html');
	} else {
		loadCode();
		$product_num = @$_REQUEST['id'];
		buildProduct($product_num);
		require_once('library/footer.html');
	}
	
?>