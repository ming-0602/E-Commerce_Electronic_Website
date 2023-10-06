<?php
    session_start();
    include ('config.php');
    $conn = connection();
    error_reporting(0);

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

    if(isset($_POST['submit'])) {
        //Data from the edit profile form
        $username = $_POST['username'];
        $dob = $_POST['dob'];
        $connum = $_POST['connum'];
        $password = $_POST['password'];

        $check_email = "SELECT * FROM `customer` WHERE customer_email='$email'";
        $check_email2 = mysqli_query($conn, $check_email);
        $count_email =  mysqli_num_rows($check_email2);
        
        //Checking validation of every details
        $error = 0;
        
        $dob = $_POST['dob']; 
        $date_today = date("Y-m-d"); 

        /* Turn the years from string format to date format */
        $user_dob=new DateTime($dob);
        $current_date=new DateTime($date_today);

        $difference = $user_dob->diff($current_date); 

        $age= $difference->y; /* Extract the year out */

        if ($count_username > 0 && $username != $row['customer_username']) {
            $username_error = '<br>&#9888; Username has Already Exist';
            $error += 1;
        }

        if(!preg_match("/^[a-zA-Z0-9']*$/",$password) || !preg_match("/^[a-zA-Z0-9_']*$/",$username)) {
            $invalid_error = '<br>&#9888; Invalid Username or Password';
            $error += 1;
        }

        if ($age < 18){ /* If user is under 18 */
            $age_error = '<br>&#9888; Age Cannot be Below 18';
            $error += 1;
        }

        //If no error then modify customer detail
        if ($error == 0) {
            $query1 = "UPDATE `customer` SET `customer_username`='$username', `customer_dob`='$dob', `customer_password`='$password', `customer_connum`='$connum'";
		    $result1=$conn->query($query1) or die($conn->error); ?>

            <script type="text/javascript">
                alert("Profile has been modify !");
                window.location = 'myprofile.php';
		    </script>
        <?php }
    }
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
            height: auto;
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

        .cancelbut {
            float: right;
            margin-top: 1px;
            margin-right: 8px;
        }

        .confirmbut {
            float: right;
            border: none;
            background-color: #fff;
            transition: 0.3s;
        }

        .confirmbut:hover {
            float: right;
            border: none;
            background-color: #fff;
            color: #34A56F;
        }

        .profiledetails {
            margin-top: 50px;
            margin-left: 60px;
            font-size: 18px;
            color: #333;
            display: flex;
            position: relative;
        }

        .colon {
            padding-left: 42px;
        }
        .profiledetail {
            padding-left: 27px;
        }

        .inputbar {
            margin-bottom: 39px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 .5rem 1rem rgba(0,0,0,0.1);
            padding: 5px 15px 5px 15px;
            width: 300px;
        }

        .inputbar:nth-child(9) {
            margin-bottom: 0;
        }

        .error {
            margin-left: 60px;
            margin-bottom: 5px;
            font-size: 18px;
            color: red;
        }

        .errormsg {
            margin-bottom: 0;
        }

        .inviscontent{
            height: 700px;
        }
    </style>
</head>
<body>
    <div class="title"><h1>MY ACCOUNT</h1></div>
        <div class="pcontainer">
            <form method="post">
                <div class="profilenavbar">
                    <div class="myprofilelink">My Profile</div>
                    <a href="myorderhistory.php" class="orderhistorylink">My Order History</a>
                    <button name="submit" class="confirmbut">Confirm <i class="fa fa-check" aria-hidden="true"></i></button>
                    <a href="myprofile.php" class="cancelbut">Cancel <i class="fa fa-close"></i></a>
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
                    <div class="colon">
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
                        <input type="text" placeholder="Username" class="inputbar" name="username" value="<?php echo $row['customer_username']?>"minlength="4"; maxlength="16" required>
                        <br>
                        <input type="email" placeholder="Email" class="inputbar" name="email" value="<?php echo $row['customer_email']?>" readonly>
                        <br>
                        <input type="date" placeholder="Date of Birth" class="inputbar" name="dob" value="<?php echo $row['customer_dob']?>" required>
                        <br>
                        <input type="text" placeholder="Password" class="inputbar" name="password" value="<?php echo $row['customer_password']?>" minlength="6"; maxlength="16" required>
                        <br>
                        <input type="text" placeholder="Contact Number" class="inputbar" name="connum" value="<?php echo $row['customer_connum']?>" minlength="11"; maxlength="12" pattern="[0-9]{3}-[0-9]{7}{8}" required>
                    </div>
                </div>
            </form>
            <div class="error">
                <?php
                    if(isset($username_error)) {
                        echo $username_error;
                    }
                    if(isset($password_error)) {
                        echo $password_error;
                    }
                    if(isset($age_error)) {
                        echo $age_error;
                    }
                ?>
                <br><br>
            </div>
        </div>
    </div>
    <div class="inviscontent"></div>
    <?php require_once("loggedinfooter.html") ?>
</body>

</html>