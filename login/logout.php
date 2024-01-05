<?php 
$root = "C:/xampp/htdocs/ecommerce/";
include $root."common/connection.php";
session_start();
session_unset();
session_destroy();
header("Location: /ecommerce/index.php");
?>