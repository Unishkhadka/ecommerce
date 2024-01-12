<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "admin/admin_authenticate.php";
include $root . "common/header.php";
$set_id = $_GET['set_id'];
$sql = "SELECT * from order_set where set_id = $set_id";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$status = $row['status'];
$date = $row['ordered_at'];
$method = $row['method'];
?>
<div class="d-flex">
    <?php
    include "sidebar.php";
    ?>
    <div class="container-fluid" style="background-color: #f2f2f2;">

        <!-- Title -->
        <div class="d-flex justify-content-between align-items-center py-3">
            <h5>Order:
                <?php echo $set_id ?>
            </h5>
            <h5>Ordered at: <?php echo $date ?></h5>
        </div>
        <!-- Main content -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Details -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                <table class='table table-borderless'>
                                    <thead>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price per item</th>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sql = "SELECT * from order_info where set_id = $set_id";
                                        $result = $con->query($sql);
                                        $total = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            $product_id = $row['product_id'];
                                            $quantity = $row['quantity'];
                                            $sql = $con->query("SELECT * from products where product_id = $product_id");
                                            $product = $sql->fetch_assoc();
                                            $product_name = $product["product_name"];
                                            $image = $product["image_url"];
                                            $price = $product["price"];
                                            $brand = $product["brand"];
                                            $total = $total + ($price * $quantity);
                                            echo "
                        <tr>
                <td>
                  <div class='d-flex mb-2'>
                    <div class='flex-shrink-0'>
                      <img src='/ecommerce/$image' alt='' width='75 ' class='img-fluid'>
                    </div>
                    <div class='flex-lg-grow-1 ms-3'>
                      <h6 class='small mb-0'><a href='#' class='text-reset'>$product_name</a></h6>
                      <span class='small'>Brand: $brand</span>
                    </div>
                  </div>
                </td>
                <td class='text-center'>$quantity</td>
                <td class='text-center'>$$price</td>
              </tr>
              <tr>";
                                        }
                                        ?>

                            </div>
                        </div>


                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Subtotal</td>
                                <td class="text-center">$
                                    <?php echo $total ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Shipping</td>
                                <td class="text-center">Free</td>
                            </tr>
                            <tr>
                                <td colspan="2">Discount</td>
                                <td class="text-danger text-center"></td>
                            </tr>
                            <tr class="fw-bold">
                                <td colspan="2">TOTAL</td>
                                <td class="text-center">$
                                    <?php echo $total ?>
                                </td>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <form action="/ecommerce/admin/order_update.php" method="post" class="d-flex justify-content-between">
    <input type="hidden" name="set_id" value="<?php echo $set_id ?>">
    <div class="d-flex align-items-center">
        <strong>Status: </strong>
        <select class='form-select' name='status' aria-label='Default select example'>
            <option value='pending'<?php echo ($status == 'pending') ? ' selected' : ''; ?>>pending</option>
            <option value='confirmed'<?php echo ($status == 'confirmed') ? ' selected' : ''; ?>>confirmed</option>
            <option value='delivered'<?php echo ($status == 'delivered') ? ' selected' : ''; ?>>delivered</option>
        </select>
    </div>
    <div class="text-end mx-2">
        <button type="submit" name="save" class="btn btn-success">Save Changes</button>
    </div>
</form>

    </div>
    <div class="col-lg-4">
        <!-- Customer Notes -->
        <div class="card mb-4">
            <div class="card-body">
                <h5>Payment Method</h5>
                <hr>
                <p><?php echo $method ?> <br>
                    Total: $
                    <?php echo $total ?>
            </div>
        </div>
        <?php
        $sql = "SELECT billing_id from order_set where set_id = $set_id";
        $result = $con->query($sql);
        $result = $result->fetch_assoc();
        $billing_id = $result["billing_id"];
        $sql = "SELECT * from billing_details where billing_id = $billing_id";
        $result = $con->query($sql);
        $details = $result->fetch_assoc();
        $receiver = $details["receiver"];
        $email = $details["email"];
        $phone = $details["phone"];
        $address = $details["address"];
        $postal = $details["postal"];
        ?>
        <div class="card mb-4">
            <!-- Shipping information -->
            <div class="card-body">
                <h5>Shipping Information</h5>
                <hr>
                Name: <strong>
                    <?php echo $receiver ?>
                </strong>
                <br>
                E-mail: <strong>
                    <?php echo $email ?>
                </strong>
                <br>
                Phone: <strong>
                    <?php echo $phone ?>
                </strong>
                <br>
                Address: <strong class="mt-2">
                    <?php echo $address ?><br>
                </strong>

            </div>
        </div>
    </div>
</div>