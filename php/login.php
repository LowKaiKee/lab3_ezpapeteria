<?php
	include_once("dbconnect.php");
	session_start();
	$email = trim($_POST['email']);
	$password = trim(sha1($_POST['password']));
	
	$_SESSION ["email"]=$email;
    $_SESSION ["password"]=$password;
	
	$sqllogin = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password' AND otp = '1'";
	
	$stmt = $conn->prepare($sqllogin);
	$stmt->bindParam('email', $email, PDO::PARAM_STR);
	$stmt->bindValue('password', $password, PDO::PARAM_STR);
	$stmt->execute();
	$count = $stmt->rowCount();
	$row   = $stmt->fetch(PDO::FETCH_ASSOC);
	if($count == 1 && !empty($row)) {
		echo "<script> alert('Login successful. Welcome to EZ Papeteria.')</script>";
		echo "<script> window.location.replace('../php/mainpage.php')</script>";
		}else{
		echo "<script> alert('Login failed. Please verify your account and check the details that you fill in to log in.')</script>";
		echo "<script> window.location.replace('../html/login.html')</script>";
	}
?>
