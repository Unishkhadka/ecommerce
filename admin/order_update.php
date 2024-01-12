<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "admin/admin_authenticate.php";

if (isset($_POST['save'])) {
    $set_id = $_POST['set_id'];
    $sql = "SELECT `status` from order_set";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $status = $_POST['status'];
    $sql = "UPDATE order_set SET `status` = '$status' WHERE set_id = $set_id";
    $update = $con->query($sql);
    if ($update) {
        echo 'Updated details';
    }
    else {
        echo 'Update failed';}
}
else{
    echo 'Post failed';
}
header('Location: /ecommerce/admin/orders.php');
?>