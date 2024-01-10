<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";

if (isset($_POST['product'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Check if an image is uploaded
    if ($_FILES['image']['size'] > 0) {
        // Retrieve existing product data
        $sql = "SELECT image_url FROM products WHERE product_id = $id";
        $product = $con->query($sql);
            $row = $product->fetch_assoc();
            $existingImage = $root.$row['image_url'];
            // Delete existing image file
            if ($existingImage && file_exists($root . $existingImage)) {
                unlink($existingImage);
            }

            // Upload new image file
            $newImage = $_FILES['image']['name'];
            $temp = $_FILES['image']['tmp_name'];
            $folder = "product_images/" . time() . '_' . $newImage;

            if (move_uploaded_file($temp, $folder)) {
                // Use prepared statement to avoid SQL injection
                $sql = "UPDATE products SET product_name=?, category=?, price=?, description=?, image_url=?, brand=? WHERE product_id=?";
                $update = $con->prepare($sql);
                // Bind parameters
                $update->bind_param("ssdsssi", $name, $category, $price, $description, $folder, $brand, $id);

            } else {
                $sql = "UPDATE products SET product_name=?, category=?, price=?, description=?, image_url=?, brand=? WHERE product_id=?";
                $update = $con->prepare($sql);
                // Bind parameters
                $update->bind_param("ssdsssi", $name, $category, $price, $description, $folder, $brand, $id);
                ;
            }
            if ($update->execute()) {
                echo "Product updated successfully.";
            } else {
                echo "Failed to update product.";
            }

            // Close statement
            $update->close();
        }  else {
        // Use prepared statement to avoid SQL injection
        $sql = "UPDATE products SET product_name=?, category=?, price=?, description=?, brand=? WHERE product_id=?";
        $update = $con->prepare($sql);
        // Bind parameters
        $update->bind_param("ssdssi", $name, $category, $price, $description, $brand, $id);

        if ($update->execute()) {
            echo "Product updated successfully.";
        } else {
            echo "Failed to update product.";
        }

        // Close statement
        $update->close();
    }}
    else{
        echo "Post failed!!";
    }

// Redirect to the product page
// header("Location: /ecommerce/admin/product.php");
?>