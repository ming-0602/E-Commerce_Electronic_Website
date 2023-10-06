<?php
    session_start();
    include ('config.php');
    $conn = connection();
    error_reporting(0);
?>

<?php 
    if(isset($_SESSION['email'])){
        // print($_SESSION['email']);
        require_once("topnavigationbar.html");
    }else{
        require_once('notloggedinnav.html');
    }

    //Get session email
    $email = $_SESSION['email'];

    //Get data from database
    $queryorder = "SELECT * FROM `order1` WHERE `user_email` LIKE '$email'";
    $order = $conn->query($queryorder) or die($conn->error);
    $orderrow = $order->fetch_assoc(); 

    //Get count of the order
    $check_order = "SELECT * FROM `order1` WHERE `user_email`='$email'";
    $check_order2 = mysqli_query($conn, $check_order);
    $count_order =  mysqli_num_rows($check_order2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Electron - My Order History</title>
    <style>
        * {
            font-family: 'Poppings', sans-serif;
        }

        .title {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            font-size: 18px;
        }

        .pcontainer {
            border-radius: 20px;
            position: relative;
            margin-top: 20px;            
            left: 380px;
            width: 1200px;
            height: auto;
            box-shadow: 0 .5rem 1rem rgba(0,0,0,0.2);
        }

        .profilenavbar {
            width: 96.5%;
            margin: 0 20px 0 20px;
            padding-top: 30px;
            padding-bottom: 10px;
            font-size: 20px;
            color: #333;
            border-bottom: 1px solid #333;
        }

        .myprofilelink {
            padding-left: 40px;
            font-weight: bold;
            position: absolute;
        }

        .orderhistorylink {
            padding-left: 180px;
            font-weight: bold;
            color: #D10024;
            text-shadow: 0 .5rem 1rem rgba(238, 75, 43, 0.2);
        }

        .collapsible {
            margin-top: 20px;
            margin-left: 20px;
            background-color: #87CEFA;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 96.5%;
            border: none;
            border-radius: 10px;
            text-align: left;
            outline: none;
            font-size: 16px;           
        }

        .active, .collapsible:hover {
            background-color: #91D8F5;
        }

        .collapsible:after {
            content: '\002B';
            color: white;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .collap.active:after {
            content: "\2212";
        }

        .content {
            max-height: 0;
            margin-left: 25px;
            width: 95.5%;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            background-color: #FFF;
            box-shadow: 0 .5rem 1rem rgba(0,0,0,0.1);
        }

        .orderdetails {
            width: 96.5%;
            margin-left: 20px;
            margin-top: 20px;
            display: flex;
            font-size: 16px;
            font-weight: bold;
            color: black;
            text-align: center;
        }

        .orderdetailstitle1 {
            font-size: 16px;
            font-weight: bold;
            width: 230px;
        }

        .orderdetailstitle2 {
            font-size: 16px;
            font-weight: bold;
            width: 300px;
        }

        .orderdetailstitle3 {
            font-size: 16px;
            font-weight: bold;
            width: 439px;
        }

        .orderdetailstitle4 {
            font-size: 16px;
            font-weight: bold;
            width: 100px;
            padding-left: 40px;
        }

        .orderdetailsbox {
            width: 96.5%;
            margin-left: 20px;
            margin-bottom: 10px;
            border-bottom: 1px solid #333;
            display: flex;
            font-size: 16px;
            font-weight: bold;
            color: rgb(70, 70, 70);
        }

        .orderdetailid {
            width: 200px;
            text-align: center;
            margin-top: 90px;
        }

        .productimage {
            width: 350px;
            text-align: center;
            padding: 10px;
        }
        #productimg {
            height: 210px;
            width: 280px;
            margin-left: 10px;  
            border: 1px solid #666;
        }

        .productname {
            width: 405px;
            text-align: center;
            justify-content: center;
            margin-top: 80px;
            position: relative;
        }

        .price {
            padding-left: 66px;
            width: 100px;
            text-align: center;
            margin-top: 90px;
        }
    </style>
</head>
<body>
    <div class="title"><h1>MY ACCOUNT</h1></div>
    <div class="pcontainer">
        <div class="profilenavbar">
            <a href="myprofile.php" class="myprofilelink">My Profile</a>
            <div class="orderhistorylink">My Order History</div>
        </div>
        <?php if($count_order != 0) { ?>
            <div class="orderhistory">
                <?php do { ?>
                    <div class="collap">
                        <button type="button" class="collapsible">Order ID : <?= $orderrow['order_id'] ?> &emsp; Total Price : $ <?= $orderrow['total_price'] ?> &emsp; Order Date : <?= $orderrow['order_date'] ?> &emsp; Shipping Date : <?= $orderrow['shipping_date'] ?> &emsp; Delivery Status : <?= $orderrow['delivery_status'] ?></button>
                        <div class="content">
                            <div class="orderdetails">
                                <p class="orderdetailstitle1">Order Detail ID</pack>
                                <p class="orderdetailstitle2">Product Image</p>
                                <p class="orderdetailstitle3">Product Name</p>
                                <p class="orderdetailstitle4">Price</p>
                            </div>
                            <hr>
                            <?php do {
                                //Get order id from each row
                                $order_id = $orderrow['order_id'];

                                $queryorderdetail = "SELECT * FROM `order_detail` WHERE `order_id` LIKE '$order_id'";
                                
                                $orderdetail = $conn->query($queryorderdetail) or die($conn->error);
                                $orderdetailrow = $orderdetail->fetch_assoc();
                                do {
                                    //Get product id from each row
                                    $prod_id = $orderdetailrow['product_id'];

                                    //Get product data from database
                                    $productdetail = "SELECT * FROM `product` WHERE `product_id` = '$prod_id'";

                                    $product = $conn->query($productdetail) or die($conn->error);
                                    $productrow = $product->fetch_assoc(); 
                                    ?>
                                    <div class="orderdetailsbox">
                                        <div class="orderdetailid"><?= $orderdetailrow['orderdetail_id'] ?></div>
                                        <div class="productimage"><img src=./productimg/<?= $productrow['product_image'] ?> alt="" id="productimg"></div>
                                        <div class="productname"><?= $productrow['product_name'] ?></div>
                                        <div class="price">$<?= $orderdetailrow['price'] ?></div>
                                    </div>
                                <?php } while($orderdetailrow = $orderdetail->fetch_assoc()); 
                            } while ($orderdetailrow = $orderdetail->fetch_assoc()); ?>
                        </div>
                    </div>
                <?php } while ($orderrow = $order->fetch_assoc()); ?>
                <script src="./js/order.js"></script>
            </div>
        <?php } ?>
        <br><br><br>
    </div>
    <br><br><br><br><br><br><br><br><br><br>
    <?php require_once("loggedinfooter.html") ?>
</body>
</html>