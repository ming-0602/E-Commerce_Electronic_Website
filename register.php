<?php

    session_start();
    include 'config.php';
    error_reporting(0);

?>

<?php 
    if(isset($email)){
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script src="https://use.fontawesome.com/9b3b4e8e2a.js"></script>
    <title>Eletron Registration</title>
</head>

<script>
    function pop_up_error_age(){
        Swal.fire({
            icon:'error',
            title: 'Oops',
            text: 'You are too young to be using this website !',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    }

    function pop_up_error_pw(){
        Swal.fire({
            icon:'error',
            title: 'Oops',
            text: 'Password Not Matched !',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    }

    function pop_up_error_invalid(){
        Swal.fire({
            icon:'error',
            title: 'Oops',
            text: 'Invalid Username or Password !',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    }

    function pop_up_error_username_exist(){
        Swal.fire({
            icon:'error',
            title: 'Oops',
            text: 'Username Already Exitst !',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    }

    function pop_up_error_email_exist(){
        Swal.fire({
            icon:'error',
            title: 'Oops',
            text: 'Email Already Exitst !',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    }

    function pop_up_success(){
        Swal.fire({
            icon:'success',
            title: 'Success', 
            text: 'User Registration Completed ! Please Click On Continue',
            showDenyButton: false,
            showCancelButton: false,
            confirmButtonText: '<a href="login.php" style="text-decoration:none; color:white; ">Continue</a>',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    }
</script>

<style>
    /* ---- LOGIN REGISTER DESIGN ---- */
    /* * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
        outline: none;
        border: none;
        text-decoration: none;  
    } */

    .form_container .login .input-field {
        margin-left: 0px;
    }

    .form_container .login .input-field .btn {
        margin-left: 20px;
    }

    .form_container .login .input-field input {
        border: 2px solid #ffffff;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 30px;
        background: transparent;
        outline: none;
        transition: .5s;
    }

    
    body {
        /* width: 100%;
        min-height: 100vh;
        z-index: -1;
        background-position: center;
        background-size: cover;
        justify-content: center;
        align-items: center;
        margin: 8%; */
        background-image: url('img/bgi.jpg');
    }
    
    .form_container {
        width: 400px;
        min-height: 400px;
        background: hwb(0 62% 38%);
        border-radius: 30px;
        box-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
        padding: 40px 30px;
        position: relative;
        margin-left: 10%; 
        margin-top: 5%;
    }
    
    .form_container .login_word {
        font-family: Arial, Helvetica, sans-serif;
        color: rgb(255, 255, 255);
        font-weight: 500;
        font-size: 2rem;
        text-align: center;
        margin-bottom: 30px;
        margin-left: 15px;
        display: block;
        text-transform: capitalize;
    }
    
    .form_container .login .input-field {
        width: 90%;
        height: 30px;
        margin-bottom: 30px;
        margin-left: 10px;
    }
    
    .form_container .login .input-field input {
        width: 100%;
        height: 100%;
        border: 2px solid #e7e7e7;
        padding: 20px 30px;
        font-size: 1rem;
        border-radius: 30px;
        background: transparent;
        outline: none;
        transition: .5s;  
    }
    .form_container .login .input-field input::placeholder {
     font-size: 13px;
     color: rgb(184, 181, 181);
    }
    
    .form_container .login .input-field input:focus, .form_container .login .input-field input:valid {
        border-color: #54b6d4;
    }
    
    .form_container .login .input-field .btn {
        display: block;
        width: 110%;
        padding: 15px 20px;
        text-align: center;
        border: none;
        background: #4398dd;
        outline: none;
        border-radius: 30px;
        font-size: 1.2rem;
        color: rgb(255, 255, 255);
        cursor: pointer;
        transition: .5s;
        margin-left: 3px;
        flex: 1 1 0px;
    }
    
    .form_container .login .input-field .btn:hover {
        transform: translateY(-5px);
        background: #4ba7e4;
    }
    
    .login-register_exchange {
        color: rgb(255, 255, 255);
        font-weight: 70;
        margin-left:10%;
	    transform: translate(13%, 20%);

    }
    
    .login-register_exchange .account_a:hover {
        text-decoration: double;
        font-weight:bold;
        color: #428ae9;
    }
    .home{
        margin-left:20%;
        padding: 10px 10px; 
        transform: translate(13%, 20%);
    }
    
    .home a{
        color:rgb(255, 255, 255);
        text-decoration:double;
    }
    
    .home a:hover{
        color: #428ae9;
        font-weight:bold;
        cursor:pointer;
    }
    
    ::-webkit-calendar-picker-indicator {
    filter: invert(1);
    }

    @media (max-width: 430px) {
        .form_container{
            width: 300px;
        }
    }
    
    </style>
<body>
    <div class="form_container" style="width: 450px;">
        <form action="" method="POST" class="login">
            <p class="login_word">Register</p>

            <div class="input-field" style="display: flex;width: 100%;">
                <input type="text" placeholder="Username" name="customer_username" required style="width: 90%; margin-right:5px; color: #e7e7e7;" minlength="4"; maxlength="16">
                <input type="text" name="dob" required placeholder="Date of Birth" style="width: 100%; color: #e7e7e7;" onfocus="(this.type='date')" onblur="(this.type='text')">
            </div>
            
            <div class="input-field" style="width:100%;">
                <input type="email" placeholder="Email Address" name="customer_email" required style="color: #e7e7e7;">
            </div>

            <div class="input-field" style="display: flex;width: 100%;">
                <input type="password" placeholder="Password" name="customer_password" required style="width: 49%; margin-right:10px; color: #e7e7e7;" minlength="6"; maxlength="16">
                <input type="password" placeholder="Confirm Password" name="cpassword" required style="width: 52%; color: #e7e7e7;" minlength="6"; maxlength="16">
            </div>

            <div class="input-field" style="width:100%;">
                <input type="tel" placeholder="Contact Number (012-3456789)" name="customer_connum" required style="color: #e7e7e7;" minlength="11"; maxlength="12" pattern="[0-9]{3}-[0-9]{7}{8}">
            </div>

            <br>

            <div class="input-field">
                <button name="submit" class="btn">Register</button>
            </div>

            <p class="login-register_exchange" style="color: #e7e7e7;">Have an account? <a class="account_a" href="login.php" style="color: #e7e7e7;">Login Here</a></p>
            <p class="home"><a href="homepage.php">Back to Home Page</a></p>

        </form>
    </div>

<?php
  session_start();

  if(isset($_POST['submit'])) {
    //Datebase Connection
    include_once("config.php");
    $conn = connection();

    //Data from the signup form
    $username = $_POST['customer_username'];
    $dob = $_POST['customer_dob'];
    $email = $_POST['customer_email'];
    $connum = $_POST['customer_connum'];
    $password = $_POST['customer_password'];
    $cnpassword = $_POST['cpassword'];
    
    //Get username and email count to check duplicate Email
    $check_username = "SELECT * FROM `customer` WHERE customer_username='$username'";
    $check_username2 = mysqli_query($conn, $check_username);
    $count_username =  mysqli_num_rows($check_username2);

    $check_email = "SELECT * FROM `customer` WHERE customer_email='$email'";
    $check_email2 = mysqli_query($conn, $check_email);
    $count_email =  mysqli_num_rows($check_email2);
    
    //Checking validation of every details
    $error = "0";
    
    $dob = $_POST['dob']; 
    $date_today = date("Y-m-d"); 

    /* Turn the years from string format to date format */
    $user_dob=new DateTime($dob);
    $current_date=new DateTime($date_today);

    $difference = $user_dob->diff($current_date); 

    $age= $difference->y; /* Extract the year out */
    
    if ($count_email > 0 || $email == "admin@gmail.com") {
        $error = "5";
    }

    if ($count_username > 0) {
        $error = "4";
    }

    if(!preg_match("/^[a-zA-Z0-9']*$/",$password) || !preg_match("/^[a-zA-Z0-9_']*$/",$username)) {
        $error = "3";
    }

    if ($password !== $cnpassword) {
        $error = "2";
      }

    if ($age < 18){ /* If user is under 18 */
        $error = "1";
    }

    echo "<span class='error'>$error</span>";
    switch($error) {
        case "1":
            echo "<script>pop_up_error_age()</script>";
            break;
        case "2":
            echo "<script>pop_up_error_pw()</script>";
            break;
        case "3":
            echo "<script>pop_up_error_invalid()</script>";
            break;
        case "4":
            echo "<script>pop_up_error_username_exist()</script>";
            break;
        case "5";
            echo "<script>pop_up_error_email_exist()</script>";
            break;
        //If no error
        case "0";
            //Insert data into database
            $query = "INSERT INTO `customer`(`customer_id`,`customer_username`, `customer_dob`, `customer_email`, `customer_password`, `customer_connum`) VALUES ('','$username', '$dob', '$email', '$password', '$connum')";
      
            //Execute your query
            $conn -> query($query) or die($conn -> error); 
            echo "<script>pop_up_success()</script>";
            // header('Location:homepage.php');
            // exit();
    }
  } ?>
</body>
</html>