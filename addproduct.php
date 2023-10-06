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
                <option value="" disabled selected hidden>Product Type</option>
                <option value="addphone.php">Phone</option>
                <option value="addtablet.php">Tablet</option>
                <option value="addlaptop.php">Laptop</option>
                <option value="addcable.php">Cable</option>
                <option value="addaudio.php">Audio</option>
            </select>
            <div class="line"></div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
    </body>
</html>