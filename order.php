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

    $order = "SELECT * from cart where user_id = $Uid";
    $order = $con->query($order);

    $sql = "SELECT billing_id from billing_details where user_id = $Uid";
    $result = $con->query($sql);

    if ($result and (mysqli_num_rows($result) > 0)) {
        $sql = "UPDATE `billing_details` SET(receiver, email, phone, address, postal) VALUES ('$name', '$email', '$phone', '$address', '$postal')";
    } else {
        $sql = "INSERT into `billing_details` (receiver, email, phone, address, postal) VALUES ('$name', '$email', '$phone', '$address', '$postal')";
    }
    $result = $result->fetch_assoc();   
    $insert = $con->query($sql);
    $billing_id = $result['billing_id'];
    $sql = "INSERT into `order_set`(user_id,billing_id) values($Uid, $billing_id)";

    while ($row = $order->fetch_assoc()) {
        $quantity = $row['quantity'];
        $pid = $row['product_id'];
        $status = "pending";
        $sql = "INSERT into order_info(user_id, product_id, quantity, `status`) VALUES($Uid, $pid, $quantity, '$status')";
    }
    if ($order) {
        header("Location: /ecommerce/my_order.php");
    } else {
        echo "Payment failed";
    }
}
?>