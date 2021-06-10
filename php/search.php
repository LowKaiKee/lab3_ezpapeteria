<html>
	<head>
		<title>Search Result Page</title>
		<link rel="shortcut icon" type="image" href="../images/ezlogo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="../js/validate.js"></script>
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		<div class="header">
			<h1>The result for your searching......</h1>
		</div>
		<div class="navbar">
			<a href="mainpage.php" class="right">Back</i></a>
		</div>
		<?php
			
			$con = mysqli_connect("localhost","root","") or die("Unable to connect");
			mysqli_select_db($con,"myshopdb");
			
			$prname = $_POST['prname'];
			$prtype = $_POST['prtype'];
			
			if ($prtype == "noselection") {
				$sqlsearch = "SELECT * FROM tbl_products WHERE prname LIKE '%$prname%' ORDER BY prid DESC";
				} else {
				$sqlsearch = "SELECT * FROM tbl_products WHERE prtype = '$prtype' AND prname LIKE '%$prname%' ORDER BY prid DESC";
			}
			
			
			$sql = $con -> query($sqlsearch);
			if($sql->num_rows >0){
				while ($row = $sql->fetch_array()){
					
				?>
				<div class="column">
					<div class="card">
						<div class="left">
							<img src = "/lab3/images/<?php echo $row['image'];?>" style="width:100%">
						</div>
						<div class="right">
							<p>&nbsp&nbsp<?php echo $row['prname']; ?></p>
							<p>Product Type: &nbsp&nbsp<?php echo $row['prtype']; ?></p>
							<p>Product Price: &nbsp&nbsp<?php echo $row['prprice']; ?></p>
							<p>Quantity: &nbsp&nbsp<?php echo $row['prqty']; ?></p>
						</div>
					</div>
				</div>
				<?php
					
				}}
		else{
		echo "<script>alert('No matched results found.')</script>";
		echo "<script>window.location.replace('../php/mainpage.php')</script>";
		}
		?>
		
		</body>
		</html>									