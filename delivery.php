<?php
    session_start();

    //Datebase connection
    include_once("config.php");
    $conn = connection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Electron - Update Delivery Status</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Kumbh Sans", sans-serif;
            scroll-behavior: smooth;
        }

        body {
            justify-content: center;
            display: flex;
            background-color: whitesmoke;
        }

        .title {
            margin-top: 55px;
            font-size: 20px;
            font-weight: bolder;
            text-align: center;
            color: #111; 
            background-color: whitesmoke;
            position: absolute;
            background: #659999;
            background: linear-gradient(to right, #1282fa, #00fff2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            -moz-text-fill-color:transparent;
        }

        .searchbar {
            width: 400px;
            height: 37px;
            position: absolute;
            left: 100px;
            margin-top: 145px;
            border: #222 1px solid;
            overflow: hidden;
            border-radius: 4px;
            background-color: #fff;
        }

        .searchbar .searchword {
            width: 90%;
            height: 35px;
            border: none;
            outline: none;
            font-size: 14px;
            color: #222;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
            padding-left: 10px;
        }

        .searchbar button {
            width: 10%;
            height: 35px;
            border: none;
            float: right;
            background-color: #fff;
            cursor: pointer;
        }

        .backbut {
            margin-top: 57px;
            right: 121px;
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
            margin-top: 62px;
            right: 121px;
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

        table{
            border-collapse: collapse;
            box-shadow: 0 5px 10px #e1e5ee;
            background-color: white;
            text-align: left;
            margin-top: 200px;
            margin-bottom: 50px;
            border-bottom: 1px solid #999;
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
            background-color: #e1e8e8;
        }

        .update{
            text-decoration: none;
            color: #000000;
            font-weight:bold;
            transition: 0.3s;
        }

        .update:hover{
            color: #87CEFA;
        }       
    </style>
</head>

<body>
    <div class="title"><h1>Update Delivery Status</h1></div> 
        <div class="searchbar">
            <form action="" method="POST">
                <input type="search" class="searchword" placeholder="Search Order ID / Customer Email" name="searchword">
                <button type="submit" name="submit"><i class="fa fa-search"></i></button>          
            </form>
        </div>
    <a href="admin.php" class="backbut">Back to Admin Dashboard</a>
    <table width=90% align=center>
        <tr>
            <th>Order ID</th>
            <th>Customer Email</th>
            <th>Total Price</th>
            <th>Address</th>
            <th>Order Date</th>
            <th>Shipping Date</th>
            <th>Delivery Status</th>
            <th>Action</th>
        </tr>

    <?php
        //If search button is press
        if(isset($_POST['submit'])) {
            //Data from the search bar
            $searchword = $_POST['searchword']; 

            //Display every product by the search keyword
            $query = "SELECT * FROM `order1` WHERE `order_id` LIKE '%$searchword%' OR `user_email` LIKE '%$searchword%'";

            $product = $conn->query($query) or die($conn->error);

            while($row=mysqli_fetch_array($product)){
                echo "<tr>";
                echo "<td>". $row['order_id']. "</td>";
                echo "<td>". $row['user_email']. "</td>";
                echo "<td>". $row['total_price']. "</td>";
                echo "<td>". $row['address']. "</td>";
                echo "<td>". $row['order_date']. "</td>";
                echo "<td>". $row['shipping_date']. "</td>";
                echo "<td>". $row['delivery_status']. "</td>";
                //Get selected order id
                $id=$row['order_id'];
                echo "<td><a href='updatestatus.php?id=$id' class='update'>Update Delivery Status</a></td></td>"; 
                echo "</tr>"; 
            }
        } else {
            //Display every product
            $query = "SELECT * FROM `order1`";
            $product = $conn->query($query) or die($conn->error);

            while($row=mysqli_fetch_array($product)){
                echo "<tr>";
                echo "<td>". $row['order_id']. "</td>";
                echo "<td>". $row['user_email']. "</td>";
                echo "<td>". $row['total_price']. "</td>";
                echo "<td>". $row['address']. "</td>";
                echo "<td>". $row['order_date']. "</td>";
                echo "<td>". $row['shipping_date']. "</td>";
                echo "<td>". $row['delivery_status']. "</td>";
                //Get selected order id
                $id=$row['order_id'];
                echo "<td><a href='updatestatus.php?id=$id' class='update'>Update Delivery Status</a></td></td>"; 
                echo "</tr>"; 
            }
        }
    ?>        
    </table>
</body>
</html>