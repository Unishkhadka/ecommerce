<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/admin/admin_authenticate.php";


if (isset($_POST['product'])) {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $dir = "admin/product_images/" . time() . '_' . $image;
    $folder = $root . "admin/product_images/" . time() . '_' . $image;
    move_uploaded_file($temp, $folder);

    $sql = "INSERT INTO `products` (`product_name`, `category`, `price`, `description`, `image_url`, `brand`) VALUES ('$name', '$category', $price, '$description', '$dir', '$brand')";

    $insert = $con->query($sql);

    if ($insert) {
        echo "Product added successfully.";
    } else {
        echo "Failed to add product.";
    }

    header("Location: /ecommerce/admin/product.php");
}
