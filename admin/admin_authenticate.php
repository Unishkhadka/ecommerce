<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";

// Start the session
session_start();

// Check if the 'admin' session variable is set
if (!isset($_SESSION['admin'])) {
            header("Location: /ecommerce/admin/admin_login.php");}
?>
