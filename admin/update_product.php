<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
include $root . "common/authenticate.php";

if (isset($_POST['product'])) {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $folder = "product_images/" . time() . '_' . $image;
    move_uploaded_file($temp, $folder);

    // Use prepared statement to avoid SQL injection
    $sql = "INSERT INTO products (product_name, category, price, description, image_url, brand) VALUES (?, ?, ?, ?, ?, ?)";
    $insert = $con->prepare($sql);
    
    // Bind parameters
    $insert->bind_param("ssdsss", $name, $category, $price, $description, $folder, $brand);

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
