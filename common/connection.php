<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecommerce";

    $con = new mysqli($server, $username, $password, $dbname);

    if(!$con){
        echo "Connection error.";
    }
    session_start();

?>