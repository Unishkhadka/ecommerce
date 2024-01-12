<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/authenticate.php";
include $root . "common/header.php";
include $root . "common/nav.php";
$Uid = $_SESSION['Uid'];
?>
<div class="d-flex justify-content-center py-4" style="background-color: #eee;">

    <div class=" col-8">
        <h3>My Orders</h3>
        <?php
        $sql = "SELECT * FROM order_set WHERE user_id = $Uid order by set_id desc";
        $result = $con->query($sql);

        while ($row = $result->fetch_assoc()) {
            $set_id = $row['set_id'];
            $date = $row['ordered_at'];
            $status = $row['status'];

            echo "
        <div class='row'>
                        <!-- Title -->
                <div class='d-flex justify-content-between align-items-center py-3'>
                    <h2 class='h5 mb-0'><a href='#' class='text-muted'></a> Order: $set_id</h2>
                </div>
  
                <!-- Main content -->
                <div class='card mb-4'>
                    <div class='card-body'>
                        <div class='mb-3 d-flex justify-content-between'>
                            <div>
                                <span class='me-3'>$date</span>
                                <span class='me-3'>#16123222</span>
                            </div>
                            <div class='d-flex'>Status-<p class='text-decoration-underline'>$status</p></div>
                        </div>
                        <table class='table table-borderless'>
                            <tbody>";

            $sql_order_info = "SELECT * FROM order_info WHERE set_id = $set_id";
            $result_order_info = $con->query($sql_order_info);

            while ($row_order_info = $result_order_info->fetch_assoc()) {
                $quantity = $row_order_info['quantity'];
                $product_id = $row_order_info['product_id'];

                $sql_product = "SELECT * FROM products WHERE product_id = $product_id";
                $result_product = $con->query($sql_product);

                while ($product = $result_product->fetch_assoc()) {
                    $product_name = $product['product_name'];
                    $price = $product['price'];
                    $image = $product['image_url'];

                    echo "
                    <tr>
                        <td>
                            <div class='d-flex mb-2'>
                                <div class='flex-shrink-0'>
                                    <img src='/ecommerce/$image' alt='' width='70' class='img-fluid'>
                                </div>
                                <div class='flex-lg-grow-1 ms-3'>
                                    <h6 class='small mb-0'><a href='#' class='text-reset'>$product_name</a></h6>
                                    <span class='small'>Color: Black</span>
                                </div>
                            </div>
                        </td>
                        <td>$quantity</td>
                        <td class='text-end'>$price</td>
                    </tr>";
                }
            }
            echo "
                            </tbody>
                        </table>
                    </div>
        </div>
        </div>"; // Closing the row and container for each order
        }
        ?>
    </div>
</div>

<?php include $root . "common/footer.php" ?>