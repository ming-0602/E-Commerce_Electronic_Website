<?php
    function connection() {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "electron";

        $conn = new mysqli($host,$user,$password,$database);
        //check connection 
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }else{
            //echo "Successful!";
            return $conn;
        }

    }
?>
