<?php
	session_start();
	$email=$_SESSION ["email"];
	$password=$_SESSION ["password"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>EZ Papeterie</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
		<a href="../index.html" class="right">Log out</i></a>
	</div>
	<center>
		<div class="main">
			<center>
				<img src="../images/ezlogo.png">
				<h1 class="xlarge-font"><b>Welcome to EZ Papeterie</b></h1>
				<p><b><?php echo $email?></b></p>
				<p>We are always ready to serve you.</p>
			</center>
		</div>
		<center>
			<h1 class="xlarge-font"><b>List of Our Products</b></h1>
		</center>
		
		<form action="search.php" method="POST" align="center">
			<div class="row">
				<div class="column">
					<input type="text" id="idprname" name="prname" placeholder="Search" />
				</div>
				<div class="column">
					<select name="prtype" id="idprtype">
						<option value="noselection">Please select the product type</option>
						<option value="Stationery">Stationery</option>
						<option value="Book">Book</option>
						<option value="Accessories">Accessories</option>
					</select>
				</div>
				<div class="column">
					<button type="submit" name="button" value="search"><i class="fa fa-search"></i></button>
				</div>
			</div>
		</form>
		
		<br>
		<div class="row">
			<?php
				$conn = mysqli_connect("localhost","root","") or die("Unable to connect");
				mysqli_select_db($conn,"myshopdb");
				
				$sql ="SELECT * FROM tbl_products ORDER BY prid DESC";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){
					?>
					
					<div class="column">
						<div class="card">
							<img src = "/lab3/images/<?php echo $row['image'];?>" style="width:100%">
							<p class="category">&nbsp&nbsp<?php echo $row['prname']; ?></p>
							<p class="category">Product type: &nbsp&nbsp<?php echo $row['prtype']; ?></p>
							<p class="category">Product price: &nbsp&nbsp<?php echo $row['prprice']; ?></p>
							<p class="category">Quantity: &nbsp&nbsp<?php echo $row['prqty']; ?></p>
						</div>
					</div>
					<?php
					}
				}
			?>
		</div>
	<br>
	<br>
	<br>
	<br>
	<a href="newproduct.php" class="float">
	<i class="fa fa-plus my-float"></i>
	<span class="tooltiptext">Click here to add new product</span>
	</a>
	</body>
	</html>																																						