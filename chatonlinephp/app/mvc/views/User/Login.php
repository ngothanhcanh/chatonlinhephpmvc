<?php include './app/mvc/views/Header_Footer/header.php' ?>
<!-- body start -->
<div class="container">
		<div class="form-container">
			<h2>Đăng nhập</h2>
			<h3><?php 
			if(!empty($errorslogin))
			{
			foreach($errorslogin as $error)
			{  
				echo $error;
			}
		    }
			?>
			</h3>
			<form method="post" action="<?=URL ?>/User/login">
				<label for="username">Email:</label>
				<input type="email" name="email" required>

				<label for="password">Mật khẩu:</label>
				<input type="password"  name="password" required>

				<input type="submit" name="submitlogin" value="Đăng nhập">

				<p>Bạn chưa có tài khoản? <a href="<?php echo URL ?>/User/register">Đăng ký</a></p>
				<p>Bạn quên mật khẩu? <a href="<?php echo URL ?>/Sendmail/sendmail">Quên Mật Khẩu</a></p>
			</form>
		</div>
	</div>
<!-- end body -->
<?php include './app/mvc/views/Header_Footer/footer.php' ?>
    
