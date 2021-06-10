<!DOCTYPE html>
<html>
	<head>
		<title>Login Form</title>
		<link rel="shortcut icon" type="image" href="../images/ezlogo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="../js/valid.js"></script>
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		<div class="header">
			<h1>EZ Papeterie</h1>
			<p><b>Your best stationery partner</b></p>
		</div>
		<div class="navbar">
			<a href="../index.html" class="right">Back</a>
		</div>
		<div class="main">
			<div class="container">
				<form name="forgetForm" action="../php/forget.php" onsubmit="return validateForgetForm()" method="post">
					<div class="row">
						<div class="col-25">
							<i class="fa fa-envelope icon"></i>
							<label for="femail">Email</label>
						</div>
						<div class="col-75">
							<input type="text" id="idemail" name="email" placeholder="Please key in your email">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<i class="fa fa-key icon"></i>
							<label for="lname">New Password</label>
						</div>
						<div class="col-75">
							<input type="password" id="idpass" name="password" placeholder="Please key in your new password">
						</div>
					</div>
					<br>
					<div class="row">
						<input name="submit" type="submit" value="Reset Password">
					</div>
				</form>
			</div>
		</div>
		<div class="footer">
			<p><b>Copyright 2021 <span>&#169;</span> EZ Papeteria. All rights reserved.</b></p>
		</div>
		
		<?php
			$conn = mysqli_connect("localhost","root","") or die("Unable to connect");
			mysqli_select_db($conn,"myshopdb");
			
			if(isset($_POST['submit'])){
				//code...
				$email = trim($_POST['email']);
				$password = trim(sha1($_POST['password']));
				if(mysqli_query($conn,"UPDATE tbl_user SET password='$password' WHERE email='$email'")){
					
				?>
				<?php
					echo '<script type="text/javascript"> alert("Reset password successfully")</script>';
					header("refresh:1; url=../html/login.html");
				?>
				<?php
					}else{
					echo 'no result';
				}
			}
		?>
	</body>
</html>