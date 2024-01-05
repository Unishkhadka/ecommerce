<?php 
$root = "C:/xampp/htdocs/ecommerce/";
include $root."common/connection.php";
session_start();
$loggedin = $_SESSION['loggedin'];
if(!$loggedin){
    header("Location: /ecommerce/login/login.php");
}