<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
$Uid = $_SESSION['Uid'];
?>
<?php
if (isset($_POST['payment'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $postal = $_POST['postal'];
    
    $sql = "INSERT into `billing_details` (receiver, email, phone, address, postal, user_id) VALUES ('$name', '$email', '$phone', '$address', '$postal', $Uid)";
    $insert = $con->query($sql);
    
    $sql = "SELECT billing_id from billing_details where user_id = $Uid order by billing_id DESC";
    $result = $con->query($sql);
    $result = $result->fetch_assoc();
    $billing_id = $result['billing_id'];
    
    $sql = "INSERT into `order_set`(user_id,billing_id) values($Uid, $billing_id)";
    $insert = $con->query($sql);

    $sql = "SELECT set_id from order_set";
    $result = $con->query($sql);
    $result = $result->fetch_assoc();
    $set_id = $result['set_id'];

    $order = "SELECT * from cart where user_id = $Uid";
    $order = $con->query($order);
    while ($row = $order->fetch_assoc()) {
        $quantity = $row['quantity'];
        $pid = $row['product_id'];
        $status = "pending";
        $sql = "INSERT into order_info(user_id, product_id, quantity, `status`, set_id) VALUES($Uid, $pid, $quantity, '$status', $set_id)";
        $insert = $con->query($sql);
    }
    if ($order) {
        header("Location: /ecommerce/my_order.php");
    } else {
        echo "Payment failed";
    }
}
?>