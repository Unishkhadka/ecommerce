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
    if ($_FILES['image']['name']) {
        $sql = "SELECT * FROM products WHERE product_id = $id";
        $product = $con->query($sql);
        $product = $product->fetch_assoc();
        $image = $product['image_url'];
        $image = $root . $image;
        if (file_exists($image)) {
            unlink($image);
        }
        $newimage = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder = "product_images/" . time() . '_' . $newimage;
        move_uploaded_file($temp, $folder);

        // Use prepared statement to avoid SQL injection
        $sql = "UPDATE products SET product_name=?, category=?, price=?, description=?, image_url=?, brand=? WHERE product_id=?";
        $insert = $con->prepare($sql);
        // Bind parameters
        $insert->bind_param("ssdsssi", $name, $category, $price, $description, $folder, $brand, $id);
    } else {
        // Use prepared statement to avoid SQL injection
        $sql = "UPDATE products SET product_name=?, category=?, price=?, description=?, brand=? WHERE product_id=?";
        $insert = $con->prepare($sql);
        // Bind parameters
        $insert->bind_param("ssdssi", $name, $category, $price, $description, $brand, $id);
    }
    if ($insert->execute()) {
        echo "Product updated successfully.";
    } else {
        echo "Failed to update product. Error: " . $insert->error;
    }

    // Close statement
    $insert->close();

    header("Location: /ecommerce/admin/product.php");
}
?>
