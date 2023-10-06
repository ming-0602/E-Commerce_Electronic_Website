<?php

    session_start();
    include 'config.php';
    error_reporting(0);

?>

<?php 
    if(isset($_SESSION['email'])){
    require_once("topnavigationbar.html");
    }else{
        require_once('notloggedinnav.html');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electron -Phones</title>
</head>
<body>

<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">

							<div class="input-checkbox">
									<!-- <input type="checkbox" id="category-1"> -->
									<label for="category-1">
										<a href="./productpage.php"><span>All Products</span></a>
										
										<!-- <small>(120)</small> -->
									</label>
								</div>

								<div class="input-checkbox">
									<!-- <input type="checkbox" id="category-2"> -->
									<label for="category-2">
										<a href="./laptop.php"><span>Laptop</span></a>
										
										<!-- <small>(740)</small> -->
									</label>
								</div>

								<div class="input-checkbox">
									<!-- <input type="checkbox" id="category-3"> -->
									<label for="category-3">
										<a href="tablet.php"><span>Tablets</span></a>
										
										<!-- <small>(1450)</small> -->
									</label>
								</div>

								<div class="input-checkbox">
									<!-- <input type="checkbox" id="category-4"> -->
									<label for="category-4">
										<a href="./audio.php"><span>Audio</span></a>
										
										<!-- <small>(578)</small> -->
									</label>
								</div>

								<div class="input-checkbox">
									<!-- <input type="checkbox" id="category-5"> -->
									<label for="category-5">
										<a href="./phone.php" style = 'color:#D10024'><span>Phones</span></a>
										
										<!-- <small>(120)</small> -->
									</label>
								</div>

								<div class="input-checkbox">
									<!-- <input type="checkbox" id="category-6"> -->
									<label for="category-6">
										<a href="./cable.php"><span>Cable</span></a>
										
										<!-- <small>(740)</small> -->
									</label>
								</div>
							</div>
						</div>
						
						

						
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						

						<!-- store products -->
						<div class="row">
							
							
							<!-- /product -->

                            <?php
                                $conn = mysqli_connect("localhost","root","","electron");
                                $query = "SELECT * FROM `product` WHERE `product_category` = 'Phone'";
                                $result = mysqli_query($conn,$query);
                                foreach($result as $result){
									echo"<form method='post'>";
                                    $name = $result['product_name'];
                                    $image = $result['product_image'];
                                    $price = $result['product_price'];
									$id = $result['product_id'];
                                    echo"<div class='col-md-4 col-xs-6'>";
                                    echo"<div class='product'>";
                                    echo"<div class='product-img'>";
                                    echo"<img src='./productimg/$image' alt='' style='width: 263px;height: 180px;'>";
                                    echo"</div>";
                                    echo"<div class='product-body'>";
                                    echo"<p class='product-category'>Category</p>";
                                    echo"<h3 class='product-name'><a href='specificproduct.php?id=$id'>$name</a></h3>";
									echo "<input type='hidden' name='price' value='".$result['product_price']."'>";
									echo "<input type='hidden' name='productid' value='".$result['product_id']."'>";
									echo "<input type='hidden' name='productimage' value='".$result['product_image']."'>";
									echo "<input type='hidden' name='productname' value='".$result['product_name']."'>";
                                    echo"<h4 class='product-price'>$$price </h4>";
                                    echo"</div>";
                                    echo"<div class='add-to-cart'>";
                                    echo"<button class='add-to-cart-btn' name='addtocartbutton'><i class='fa fa-shopping-cart'></i> add to cart</button>";
                                    echo"</div>";
                                    echo"</div>";
                                    echo"</div>";
									echo"</form>";
                                    
                                }
                            ?>


							<?php
								if(isset($_POST['addtocartbutton'])){
									if(isset($_SESSION['email'])){
										$getid = $_POST['productid'];
										
										$getitemprice = $_POST['price'];
										
										$getuseremail = $_SESSION['email'];
										$getimage = $_POST['productimage'];
										$getname = $_POST['productname'];
										
										$query = "INSERT INTO `cart`(`cart_id`, `item_id`, `item_name`, `item_price`, `item_image`, `user_email`) VALUES ('','$getid','$getname','$getitemprice','$getimage','$getuseremail')";
										$result = mysqli_query($conn,$query);
										echo"<script>";
										echo"alert('Item Added to Cart!')";
										echo"</script>";
									
									}else{
										// header('Location:login.php');
										echo "<script>";
										echo"alert('Please Login!');";
										echo"window.location.replace('login.php');";
										echo "</script>";

									}
								}



							?>


						</div>
						<!-- /store products -->

						
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->




</body>
</html>