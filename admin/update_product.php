<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/admin/admin_authenticate.php";

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
        $existingImage = $root . $row['image_url'];
        // Delete existing image file
        if ($existingImage && file_exists($root . $existingImage)) {
            unlink($existingImage);
        }

        // Upload new image file
        $newImage = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $dir = "/admin/product_images/" . time() . '_' . $newImage;
        $folder = $root."/admin/product_images/" . time() . '_' . $newImage;
        move_uploaded_file($temp, $folder);

        $sql = "UPDATE `products` SET `product_name`='$name', `category`='$category', price=$price, description='$description', `image_url`='$dir', `brand`='$brand' WHERE product_id=$id";
    } else {
        $sql = "UPDATE `products` SET `product_name`='$name', `category`='$category', price=$price, description='$description', `brand`='$brand' WHERE product_id=$id";
    }

    $update = $con->query($sql);
    if ($update) {
        echo "Product updated successfully.";
    } else {
        echo "Failed to update product.";
    }
} else {
    echo "Post failed!!";
}

// Redirect to the product page
header("Location: /ecommerce/admin/product.php");
