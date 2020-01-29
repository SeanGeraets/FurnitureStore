<?php include('library/session.php');?>

<?php include('library/head_sec.html'); ?>

<body>
	<main class="container">
		<header>
			<?php require('library/header_sec.html'); ?>
		</header>
			<?php require_once('library/main_menu.html');?>
			
		<div class="fluid-container" style="border: 1px solid #000">
			<h1 class="product-header">Welcome - Add Products Here</h1>
			<!-- Start Form -->
			<form class="product_form" method="post" action="procedures/upload_product.php" enctype="multipart/form-data">
				<label>Category</label>
				<select class="form-control form-control-sm" name="product_category">
					<option value="Couches">Couches</option>
					<option value = "Chairs">Chairs</option>
					<option value="Loveseats">Loveseats</option>
					<option value="Bathroom">Bathroom</option>
					<option value="Dining Room">Dining Room</option>
					<option value="Outdoor">Outdoor</option>
				</select>
				<label>Product Name</label>
				<input class="form-control form-control-sm" type="text" name="product_name">
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" value="product_desc" name="product_desc"></textarea>
				</div>
				<label>Price</label>
				<input class="form-control form-control-sm" type="text" name="product_price">
				<label>Quantity</label>
				<input class="form-control form-control-sm" type="text" name="product_quant">
				<label>Image 1</label>
				<div class="form-group">
				<label for="exampleFormControlFile1">Example file input</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="product_img1">
				</div>
				<label>Image 2</label>
				<div class="form-group">
				<label for="exampleFormControlFile1">Example file input</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="product_img2">
				</div>
				<br><br>
				<button type="submit" class="btn btn-primary" name="submit">Upload Product</button>
				<button type="reset" class="btn btn-primary" name="reset">Clear Form</button>
			</form>
		</div>
	</main>

</body>