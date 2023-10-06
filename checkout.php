<?php

    session_start();
    include 'config.php';
    error_reporting(0);
	$conn = connection();

?>

<?php 
     

    if(isset($_SESSION['email'])){
        // print($_SESSION['email']);
        require_once("topnavigationbar.html");
    }else{
        require_once('notloggedinnav.html');
    }


?>

<?php
    $email = $_SESSION['email'];
    $query = "SELECT * FROM `cart` WHERE `user_email` = '$email'";
    $result = mysqli_query($conn,$query);


?>


<title>Electron - CheckOut</title>



		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<form action="" method="POST">
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip-code" placeholder="ZIP Code" required>
							</div>
							<div class="section-title">
								<h3 class="title">Payment Info</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="creditcardno" placeholder="XXXX XXXX XXXX XXXX " required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="expiredate" placeholder="MM/YY" required>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="CVV" placeholder="CVV" required>
							</div>
							
							
						</div>
						<!-- /Billing Details -->
						
					</div>



					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">

                            

                            <?php 
                                $total = 0;
								foreach($result as $result){
                                    echo"<div class='order-col'> ";
                                    echo"<div>".$result['item_name']."</div>";
                                    echo"<div>".$result['item_price']."</div>";
                                    echo"</div>";
                                    $total = $total + $result['item_price'];
                                }


                            ?>

							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">$<?php echo $total ?></strong></div>
							</div>
						    </div>

						    <!-- <a href="" class="primary-btn order-submit">Place order<input type="submit"></a> -->
                            <input type="submit" class="primary-btn order-submit" value="PLACE ORDER" name="getthing">
                        </form>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<?php

            if(isset($_POST['getthing'])){

                $add = $_POST['address'];
                $zip = $_POST['zip-code'];
				$card = $_POST['creditcardno'];
				$cvv = $_POST['CVV'];
				$expdate = $_POST['expiredate'];

					// if((isset($_POST['address']) && (isset($_POST['zipcode'])) && (isset($_POST['creditcardno'])) && (isset($_POST['CVV'])) && (isset($_POST['expiredate'])) )){

						$space =" ";
						$addup = $add .$space. $zip;

						$email = $_SESSION['email'];
						$query = "SELECT * FROM `cart` WHERE `user_email` = '$email'";
						$result = mysqli_query($conn,$query);

						$total = 0;
						foreach($result as $result){
							$total = $total + $result['item_price'];
						}

					
						$todaydate = date("Y/m/d");
						$shippingdate = "0000-00-00";
						$status = "Preparing";


						$orderquery = "INSERT INTO `order1`(`order_id`, `user_email`, `total_price`, `address`, `order_date`, `shipping_date`, `delivery_status`) VALUES ('','$email','$total','$addup','$todaydate','$shippingdate','$status')";
						$result2 = mysqli_query($conn,$orderquery);

						$lastquery = "SELECT * FROM `order1` ORDER BY `order1`.`order_id` DESC";
						$lastrunquery = mysqli_query($conn,$lastquery);

					
						$lastquery = "SELECT * FROM `order1` ORDER BY `order_id` DESC";


						$lastrun = mysqli_query($conn,$lastquery);
						
						
						$temarray = array();

						foreach($lastrun as $lastrun){
							// echo $lastrun['order_id'];
							array_push($temarray,$lastrun['order_id']);
						}
						
						$first = array_values($temarray)[0];

						// echo $first;

						$query = "SELECT * FROM `cart` WHERE `user_email` = '$email'";
						$result = mysqli_query($conn,$query);
						
						// echo"sdasdsadasdsa";
						foreach($result as $result){
							// echo "1";
							$proid = $result['item_id'];
							// echo"2";
							$proprice = $result['item_price'];
							// echo"3";
							$orderdetailquery = "INSERT INTO `order_detail`(`orderdetail_id`, `product_id`, `user_email`, `price`, `order_id`) VALUES('','$proid','$email','$proprice','$first')";
							// echo"4";
							$result4 = mysqli_query($conn,$orderdetailquery);
							// echo"5";


						}
    
                


						$query5 = "DELETE FROM `cart` WHERE `user_email` = '$email'";
						$result5 = mysqli_query($conn,$query5);

						echo "<script>";
						echo "alert('Payment Successfully Made!');";
						echo"window.location.replace('ordersummary.php?orderid=$first');";
						echo"</script>";
                
                
                

            
            		}
					// else{
					// 	echo"<script>";
					// 	echo"alert('Input Invalid!, Please Check Again);";
					// 	echo"</script>";
					// }

			// }

            

            

            

             
            




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
