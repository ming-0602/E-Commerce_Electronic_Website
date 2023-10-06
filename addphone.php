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
        $display = $_POST['display'];
        $memory = $_POST['memory'];
        $os = $_POST['os'];
        $camera = $_POST['camera'];
        $battery = $_POST['battery'];
        $ram = $_POST['ram'];
        $gpu = $_POST['gpu'];
        $cpu = $_POST['cpu'];

        //Insert data into database
        $query = "INSERT INTO `product` (`product_name`, `product_price`, `product_image`, `product_display`, `product_memory`, `product_os`, `product_camera`, `product_battery`, `product_ram`, `product_gpu`, `product_cpu`, `product_category`) VALUES ('$name', '$price', '$image', '$display', '$memory', '$os', '$camera', '$battery', '$ram', '$gpu', '$cpu', 'Phone')";
        
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
                <option value="addphone.php" disabled selected hidden>Phone</option>
                <option value="addtablet.php">Tablet</option>
                <option value="addlaptop.php">Laptop</option>
                <option value="addcable.php">Cable</option>
                <option value="addaudio.php">Audio</option>
            </select>
            <div class="line"></div>
            <br><br><br>
            <form method="POST">
            <div class="bottomcontainer">
                <div class="leftcontainer">
                    <label>Product Name : </label>
                    <br>
                    <input type="text" class="inputbox"  placeholder="" name="name" required/>
                    <br><br><br>
                    <label>Product Price : </label>
                    <br>
                    <input type="number" class="inputbox"  min="1" placeholder="" name="price" required/>
                    <br><br><br>
                    <label>Product Image : </label>
                    <br>
                    <input type="file" class="imagebox" accept="image/*,.png.jpg" placeholder="" name="image" required/>
                    <br><br><br>
                    <label>Product Display : </label>
                    <br>
                    <input type="text" class="inputbox"  placeholder="" name="display" required/>
                    <br><br><br>
                    <label>Product Memory : </label>
                    <input type="text" class="inputbox"  placeholder="" name="memory" required/>
                    <br><br><br>
                    <label>Product OS : </label>
                    <br>
                    <input type="text" class="inputbox"  placeholder="" name="os" required/>
                </div>
                <div class="rightcontainer">
                    <label>Product Camera : </label>
                    <br>
                    <input type="text" class="inputbox"  placeholder="" name="camera" required/>
                    <br><br><br>
                    <label>Product Battery : </label>
                    <br>
                    <input type="text" class="inputbox"  placeholder="" name="battery" required/>
                    <br><br><br>
                    <label>Product Ram : </label>
                    <br>
                    <input type="text" class="inputbox"  placeholder="" name="ram" required/>
                    <br><br><br>
                    <label>Product GPU : </label>
                    <br>
                    <input type="text" class="inputbox"  placeholder="" name="gpu" required/>
                    <br><br><br>
                    <label>Product CPU : </label>
                    <br>
                    <input type="text" class="inputbox"  placeholder="" name="cpu" required/>
                </div> 
            </div>   
            <br><br><br><br>
            <button type="submit" class="submit-btn" name="submit">Add</button>
            <input type="reset" class="submit-btn">    
            </form>   
        </div>
    </body>
</html>