<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root."common/connection.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Use a prepared statement to delete the product
    $sql = "DELETE FROM products WHERE product_id = ?";
    $delete = $con->prepare($sql);
    $delete->bind_param("i", $product_id); // 'i' represents an integer, adjust if your product_id is of a different type
    $delete->execute();

    if ($delete->affected_rows > 0) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product.";
    }

    $delete->close();
} else {
    echo "Invalid product ID.";
}
header("Location: /ecommerce/admin/product.php");
$con->close();
?>
