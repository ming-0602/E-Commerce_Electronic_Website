<?php
    session_start();
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
    <title>Electron login</title>
</head>

<script>
    function pop_up_fail(){
        Swal.fire({
            icon:'error',
            title: 'Oops',
            text: 'You Have Entered the Wrong Email or Password.',
            confirmButtonText: 'Retry again'
        })
    }

    function pop_up_success(){
        Swal.fire({
            icon:'success',
            title: 'Success', 
            text: 'Login Successful ! Please Click On Continue to Login',
            showDenyButton: false,
            showCancelButton: false,
            confirmButtonText: '<a href="homepage.php" style="text-decoration:none; color:white; ">Continue</a>',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    }

    function pop_up_admin(){
        Swal.fire({
            icon:'success',
            title: 'Success', 
            text: 'Admin Login Successful ! Please Click On Continue to Proceed',
            showDenyButton: false,
            showCancelButton: false,
            confirmButtonText: '<a href="admin.php" style="text-decoration:none; color:white; ">Continue</a>',
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

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
    outline: none;
    border: none;
    text-decoration: none;

}

body {
    width: 100%;
    min-height: 100vh;
    z-index: -1;
    background-position: center;
    background-size: cover;
    justify-content: center;
    align-items: center;
    background-image: url('img/bgi.jpg');
}

.form_container {
    width: 400px;
    min-height: 400px;
    background: hwb(214 13% 66%);
    border-radius: 10%;
    box-shadow: 0 0 5px rgba(255, 255, 255, 0.775);
    padding: 40px 30px;
    position: relative;
    margin: 10%;
}

.form_container .login_word {
    font-family: Arial, Helvetica, sans-serif;
    color: rgb(255, 255, 255);
    font-weight: 500;
    font-size: 1.1rem;
    text-align: center;
    margin-bottom: 30px;
    margin-left: 15px;
    display: block;
    text-transform: capitalize;
}

.form_container .login .input-field {
    width: 90%;
    height: 30px;
    margin-bottom: 50px;
    margin-left: 20px;
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

.form_container .login .input-field input::placeholder{
    color: rgb(184, 181, 181);
}
.form_container .login .input-field input:focus, .form_container .login .input-field input:valid {
    border-color: #54b6d4;
}

.form_container .login .input-field .btn {
    display: block;
    width: 100%;
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
}

.form_container .login .input-field .btn:hover {
    transform: translateY(-5px);
    background: #4ba7e4;
}

.login-register_exchange {
    color: rgb(255, 255, 255);
    font-weight: 70;
    text-align: center;
}

.login-register_exchange .account_a {
    text-decoration: double;
    font-weight:bold;
    color: #428ae9;
}

.login-register_exchange .account_a a:hover {
    color: #428ae9;
    font-weight:bold;
    cursor:pointer;
}

.home{
    text-align: center;
    padding: 10px;
}

.home a{
    color:rgb(255, 255, 255);
    text-decoration:double;
}

.home a:hover{
    color:#1181e9;
    font-weight: bold;
    cursor: pointer;
}

@media (max-width: 430px) {
    .form_container{
        width: 300px;
    }
}

</style>

<body>
    <div class="form_container">
        <form action="" method="POST" class="login">
            <p class="login_word" style="font-size: 2rem; font-weight: 100; color: #e7e7e7;">Login</p>
            <div class="input-field">
                <input type="email" placeholder="Email Address" name="email" required style="color: #e7e7e7;">
            </div>
            <div class="input-field">
                <input type="password" placeholder="Password" name="password" required style="color: #e7e7e7;">
            </div>
            <div class="input-field">
                <button name="submit" class="btn" style="color: #e7e7e7;">Login</button>
            </div>
            <p class="login-register_exchange" style="color: #e7e7e7;">Don't have an account? <a class="account_a" href="register.php">Create an Account</a></p>
            <p class="home"><a href="homepage.php"  >Back to Home Page</a></p>
        </form>
    </div>


    <?php
    
    if(isset($_POST['submit'])) {
        //Data from the signup form
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Datebase Connection
        include_once("config.php");
        $conn = connection();   
    
        /* Check to see if existing email and password combination exists in database*/
        $sql = "SELECT * FROM customer WHERE customer_email ='$email' AND customer_password ='$password'";

        /* Query between variable 'con' and 'sql'*/
        $result = mysqli_query($conn, $sql);


        if ($result->num_rows > 0) {
            $_SESSION['email']= $email; 
            echo "<script>pop_up_success()</script>"; 
            header("Location:homepage.php");
            exit();
        } else if ($email == "admin@gmail.com" and $password == "123456") {
            echo "<script>pop_up_admin()</script>";
        } else {
            echo "<script>pop_up_fail()</script>";
        }
    }

?>

</body>
</html> 