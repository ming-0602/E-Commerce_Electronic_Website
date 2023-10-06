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

    $query = "SELECT * FROM customer WHERE customer_email ='$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Electron - My Profile</title>
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
            position: absolute;
            margin-top: 20px;            
            left: 460px;
            width: 1000px;
            height: 520px;
            box-shadow: 0 .5rem 1rem rgba(0,0,0,0.2);
        }

        .profilenavbar {
            width: 95.5%;
            margin: 30px 20px 0 20px;
            padding-bottom: 10px;
            font-size: 20px;
            color: #333;
            border-bottom: 1px solid #333;
        }

        .myprofilelink {
            padding-left: 40px;
            font-weight: bold;
            text-shadow: 0 .5rem 1rem rgba(238, 75, 43, 0.2);
            color: #D10024;
            position:absolute;
        }

        .orderhistorylink {
            padding-left: 180px;
            font-weight: bold;
        }

        .editbut {
            padding-right: 30px;
            float: right;
        }

        .profiledetails {
            margin-top: 50px;
            margin-left: 60px;
            font-size: 18px;
            color: #333;
            display: flex;
            position: relative;
        }

        .profiledetail {
            padding-left: 42px;
        }

        .inviscontent{
            height: 650px;
        }
    </style>
</head>
<body>
    <div class="title"><h1>MY ACCOUNT</h1></div>
    <div class="pcontainer">
        <div class="profilenavbar">
            <div class="myprofilelink">My Profile</div>
            <a href="myorderhistory.php" class="orderhistorylink">My Order History</a>
            <a href="editprofile.php" class="editbut">Edit <i class="fa fa-edit"></i></a>
        </div>
        <div class="profiledetails">
            <div class="profilelable">
                Username
                <br><br><br>
                Email
                <br><br><br>
                Date of Birth
                <br><br><br>
                Password
                <br><br><br>
                Contact Number
            </div>
            <div class="profiledetail">
                :
                <br><br><br>
                :
                <br><br><br>
                :
                <br><br><br>
                :
                <br><br><br>
                :
            </div>
            <div class="profiledetail">
                <?php echo $row['customer_username']?>
                <br><br><br>
                <?php echo $row['customer_email']?>
                <br><br><br>
                <?php echo $row['customer_dob']?>
                <br><br><br>
                *************
                <br><br><br>
                <?php echo $row['customer_connum']?>
            </div>
        </div>
    </div>
    <div class="inviscontent"></div>
    <?php require_once("loggedinfooter.html") ?>
</body>
</html>