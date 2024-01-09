<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
// include $root . "common/authenticate.php";

if (isset($_POST['product'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    if ($_FILES['image']){
    $sql = "SELECT * from products where product_id = $id";
    $product = $con->query($sql);
    $product = $product->fetch_assoc();
    $image = $product['image_url'];
    $image = "/ecommerce/".$image;
    unlink("$image");
    $newimage = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $folder = "product_images/" . time() . '_' . $newimage;
    move_uploaded_file($temp, $folder);
 
    // Use prepared statement to avoid SQL injection
    $sql = "UPDATE table products SET(product_name, category, price, description, image_url, brand) VALUES (?, ?, ?, ?, ?, ?) where product_id=$id";
    $insert = $con->prepare($sql);
    // Bind parameters
    $insert->bind_param("ssdsss", $name, $category, $price, $description, $folder, $brand);
    }
    else{

    }
    if ($insert->execute()) {
        echo "Product added successfully.";
    } else {
        echo "Failed to add product.";
    }

    // Close statement
    $insert->close();

    header("Location: /ecommerce/index.php");
}
?>