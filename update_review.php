<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
include $root . "common/authenticate.php";
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $review_id = $_POST['review_id'];
    $new_comment = $_POST['comment'];
    $sql = "UPDATE reviews SET `comment` = '$new_comment' WHERE review_id = $review_id";
    $update = $con->query($sql);
    if ($update) {
        echo "Review updated";
    } else {
        echo "Review failed to update";
    }
} else {
    echo "Post failed!";
}
header("Location: /ecommerce/product_details.php?id=$product_id");
?>
