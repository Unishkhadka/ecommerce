<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
$Uid = $_SESSION['Uid'];
if(!isset($Uid) || empty($Uid)){
header("Location: /ecommerce/login/login.php");
}