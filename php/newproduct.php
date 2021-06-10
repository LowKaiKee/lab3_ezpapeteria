<?php
	include_once("dbconnect.php");
	
	if (isset($_POST['submit'])) {
		$primage = uniqid() . '.png';
		$prname = $_POST['prname'];
		$prtype = $_POST['prtype'];
		$prprice = $_POST['prprice'];
		$prqty = $_POST['prqty'];
		
		
		if (file_exists($_FILES["primage"]["tmp_name"]) || is_uploaded_file($_FILES["primage"]["tmp_name"])) {
			$sqlinsertprod =  "INSERT INTO tbl_products(image,prname, prtype, prprice, prqty) VALUES('$primage','$prname','$prtype','$prprice','$prqty')";
			if ($conn->exec($sqlinsertprod)) {
				uploadImage($primage);
				echo "<script>alert('Successfully added a new product to your list.')</script>";
				echo "<script>window.location.replace('../php/mainpage.php')</script>";
				} else {
				echo "<script>alert('Failed to add a new product to your list.')</script>";
				echo "<script>window.location.replace('../php/newproduct.php')</script>";
				return;
			}
			} else {
			echo "<script>alert('Image not available')</script>";
			echo "<script>window.location.replace('../php/newproduct.php')</script>";
			return;
		}
	}
	
	function uploadImage($primage)
	{
		$target_dir = "/xampp/htdocs/lab3/images/";
		$target_file = $target_dir . $primage;
		move_uploaded_file($_FILES["primage"]["tmp_name"], $target_file);
	}
	
?>

<!DOCTYPE html>
<html>
	
	<head>
		<title>Add New Product</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="../js/validate.js"></script>
		<link rel="stylesheet" href="../css/style.css">
		<link rel="shortcut icon" type="image" href="../images/ezlogo.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
	<body>
		<div class="header">
			<h1>EZ Papeterie</h1>
			<p><b>Your best stationery partner</b></p>
		</div>
		<div class="navbar">
			<a href="mainpage.php" class="right">Back</a>
		</div>
		<div class="main">
			<div class="container">
				<form name="newForm" action="../php/newproduct.php" onsubmit="return validateNewForm()" method="post" enctype="multipart/form-data">
					<div class="row" align="center">
						<img class="imgselection" src="../images/camera.png"><br>
						<input type="file" onchange="previewFile()" name="primage" id="idimage" accept="image/*"><br>
					</div>
					
					<div class="row">
						<div class="col-25">
							<i class="fa fa-pencil-square-o"></i>
							<label for="prname">Product Name</label>
						</div>
						<div class="col-75">
							<input type="text" id="idname" name="prname" placeholder="Please key in the product name">
						</div>
					</div>
					<div class="row">
						<div class="col-25">
							<i class="fa fa-suitcase"></i>
							<label for="prtype">Product Type</label>
						</div>
					</div>
					<div class="col-75">
						<select name="prtype" id="idtype">
							<option value="noselection">Please select the product type</option>
							<option value="Stationery">Stationery</option>
						<option value="Book">Book</option>
						<option value="Accessories">Accessories</option>
						</select>
						</div>
						<div class="row">
						<div class="col-25">
						<i class="fa fa-money"></i>
						<label for="prprice">Product Price</label>
						</div>
						<div class="col-75">
						<input type="text" id="idprice" name="prprice" placeholder="Please key in the product unit price(RM)">
						</div>
						</div>
						<div class="row">
						<div class="col-25">
						<i class="fa fa-sort-numeric-asc"></i>
						<label for="prqty">Product Quantity</label>
						</div>
						<div class="col-75">
						<input type="number" id="idqty" name="prqty" placeholder="Please key in the product quantity" min="1" max="100">
						</div>
						</div>
						<br>
						<div class="row">
						<div><input type="submit" name="submit" value="Add new product"></div>
						</div>
						</form>
						</div>
						</div>
						<br>
						<br>
						<br>
						<br>
						<div class="footer">
						<p><b>Copyright 2021 <span>&#169;</span> My Shop. All rights reserved.</b></p>
						</div>
						</body>
						
						</html>		
						
						<script>
						function previewFile() {
						const preview = document.querySelector('.imgselection');
						const file = document.querySelector('input[type=file]').files[0];
						const reader = new FileReader();
						reader.addEventListener("load", function () {
						// convert image file to base64 string
						preview.src = reader.result;
						}, false);
						
						if (file) {
						reader.readAsDataURL(file);
						}
						}
						</script>												