<?php include './app/mvc/views/Header_Footer/header.php' ?>
<!-- body start -->
<div class="container">
		<div class="form-container">
			<h2>Quên Mật Khẩu</h2>
			<h3><?php 
			
			foreach($error as $errorr)
			{  
				echo $errorr;
			}
		    
			?>
			</h3>
			<form method="post" action="<?=URL ?>/Sendmail/sendmail">
				<label for="username">Email:</label>
				<input type="email" name="email" required>

				<input type="submit" name="submitforgot" value="Đăng nhập">

				<p>Quay lại đăng nhập<a href="<?php echo URL ?>/User/login">Đăng nhập</a></p>
			</form>
		</div>
	</div>
<!-- end body -->
<?php include './app/mvc/views/Header_Footer/footer.php' ?>