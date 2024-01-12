<?php
$root = "C:/xampp/htdocs/ecommerce/";include $root . "/common/connection.php";
include $root . "common/authenticate.php";

$review_id=$_GET['id'];
$product_id = $_GET['product_id'];
$sql = "DELETE FROM reviews where review_id=$review_id";
$delete = $con->query($sql);

if($delete){
    echo "Comment deleted.";
}
else{
    echo "Comment deletion failed.";
}
header("Location: /ecommerce/product_details.php?id=$product_id");
?>