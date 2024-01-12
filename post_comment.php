<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
$Uid = $_SESSION['Uid'];
$product_id = $_POST['product_id'];
var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment'];
    if ($comment == '') {
        echo "No Comment.";
    } else {
        // Assuming your review table has columns: review_id, user_id, product_id, comment
        $sql = "INSERT INTO reviews (`user_id`, `product_id`, `comment`) VALUES ($Uid, $product_id, '$comment')";
        $insert = $con->query($sql);

        if ($insert) {
            echo "Review added successfully";
        } else {
            echo "Failed to add review";
        }
    }
} else {
    echo "Post failed.";
}

header("Location: product_details.php?id=$product_id");
?>
