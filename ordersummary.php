<?php

    session_start();
    include 'config.php';
    error_reporting(0);
	$conn = connection();

?>

<?php 
     $getorderid = $_GET['orderid'];

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
    <style>@import url('https://fonts.googleapis.com/css2?family=Mukta&display=swap');</style>
    <style>@import url('https://fonts.googleapis.com/css2?family=Crimson+Text&family=Mukta&family=Roboto+Slab:wght@300&display=swap');</style>
    <style>@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap');</style>
    <style>@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&family=Roboto:wght@300;400&family=Source+Sans+Pro:wght@200;300&display=swap');</style>
    <title>Swashion | Clothing Store</title>

    <style>
        h1{
            letter-spacing: 3px;
            font-family: 'Crimson Text', serif;
            text-transform: uppercase;
            margin-left: 35px;
            text-align: center;
        }

        h2{
            text-align: center;
            font-family: 'Roboto', sans-serif;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .appreciation{
            text-align: center;
        }

        .details{
            margin-left: 30px;
        }

        span{
            text-decoration: underline;
            color: brown;
        }

        table{
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0 5px 10px #e1e5ee;
            background-color: white;
            text-align: left;
            margin-top: 20px;
            margin-bottom: 50px;
        }
        td, th{
            text-align: left;
            padding: 15px;
            color: rgb(0, 0, 0);
        }

        th{
            padding: 16px 32px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 15px;
            font-weight: 900;
            border: ridge;
        }

        td{
            padding: 16px 32px;
 
        }
        tr{
            border-left: ridge;
            border-right: ridge;

        }

        thead{
            box-shadow: 0 5px 10px #e1e5ee;
        }

        tr:nth-child(even){
            background-color:  #f2f2f2;

        }

        p{
            font-family: 'Mukta', sans-serif;
        }

        .btn{
        font-weight: 400;
        background-color: #e8e5e1;
        font-size: 12pt;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        position: relative;
        transition: all 0.3s;
        outline: none;
        padding:20px 20px;   
        }
        .button{
        text-align: center;
        text-decoration: none;
        color:black;
        font-size: 20px;
        }
        .btn:hover{
        background-color:  #ffb84d;
        }

    </style>
</head>
<body>
    <?php 
        $email = $_SESSION['email'];
        $query = "SELECT * FROM `order1` WHERE `order_id` = '$getorderid'";
        $result = mysqli_query($conn,$query);

    ?>
    <br>
    <h1>Order Summary</h1><br>
    <p class="appreciation">We are preparing your order.</p>
    <hr><br>

    <div class="details">
        <!-- <h2>Thank you for your order</h2> -->
        
        <div>
            <table width="70%" align="center">
                <tr>
                    <th>Shipping Address</th>
                    <th>Order Date</th>
                </tr>


                <?php
                    foreach($result as $result){
                        echo"<tr>";
                        echo"<td>".$result['address']."</td>";
                        echo"<td>".$result['order_date']."</td>";
                        echo"</tr>";
                    }
                ?>



                
            </table>
        </div>
    </div>
    <br>

    <h2>Here's Your Order Summary</h2>
    <table width="80%" align="center">
        <tr>
            <!-- <th>No. of Product</th> -->
            <th>Product ID</th>
            <th>Unit Price</th>
            <!-- <th>Quantity</th> -->
            <!-- <th>Total</th> -->
        </tr>

        <?php
                $query2 = "SELECT * FROM `order_detail` WHERE `order_id` = '$getorderid'";
                $result2 = mysqli_query($conn,$query2);
                $total = 0;
                foreach($result2 as $result2){
                    echo"<tr>";
                    echo"<th>".$result2['product_id']."</th>";
                    echo"<th>$".$result2['price']."</th>";
                    echo"</tr>";
                    $total = $total + $result2['price'];
                }








        ?>
        <td colspan='1' align='right' style="font-weight: bold; border: ridge 3px; text-align:right">Order Subtotal: </td>
        <td style="font-weight: bold; border: ridge 3px; border-left: hidden"><?php echo "RM ".$total; ?></td>
    
    <tr>
        <!-- <td colspan='1' style="text-align:right;"></td> -->
    <tr>

    </table>
    <hr>

    <?php
        require_once ('footer.php');
    ?>
    
</body>
</html>