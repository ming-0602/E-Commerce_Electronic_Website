<?php

    session_start();
    include 'config.php';
    error_reporting(0);

?>

<?php 
    if(isset($_SESSION['email'])){
        // print($_SESSION['email']);
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
    <title>Electron - Homepage</title>
</head>
<body>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop01.png" alt="" style="width: 300px;">
                    </div>
                    <div class="shop-body">
                        <h3>Laptop<br>Collection</h3>
                        <a href="./laptop.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop03.png" alt="" style="width: 300px;">
                    </div>
                    <div class="shop-body">
                        <h3>Audio<br>Collection</h3>
                        <a href="./audio.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop02.png" alt="" style="width: 300px;">
                    </div>
                    <div class="shop-body">
                        <h3>Accessories<br>Collection</h3>
                        <a href="./cable.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Products</h3>
                    
                </div>
            </div>
        </div>

    </div>
</div>

<div class="section" >

<div class="container" " >

<div class="row">

        <?php 
            $conn = mysqli_connect("localhost","root","","electron");
            $query = "SELECT * FROM `product` ORDER BY `product_id` LIMIT 3";
            $result = mysqli_query($conn,$query);
            foreach($result as $result){
                echo"<form method='post'>";
                $name = $result['product_name'];
                $image = $result['product_image'];
                $price = $result['product_price'];
                $id = $result['product_id'];
		        echo'<div class="col-md-4 col-xs-6 ">';
                echo'<div class="row ">';
                echo'<div class="products-tabs">';
                echo'<div id="tab1" class="tab-pane active">';
                echo'<div class="products-slick" data-nav="#slick-nav-1">';
                echo'<div class="product">';
                echo'<div class="product-img" >';
                echo"<img src='./productimg/$image' alt='' style='width:390px;height:170px;'>";
                echo'</div>';
                echo'<div class="product-body">';
                echo"<h3 class='product-name'><a href='specificproduct.php?id=$id'>$name</a></h3>";
                echo "<input type='hidden' name='price' value='".$result['product_price']."'>";
                echo "<input type='hidden' name='productid' value='".$result['product_id']."'>";
                echo "<input type='hidden' name='productimage' value='".$result['product_image']."'>";
                echo "<input type='hidden' name='productname' value='".$result['product_name']."'>";
                echo"<h4 class='product-price'>$$price</h4>";
                echo'</div>';
                echo'<div class="add-to-cart">';
                echo"<button class='add-to-cart-btn' name='addtocartbutton'><i class='fa fa-shopping-cart'></i> add to cart</button>";
                echo'</div>';
                echo'</div>';
                echo'</div>';
                echo'</div>';
                echo'</div>';
                echo'</div>';
                echo'</div>';
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
        
        <center><img src="./Img/howtobuy.png" alt="" width="1100px" style="border-radius: 5px;"></center>
        <br>
        <center><h3><p>Any Question? Just Email Us At electron@gmail.com !</p></h3></center>
        <br><br>

</div>
</div>
</div>


<?php require_once("loggedinfooter.html") ?>

</body>
</html>