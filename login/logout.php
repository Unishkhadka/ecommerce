<?php 
$root = "C:/xampp/htdocs/ecommerce/";
include $root."common/connection.php";
session_unset();
session_destroy();
header("Location: /ecommerce/index.php");
?>