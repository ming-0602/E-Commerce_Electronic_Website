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
    <link rel="stylesheet" href="./css/modifyproduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Electron - Modify Product</title>
</head>

<body>
    <div class="title"><h1>Modify/View Product</h1></div> 
        <div class="searchbar">
            <form action="" method="POST">
                <input type="search" class="searchname" placeholder="Search Product Name" name="searchname">
                <button type="submit" name="submit"><i class="fa fa-search"></i></button>          
            </form>
        </div>
        <select class="producttype" name="producttype" onchange="window.location=this.value">
            <option value="modifyproduct.php">All</option>    
            <option value="" disabled selected hidden>Phone</option>
            <option value="modifytablet.php">Tablet</option>
            <option value="modifylaptop.php">Laptop</option>
            <option value="modifycable.php">Cable</option>
            <option value="modifyaudio.php">Audio</option>
        </select>
    <a href="admin.php" class="backbut">Back to Admin Dashboard</a>
    <table width=90% align=center>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Category</th>
            <th>Action</th>
        </tr>

    <?php
        //If search button is press
        if(isset($_POST['submit'])) {
            //Data from the search bar
            $searchname = $_POST['searchname']; 

            //Display every product by the search keyword
            $query = "SELECT * FROM `product` WHERE `product_name` LIKE '%$searchname%' AND `product_category` = 'Phone'";

            $product = $conn->query($query) or die($conn->error);

            while($row=mysqli_fetch_array($product)){
                echo "<tr>";
                echo "<td>". $row['product_id']. "</td>";
                echo "<td>". $row['product_name']. "</td>";
                echo "<td>". $row['product_price']. "</td>";
                echo "<td>". $row['product_category']. "</td>";
                //Get ID of the selected product
                $id=$row['product_id'];
                echo "<td><a href='updateproduct.php?id=$id' class='modify'>Modify/View Product</a></td>";
                echo "</tr>"; 
            }
        } else {
            //Display every product
            $query = "SELECT * FROM `product` WHERE `product_category` = 'Phone'";
            $product = $conn->query($query) or die($conn->error);

            while($row=mysqli_fetch_array($product)){
                echo "<tr>";
                echo "<td>". $row['product_id']. "</td>";
                echo "<td>". $row['product_name']. "</td>";
                echo "<td>". $row['product_price']. "</td>";
                echo "<td>". $row['product_category']. "</td>";               
                //Get ID of the selected product
                $id=$row['product_id'];
                echo "<td><a href='updateproduct.php?id=$id' class='modify'>Modify/View Product</a></td>";
                echo "</tr>"; 
            }
        }
    ?>        
    </table>
</body>
</html>