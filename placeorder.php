<?php

    session_start();
    include 'config.php';
    error_reporting(0);
	$conn = connection();


    $lastquery = "SELECT * FROM `order1` ORDER BY `order_id` DESC";


    $lastrun = mysqli_query($conn,$lastquery);
    
    
    $temarray = array();

    foreach($lastrun as $lastrun){
        // echo $lastrun['order_id'];
        array_push($temarray,$lastrun['order_id']);
    }
    
    $first = array_values($temarray)[0];

    echo $first;


    
    










?>