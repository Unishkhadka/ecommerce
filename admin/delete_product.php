<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Use a prepared statement to delete the product
    $deleteSql = "DELETE FROM products WHERE product_id = ?";
    $deleteStmt = $con->prepare($deleteSql);
    $deleteStmt->bind_param('i', $product_id);

    // Use a prepared statement to select the image URL
    $selectSql = "SELECT image_url FROM products WHERE product_id = ?";
    $selectStmt = $con->prepare($selectSql);
    $selectStmt->bind_param('i', $product_id);

    if ($selectStmt->execute()) {
        $result = $selectStmt->get_result();
        $row = $result->fetch_assoc();
        $image = $row['image_url'];

        if ($deleteStmt->execute()) {
            unlink($root . $image);
            echo "Product deleted successfully.";
        } else {
            echo "Error deleting product: " . $deleteStmt->error;
        }
    } else {
        echo "Error retrieving product information: " . $selectStmt->error;
    }

    $deleteStmt->close();
    $selectStmt->close();
} else {
    echo "Invalid product ID.";
}

header("Location:/ecommerce/admin/product.php")
?>
