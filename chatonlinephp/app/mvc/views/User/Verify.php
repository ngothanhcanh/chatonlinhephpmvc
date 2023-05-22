<?php include './app/mvc/views/Header_Footer/header.php' ?>
<!-- body start -->
<div class="container">
		<div class="form-container">
			<h2>Xác nhận đổi mật khẩu</h2>
			<h3><?php 	
			foreach($error as $errorr)
			{  
				echo $errorr;
			}
		    
			?>
			</h3>
			<form method="post" action="<?=URL ?>/Verify/verify">
				<label for="username">Mã OTP:</label>
				<input type="text" name="OTP" required>
                <input type="text" name="newpassword" required>
                <input type="text" name="newcpassword" required>
				<input type="submit" name="submitverify" value="Đăng nhập">

				<p>Quay lại đăng nhập<a href="<?php echo URL ?>/User/login">Đăng nhập</a></p>
			</form>
		</div>
	</div>
<!-- end body -->
<?php include './app/mvc/views/Header_Footer/footer.php' ?>