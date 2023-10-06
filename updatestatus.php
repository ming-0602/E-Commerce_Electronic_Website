<?php
    session_start();

    //Datebase Connection
    include_once("config.php");
    $conn = connection();

    //get delivery details
    $id=$_GET['id'];

    $query= "SELECT * FROM `order1` WHERE `order_id` = '$id'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $shipdate = $row['shipping_date'];
    if($shipdate=="0000-00-00"){
        $date = "";
    }else {
        $date = $shipdate;
    }

    //If confirm button is press
    if(isset($_POST['submit'])) {
        //update delivery details
        $status = $_POST['status'];
        $shipping = $_POST['date'];

        $update= "UPDATE order1 SET shipping_date = '$shipping', `delivery_status` = '$status' WHERE order_id = '$id'";
        $result_update=mysqli_query($conn,$update); ?>

        <script type="text/javascript">
			alert("Delivery Status has been Updated!");
			window.location = 'delivery.php'
		</script>
    <?php }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electron - Update Status</title>
    <style>
        *{
            font-family: "Kumbh Sans", sans-serif;
        }

        body {
            justify-content: center;
            display: flex;
            background-color: whitesmoke;
        }

        .backbut {
            margin-top: 49px;
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
            margin-top: 54px;
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

        .container {
            width: 400px;
            min-height: 400px;
            background: rgb(247, 247, 247);
            border-radius: 20px;
            box-shadow: 0 0 5px rgba(0,0,0,0.3);
            padding: 40px 30px;
            position: relative;
            margin: 8% auto;
        }

        h1{
            text-transform: uppercase;
        }

        .ofd{
            font-size: 20px;
            font-weight: bold;
        }

        .dlv{
            font-size: 20px;
            font-weight: bold;
        }

        .input{
            width: 370px;
            border: 2px solid #e7e7e7;
            padding: 5px;
            padding-left: 20px;
            font-size: 16px;
            border-radius: 30px;
            background: transparent;
            outline: none;
        }

        .submit-btn {
            height: 40px;
            width: 100px;
            border-radius: 6px;
            margin-top: 35px;
            margin-left: 150px;
            font-size: 16px;
            font-weight: bold;
            color: #222;
            background-color: #e1e8e8;
            cursor: pointer;
            transition: 1s;
            letter-spacing: 1px;
            border: none;
        }

        .submit-btn:hover {
            height: 40px;
            width: 100px;
            border-radius: 6px;
            margin-top: 35px;
            margin-left: 150px;
            font-size: 16px;
            font-weight: bold;
            color: #222;
            background-color: #aadad7;
            cursor: pointer;
            letter-spacing: 1px;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <a href="delivery.php" class="backbut">Back to Admin Dashboard</a>
    <div class="container">
        <form method="post" class="form">
            <h1 align='center'>Delivery Status</h1>
            <br>
            <?php if ($row['delivery_status'] == "Preparing") {?>
                <input type="radio" name="status" id="pre" value="Preparing" class="pre" checked>
                <label for="pre" style="font-size:20px; padding-left:10px;">Preparing</label>
                <br><br> 
                <input type="radio" name="status" id="ofd" value="Out for Delivery" class="ofd">
                <label for="ofd" style="font-size:20px; padding-left:10px;">Out for delivery</label> 
                <br><br>
                <input type="radio" name="status" id="dlv" value="delivered" class="dlv">
                <label for="dlv"style="font-size:20px;padding-left:10px;">Delivered</label><br>
            <?php } 
            elseif ($row['delivery_status'] == "Out for Delivery") {?>
                <input type="radio" name="status" id="pre" value="Preparing" class="pre">
                <label for="pre" style="font-size:20px; padding-left:10px;">Preparing</label>
                <br><br> 
                <input type="radio" name="status" id="ofd" value="Out for Delivery" class="ofd" checked>
                <label for="ofd" style="font-size:20px; padding-left:10px;">Out for Delivery</label> 
                <br><br>
                <input type="radio" name="status" id="dlv" value="Delivered" class="dlv">
                <label for="dlv"style="font-size:20px;padding-left:10px;">Delivered</label><br>
            <?php }
            elseif ($row['delivery_status'] == "Delivered") {?>
                <input type="radio" name="status" id="pre" value="Preparing" class="pre">
                <label for="pre" style="font-size:20px; padding-left:10px;">Preparing</label>
                <br><br> 
                <input type="radio" name="status" id="ofd" value="Out for Delivery" class="ofd">
                <label for="ofd" style="font-size:20px; padding-left:10px;">Out for Delivery</label> 
                <br><br>
                <input type="radio" name="status" id="dlv" value="Delivered" class="dlv" checked>
                <label for="dlv"style="font-size:20px;padding-left:10px;">Delivered</label><br>
            <?php } ?>
            <br><br><br>
            <h3>Shipping Date: </h3>
            <input type="date" name="date" class='input' value="<?php echo $date; ?>" require><br>
            <button type="submit" class="submit-btn" name="submit">Confirm</button>
        </form>
    </div>
</body>