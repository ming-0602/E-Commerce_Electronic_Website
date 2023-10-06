<?php
    session_start();

    //If add button is press
    if(isset($_POST['submit'])) {

        //Datebase Connection
        include_once("config.php");
        $conn = connection();
        
        //Data from the add product form
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];

        //Insert data into database
        $query = "INSERT INTO `product` (`product_name`, `product_price`, `product_image`, `product_category`) VALUES ('$name', '$price', '$image', 'Cable')";
        
        //Execute your query
        $conn -> query($query) or die($conn -> error); ?>

        <script type="text/javascript">
            alert("Product has been added!");
            window.location = 'admin.php'
        </script>
        <?php
    }   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./css/addproduct.css">
        <title>Electron - Add Product</title>
    </head>
    <body>
        <div class="title"><h1>Add Product</h1></div>
        <a href="admin.php" class="backbut">Back to Admin Dashboard</a>
        <div class="container">
                <label>Product Type :</label>
                <select class="producttype" name="producttype" onchange="window.location=this.value" required>
                    <option value="addphone.php">Phone</option>
                    <option value="addtablet.php">Tablet</option>
                    <option value="addlaptop.php">Laptop</option>
                    <option value="addcable.php" disabled selected hidden>Cable</option>
                    <option value="addaudio.php">Audio</option>
                </select>
            <div class="line"></div>
            <br><br><br>
            <form method="POST">
                <label>Product Name : </label>
                <br>
                <input type="text" class="inputbox"  placeholder="" name="name" required/>
                <br><br><br>
                <label>Product Price : </label>
                <br>
                <input type="number" class="inputbox"  min="1" step="0" placeholder="" name="price" required/>
                <br><br><br>
                <label>Product Image : </label>
                <br>
                <input type="file" class="imagebox" accept="image/*,.png.jpg" placeholder="" name="image" required/>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <button type="submit" class="submit-btn" name="submit">Add</button>
                <input type="reset" class="submit-btn">    
            </form>
        </div>
    </body>
</html>