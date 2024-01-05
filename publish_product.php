<?php 
$root = "C:/xampp/htdocs/ecommerce/";
include $root."common/connection.php";
include $root."common/authenticate.php";

if(isset($_POST['product'])){
    $name = $_POST["name"];
    $brand = $_POST["brand"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $description = $_POST["description"];
    $image = $_FILES["image"]["name"];
    $temp = $_FILES["image"]["tmp_name"];
    $folder = "product_image/".time().'_'.$image;
    $upload = move_uploaded_file($temp,$folder);
}
$sql = "INSERT into products ('product_name','category','price', 'description', 'image_url', 'brand') VALUES('$name', '$category', '$price', '$description', '$folder', '$brand')";
$insert = $con->query($sql);
header("Location: /ecommerce/")


?>