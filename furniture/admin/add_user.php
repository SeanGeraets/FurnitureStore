<?php include('library/session.php');?>

<?php include('library/head_sec.html'); ?>

<body>
	<main class="container">
		<header>
			<?php require('library/header_sec.html'); ?>
		</header>
			<?php require_once('library/main_menu.html');?>
			
		<div class="fluid-container" style="border: 1px solid #000">
		<h1 class="product-header">Welcome - Add Users Here</h1>
			<!-- Start Form -->
			<form class="product_form" method="post" action="procedures/upload_user.php" enctype="multipart/form-data">
				<label>User Type</label>
				<select class="form-control form-control-sm" name="form_user_type">
					<option value="general">General</option>
					<option value = "admin">Admin</option>
				</select>
				<label>Username</label>
				<input class="form-control form-control-sm" type="text" name="form_user_name">
				<label>Password</label>
				<input class="form-control form-control-sm" type="text" name="form_password">
				<br><br>
				<button type="submit" class="btn btn-primary" name="submit">Upload User</button>
				<button type="reset" class="btn btn-primary" name="reset">Clear Form</button>
			</form>
		</div>
	</main>
</body>