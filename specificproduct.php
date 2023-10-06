<?php
    session_start();
    include_once("config.php");
    $conn = connection();

	


?>
	
<?php 
	
	if(isset($_SESSION['email'])){
		require_once("topnavigationbar.html");
	}else{
		require_once("notloggedinnav.html");
	}
?>

	<?php
       
        $var_value3 = $_GET['id'];

        
        // $query = "SELECT * FROM product WHERE (`product_name` = $var_value AND `product_price` = $var_value )";
        $query = "SELECT * FROM product WHERE product_id = '$var_value3'";
        $product = $conn->query($query) or die($conn->error);
        $row = mysqli_fetch_array($product);
        
        ?>
        



		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<!-- <img src="./productimg/" alt="" style="width: 350px;"> -->
                                <img src='./productimg/<?php echo $row['product_image']?>' alt="" style="width: 350px;">
							</div>
						</div>
					</div>
					<!-- /Product main img -->
					<div class="col-md-2  col-md-pull-5">
					</div>
					

					<!-- Product details -->
					<form method='post'>
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo $row['product_name']?></h2>
							<input type="hidden" name='price' value="<?php echo $row['product_price']?>">
							<input type="hidden" name='productid' value="<?php echo $row['product_id']?>">
							<input type="hidden" name='productimage' value="<?php echo $row['product_image']?>">
							<input type="hidden" name='productname' value="<?php echo $row['product_name']?>">

							
							<div>
								<h3 class="product-price"><?php echo $row['product_price']?> </h3>
								<span class="product-available">In Stock</span>
							</div>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> -->

							

							<div class="add-to-cart">
								<button class="add-to-cart-btn" name='addtocartbutton'><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>

							</form>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<!-- <li><a data-toggle="tab" href="#tab2">Details</a></li> -->
								<!-- <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li> -->
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">

	 										<?php 
											 
											 if($row['product_category'] != "Cable" and $row['product_category']!="Laptop")
											 {
												$batvar = $row['product_battery'];
												echo"<p>Product Battery: $batvar </p><br>";
											 }

											 if($row['product_category'] != "Cable" and $row['product_category']!="Audio")
											 {
												echo"<p>Product Display : ",$row['product_display']; echo"</p><br>";
												echo"<p>Product Memory : ",$row['product_memory']; echo"</p><br>";
												echo"<p>Product OS : ",$row['product_os']; echo"</p><br>";
												echo"<p>Product Camera :",$row['product_camera']; echo"</p><br>";
												echo"<p>Product RAM : ",$row['product_ram']; echo"</p><br>";
												echo"<p>Product GPU : ",$row['product_gpu']; echo"</p><br>";
												echo"<p>Product CPU : ",$row['product_cpu']; echo"</p><br>";
												echo"<p>Product Category : ",$row['product_category']; echo"</p><br>";


											 }

											 if($row['product_category'] == "Cable"){
												echo"<p>No Description</p>";

											 }
											 
											 
											 ?>	

											

											<?php 

												if(isset($_POST['addtocartbutton'])){
													if(isset($_SESSION['email'])){
														$getuseremail = $_SESSION['email'];
														$getid = $_POST['productid'];
														$getprice = $_POST['price'];
														$getimage = $_POST['productimage'];
														$getname = $_POST['productname'];

														$query = "INSERT INTO `cart`(`cart_id`, `item_id`, `item_name`, `item_price`, `item_image`, `user_email`) VALUES ('','$getid','$getname','$getprice','$getimage','$getuseremail')";
														$result = mysqli_query($conn,$query);
														echo"<script>";
														echo"alert('Item Added to Cart!')";
														echo"</script>";
													}else{
														echo "<script>";
														echo"alert('Please Login!');";
														echo"window.location.replace('login.php');";
														echo "</script>";

													}

												}




											 


											
											?>




										</div>
									

								
										
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		

		<?php 
            require_once('loggedinfooter.html');
        ?>

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
