<?php
    session_start();

    //get info of selected product
    $id=$_GET['id'];

	//Datebase connection
    include_once("config.php");
    $conn = connection();
    
	//Get selected product info
	$query = "SELECT * FROM `product` WHERE `product_id` = '$id'";

	$product = $conn->query($query) or die($conn->error);
	$row = mysqli_fetch_array($product);

	//If modify button is pressed
	if(isset($_POST['modify'])) {
		//Data from the form
		$name = $_POST['name'];
        $price = $_POST['price'];
		$battery = $_POST['battery'];
        $display = $_POST['display'];
        $memory = $_POST['memory'];
        $os = $_POST['os'];
        $camera = $_POST['camera'];
        $ram = $_POST['ram'];
        $gpu = $_POST['gpu'];
        $cpu = $_POST['cpu'];

		//Modify data
        $query1 = "UPDATE `product` SET `product_name`='$name', `product_price`='$price' , `product_battery`='$battery', `product_display`='$display', `product_memory`='$memory', `product_os`='$os', `product_camera`='$camera', `product_ram`='$ram', `product_gpu`='$gpu', `product_cpu`='$cpu' WHERE `product_id`='$id'";
		$result=$conn->query($query1) or die($conn->error); ?>

		<script type="text/javascript">
			alert("Product has been modify!");
			window.location = 'modifyproduct.php'
		</script>
	<?php
	}

	//If delete button is press
	if(isset($_POST['delete'])) {
		//Modify data
        $query2 = "DELETE FROM `product` WHERE `product_id`='$id'";
		$result=$conn->query($query2) or die($conn->error); ?>

		<script type="text/javascript">
			alert("Product has been deleted!");
			window.location = 'modifyproduct.php'
		</script>
	<?php
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Electron - Modify Product</title>

		<style>
			* {
				font-family: 'Poppings', sans-serif;
			}

			body {
				background-color: whitesmoke;
				display: flex;
				justify-content: center;
            }

			.title {
				margin-top: 20px;
				font-size: 20px;
				font-weight: bolder;
				text-align: center;
				background-color: whitesmoke;
				position: absolute;
				background: linear-gradient(to right, #1282fa, #00fff2);
				-webkit-background-clip: text;
				background-clip: text;
				-webkit-text-fill-color: transparent;
				-moz-text-fill-color:transparent;
			}

			.backbut {
				margin-top: 50px;
				right: 100px;
				position: absolute;
				height: 70px;
				width: 270px;
				border: none;
				background-color: #e1e8e8;
				border-radius: 5px;
				font-weight: bold;
				font-size: 18px;
				outline: none;
				cursor: pointer;
				line-height: 72px;
				text-align: center;
				text-decoration: none;
				color: #222;
				transition: 1s;
			}

			.backbut:hover {
				margin-top: 55px;
				right: 100px;
				position: absolute;
				height: 70px;
				width: 270px;
				border: none;
				background-color: #aadad7;
				border-radius: 5px;
				font-weight: bold;
				font-size: 18px;
				outline: none;
				cursor: pointer;
				line-height: 72px;
				text-align: center;
				text-decoration: none;
				color: #222;
			}

			.container {
				margin-top: 150px;
				margin-bottom: 100px;
				width: 1000px;
				height: auto;
				background: #fff;
				border-radius: 20px;
				position: relative;
				box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
			}

			.topcontainer {
				height: auto;
				width: 1000px;
				display: flex;
			}

			.leftcontainer {
				width: 50%;
				height: auto;
			}

			.rightcontainer {
				width: 50%;
				height: auto;
			}

			label {
				font-size: 20px;
				font-weight: bold;
				margin-left: 100px;
				color: #222;
			}

			.inputbox {
				height: 5px;
				width: 200px;
				margin-left: 100px;
				margin-top: 5px;
				font-size: 16px;
				padding: 13px;
				border: 1px solid black;
				border-radius: 5px;
			}

			.imagebox {
				font-size: 16px;
				color: #222	;
				margin-left: 100px;
				margin-top: 5px;
				margin-bottom: 11px;
			}

			.imagebox:hover {
				cursor: pointer;
			}

			.submit-btn {
				height: 60px;
				width: 135px;
				margin-left: 240px;
				margin-bottom: 20px;
				border-radius: 10px;
				font-size: 20px;
				font-weight: bold;
				color: #222;
				background-color: #e1e8e8;
				cursor: pointer;
				transition: 1s;
				letter-spacing: 1px;
				border: none;
			}

			.submit-btn:hover {
				height: 60px;
				width: 135px;
				margin-left: 240px;
				border-radius: 10px;
				font-size: 20px;
				font-weight: bold;
				color: #222;
				background-color: #aadad7;
				cursor: pointer;
				transform: scale(1.1);
			}

		</style>
	</head>
	<body>
		<div class="title"><h1>Modify Product</h1></div>
		<a href="modifyproduct.php" class="backbut">Back to Admin Dashboard</a>
		<div class="container">
			<br><br><br>
			<form method="POST">
			<!-- Printing out all the details of the selectaed product in a form to modify -->
			<div class="topcontainer">
				<div class="leftcontainer">
					<label>Product Name : </label>
					<br>
					<input type="text" class="inputbox"  placeholder="" value="<?php echo $row['product_name']; ?>" name="name" required/>
					<br><br><br>
					<label>Product Price : </label>
					<br>
					<input type="number" class="inputbox"  min="1" placeholder="" value="<?php echo $row['product_price']; ?>" name="price" required/>
					<br><br><br>
			<?php 
				if ($row['product_category'] != "Cable" and $row['product_category'] != "Laptop") {
					echo '<label>Product Battery : </label>
					<br>
					<input type="text" class="inputbox"  placeholder="" value="' ,$row["product_battery"]; echo '"name="battery" required/>
					<br><br><br>';
				}

				if ($row['product_category'] != "Cable" and $row['product_category'] != "Audio") {
					echo '<label>Product Memory : </label>
					<input type="text" class="inputbox"  placeholder="" value="' ,$row["product_memory"]; echo '"name="memory" required/>
					<br><br><br>
					<label>Product OS : </label>
					<br>
					<input type="text" class="inputbox"  placeholder="" value="' ,$row["product_os"]; echo '"name="os" required/>';
				}
			?>
				</div>
				<div class="rightcontainer">
			<?php
				if ($row['product_category'] != "Cable" and $row['product_category'] != "Audio") {
					echo '<label>Product Camera : </label>
					<br>
					<input type="text" class="inputbox"  placeholder="" value="' ,$row["product_camera"]; echo '"name="camera" required/>
					<br><br><br>
					<label>Product Display : </label>
					<br>
					<input type="text" class="inputbox"  placeholder="" value="' ,$row["product_display"]; echo '"name="display" required/>
					<br><br><br>
					<label>Product Ram : </label>
					<br>
					<input type="text" class="inputbox"  placeholder="" value="' ,$row["product_ram"]; echo '"name="ram" required/>
					<br><br><br>
					<label>Product GPU : </label>
					<br>
					<input type="text" class="inputbox"  placeholder="" value="' ,$row["product_gpu"]; echo '"name="gpu" required/>
					<br><br><br>
					<label>Product CPU : </label>
					<br>
					<input type="text" class="inputbox"  placeholder="" value="' ,$row["product_cpu"]; echo '"name="cpu" required/>';
				}
			?>
				</div>	
			</div> 
            <br><br><br><br>
				<button type="submit" class="submit-btn" name="modify">Modify</button>
				<button type="submit" class="submit-btn" name="delete">Delete</button>
            </form>  			
		</div>
    </body>
</html>