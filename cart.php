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

<title>Electron - Cart</title>
<?php 
    $email = $_SESSION['email'];
    $query = "SELECT * FROM `cart` WHERE `user_email` = '$email'";
    $result = mysqli_query($conn,$query);

    $query2 = "SELECT SUM(item_price) as totalprice FROM `cart` WHERE `user_email` = '$email'";
    $result2 = mysqli_query($conn,$query2);
    // $r = mysqli_fetch_assoc($result2);


?>

<link rel="stylesheet" href="./css/cart.css">

	<p style="text-align:center; font-size:60px; font-family: 'Dongle', sans-serif;">Shopping Cart</p>
	<table width='90%' align='center'>
		<tr>
			<td style="color: black;border: ridge;"></td>
			<th>Product Name</th>
			<th>Product Image</th>
			<th>Product Price</th>
			<!-- <th>Total</th> -->
		</tr>
       

        
        <?php

            $total = 0;
            foreach($result as $result){
                echo"<form method='POST' onSubmit='cart.php.reload()'>";
                echo"<tr>";
                echo"<td style='color: black;border: ridge;'><a href='deletecartid.php?cartid=".$result['cart_id']."'><input type='button' name='removebutt' value='REMOVE'></a></td>";
                echo"<input type='hidden' name='cartid' value='".$result['cart_id']."'>";
                echo"<td style='color: black;border: ridge;'>".$result['item_name']."</td>";
                echo"<td style='color: black;border: ridge;'><img src='./productimg/".$result['item_image']."' alt='' style='width:130px'></td>";
                echo"<td style='color: black;border: ridge;'>$".$result['item_price']."</td>";
                
                echo"</tr>";
                echo"</form>";
                $total = $total + $result['item_price'];
            }

        ?>  








	<td colspan='3' align='right' style="font-weight: bold; border: ridge 3px; text-align:right">Subtotal: </td>
	<td style="font-weight: bold; border: ridge 3px;">$<?php echo $total; ?></td>
		<tr>
			<!-- <td colspan='5' style="text-align:right;"><button class="btn"><a href="" class="button" >Checkout</a></button></td> -->
                <?php  
                    if($total === 0 ){
                        echo"<td colspan='5' style='text-align:right;'><button class='btn'disabled >Checkout</button></td>";
                    }
                    if($total > 0){
                        echo"<td colspan='5' style='text-align:right;'><button class='btn'><a href='checkout.php?total=$total' class='button'>Checkout</a></button></td>";
                    }

                ?>

		<tr>
</table>