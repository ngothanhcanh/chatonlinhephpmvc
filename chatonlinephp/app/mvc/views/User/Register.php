<?php include './app/mvc/views/Header_Footer/header.php' ?>
<!-- body start -->
<div class="container">
	<div class="form-container">
		<h2>Đăng ký</h2>
		<h3>
			<?php if (!empty($errors)) {?> 						
					<?php foreach ($errors as $error) : ?>
						<?php echo $error; ?>
					<?php endforeach; ?>				   
             <?php }?></h3>
<form method="post" action="<?php echo URL ?>/User/register" enctype="multipart/form-data">
	<label for="username">Name:</label>
	<input type="text" name="username" required>

	<label for="email">Email:</label>
	<input type="email" name="email" required>

	<label for="password">Password:</label>
	<input type="password" name="password" required>

	<label for="password">Confirm password:</label>
	<input type="password" name="cpassword" required>

	<input type="file" name="image" accept="image/png, image/jpeg, image/jpg" enctype="multipart/form-data" required>

	<input type="submit" name="submit-register" value="Đăng Ký">

	<p>Bạn đã có tài khoản? <a href="<?php echo URL ?>/User/login">Đăng nhập</a></p>
</form>
</div>
</div>
<!-- end body -->
<?php include './app/mvc/views/Header_Footer/footer.php' ?>