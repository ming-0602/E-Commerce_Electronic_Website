<?php

    session_start();
    include 'config.php';
    error_reporting(0);
	$conn = connection();

    $var_value = $_GET['cartid'];
    $query = "DELETE FROM `cart` WHERE `cart_id` = $var_value";
    $result = mysqli_query($conn,$query);
    header('Location: cart.php');



?>