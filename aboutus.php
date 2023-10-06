
<?php

session_start();
include 'config.php';
error_reporting(0);
$conn = connection();

?>

<?php 
 

if(isset($_SESSION['email'])){
    // print($_SESSION['email']);
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
    <title>Electron | E-Device Store</title>
    <link rel="stylesheet" href="./css/about.css">
    <style>
        .cart {
            margin: 20px 20px 0px 1250px;
        }
    </style>
</head>
<body>
    
    
        <div class="row">
            <div class="Pic1">
                <img src="./Img/about.jpg" width="600px" height="500px">
            </div>
            <div class="script1" width="500px" height="auto">
                <p id="tile1"><i><b>Our Mission</b> </i></p><br>
                <p id ="des1">We started on this journey to provide excellent<br> products for you everyday, assisting you in <br>bringing "A Better Life, A Better Price" for you.</p>
            </div>
        </div>
<br>
    <div class="row">
        <div class="script2" width="500px" height="auto">
            <p ><i><b>Formed to Last</b></i></p><br>
            <p>Our concentrate on timeless items is deliberate,<br> since we believe in things that will last for years and years.<br> It's not only excellent for your financial institution,<br> but it's also good for the environment.</p>
        </div>
        <div class="pic2" width="500px" height="auto">
            <img src="img/about2.jpg" width="600px" height="500px">
        </div>

    </div>
    <div class="row">
        <div class="pic3">
            <img src="img/about3.jpg" width="600px" height="500px">
        </div>
        <div class="script3" width="500px" height="auto">
            <p ><i><b>Sustainable Materials</b></i></p><br>
            <p>We are concerned about the materials used in our goods, <br>as well as the manufacturers with whom we collaborate. <br>We are continuously trying to decrease our environmental effect.</p>
        </div>
    </div>
    <div class="row">
        <div class="script4" width="500px" height="auto">
            <p ><i><b>Reusable Packaging</b></i></p><br>
            <p>We make every effort to select packaging made<br> of materials that are kind to Mother Nature.<br>
                Our packaging is intended to be reused by <br> our clients several times.</p>
        </div>
        <div class="pic4" width="500px" height="auto">
            <img src="img/about1.jpg" width="600px" height="500px">
        </div>
    </div>
    <br><br><br><br><br>
    <div id="text1">
        <i align='center'>Experience Affordable Luxury<br>
            With Our Best Selling Essentials</i>
    </div>
    <br><br><br>
        <div>
            <img src="img/Untitled design.png" width="100%">
        </div>
    <br>

    <?php
        require_once ('loggedinfooter.html');
    ?>
    
</body>
</html>