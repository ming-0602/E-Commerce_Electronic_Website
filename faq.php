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
    <title>Electron - FAQ</title>

    <style>
    * {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
    }

    .faq {
        margin-left: 100px;
        margin-right: 100px;
        font-size: larger;
    }

    </style>
</head>
<body>
    
    <br><br><br>
    <div class="faq">
        <center><h1><b>FAQ</b></h1><br><br></center>
        <p><b>Q: How long does it take to ship my order?</b></p>
        <p>A: Orders are usually shipped within 1-2 business days after placing the order.</p><br>
        <p><b>Q: When will my order arrive?</b></p>
        <p>A: Shipping time is set by our delivery partners, according to the delivery method chosen by you. Additional details can be found in the order confirmation email you’ve received.</p><br>
        <p><b>Q: How do I track my order?</b></p>
        <p>A: Once shipped, you’ll get a confirmation email that includes a tracking number and additional information regarding tracking your order.</p><br>
        <p><b>Q: What’s your return policy?</b></p>
        <p>A: We allow the return of all items within 14 days of your original order’s date. If you’re interested in returning your items, send us an email with your order number and we’ll ship a return label.</p><br>
        <p><b>Q: How do I make changes to an existing order?</b></p>
        <p>A: Changes to an existing order can be made as long as the order is still in “processing” status. Please contact our team via email and we’ll make sure to apply the needed changes. If your order has already been shipped, we cannot apply any changes to it. If you are unhappy with your order when it arrives, please contact us for any changes you may require.</p><br>
        <p><b>Q: What shipping options do you have?</b></p>
        <p>A: For Malaysia domestic orders we offer FedEx and Poslaju shipping.</p><br>
        <p><b>Q: Do you ship internationally?</b></p>
        <p>A: No, We currently only ship to Malaysia</p><br>
        <p><b>Q: Can I receive a refund?</b></p>
        <p>A: If you are unhappy with the product you’ve received, you can get a refund.</p><br>
        <p><b>Q: What payment methods do you accept?</b></p>
        <p>A: Any method of payments acceptable by you. For example: We accept MasterCard, Visa, American Express, etc.</p>
        <br><br><br><br>
    </div>
    <?php include_once('loggedinfooter.html') ?>
</body>
</html>