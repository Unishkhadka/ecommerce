<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";

$sql = "SELECT * from users";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    
}
?>