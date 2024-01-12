<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "admin/admin_authenticate.php";
include $root . "common/header.php";
?>
<div class="d-flex">
    <?php
    include "sidebar.php";
    ?>
    <div class="w-100">
        <h1 class="bg-dark text-white p-2">Order Details</h1>
        <div class='table-responsive mx-2'>
            <table class='table table-bordered'>
                <thead class="table-dark">
                        <tr>
                            <th>Order Id</th>
                            <th>Receiver</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class='table-body table-group-divider'>
                        <?php
                        $sql = "SELECT * from order_set order by set_id desc";
                        $result = $con->query($sql);
                        while ($row_set = $result->fetch_assoc()) {
                            $total = 0;
                            $set_id = $row_set['set_id'];
                            $billing_id = $row_set['billing_id'];
                            $user_id = $row_set['user_id'];
                            $status = $row_set['status'];
                            $ordered_at = $row_set['ordered_at'];
                            $sql_billing = "SELECT * from billing_details where billing_id = $billing_id";
                            $result_billing = $con->query($sql_billing);
                            $row_billing = $result_billing->fetch_assoc();
                            $receiver = $row_billing["receiver"];
                            $sql_order_info = "SELECT * from order_info where set_id = $set_id";
                            $result_order_info = $con->query($sql_order_info);
                            while ($row_order_info = $result_order_info->fetch_assoc()) {
                                $quantity = $row_order_info['quantity'];
                                $product_id = $row_order_info['product_id'];
                                $sql_product = $con->query("SELECT * from products where product_id = $product_id");
                                $product = $sql_product->fetch_assoc();
                                $product_name = $product["product_name"];
                                $price = $product["price"];
                                $total = $total + ($price * $quantity);
                            }
                            echo "
                            <tr class='cell-1'>
                            <td>$set_id</td>
                            <td>$receiver</td>
                            <td>
                            $status
                                    </td>
                                    <td>$$total</td>
                                    <td>$ordered_at</td>
                                    <td><a href='/ecommerce/admin/order_details.php?set_id=$set_id' class='btn btn-primary btn-sm'>Details <i class='fa-solid fa-circle-info'></i></button></td>
                                </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>