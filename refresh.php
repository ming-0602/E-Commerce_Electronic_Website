<?php

    session_start();
    include 'config.php';
    error_reporting(0);
	$conn = connection();
    header('cart.php');

?>