<?php include('library/session.php');?>

<?php include('library/head_sec.html'); ?>

<body>
	<main class="container">
		<header>
			<?php require('library/header_sec.html'); ?>
		</header>
			<?php require_once('library/main_menu.html');?>
			
		<div class="fluid-container" style="border: 1px solid #000">
		<h1 class="product-header">Welcome - Search Products Here</h1>
		<!-- Start Form -->
			<form class="product_form" method="post" action="procedures/search_product.php" enctype="multipart/form-data">
				<label>Product Category</label>
					<?php 
						require_once('procedures/pdo_connect.php');
						echo '<select class="form-control form-control-sm" name="product_category_search">';
						echo '<option value=""></option>';
						$sql = "SELECT DISTINCT product_category FROM products";
						$query = $connect->query($sql);
						while ($row = $query->fetch()){
							echo '<option value="'.$row['product_category'].'">'.$row['product_category'].'</option>';
						}
					?>
				</select>
				<label>Product Id</label>
					<?php 
						require_once('procedures/pdo_connect.php');
						echo '<select class="form-control form-control-sm" name="product_id_search">';
						echo '<option value=""></option>';
						$sql = "SELECT DISTINCT product_id FROM products";
						$query = $connect->query($sql);
						while ($row = $query->fetch()){
							echo '<option value="'.$row['product_id'].'">'.$row['product_id'].'</option>';
						}
					?>
				</select>
				<label>Product Name</label>
					<?php 
						require_once('procedures/pdo_connect.php');
						echo '<select class="form-control form-control-sm" name="product_name_search">';
						echo '<option value=""></option>';
						$sql = "SELECT DISTINCT product_name FROM products";
						$query = $connect->query($sql);
						while ($row = $query->fetch()){
							echo '<option value="'.$row['product_name'].'">'.$row['product_name'].'</option>';
						}
					?>
				</select>
				<br>
				<button type="submit" class="btn btn-primary" name="submit">Upload Search</button>
				<button type="reset" class="btn btn-primary" name="reset">Clear Form</button>
			</form>
		</div>
	</main>
</body>