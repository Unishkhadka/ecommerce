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
                    $sql = "SELECT * from order_set";
                    $result = $con->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $set_id = $row['set_id'];
                        $billing_id = $row['billing_id'];
                        $user_id = $row['user_id'];
                        $status = $row['status'];
                        $ordered_at = $row['ordered_at'];
                        $sql = "SELECT * from billing_details where billing_id = $billing_id";
                        $result = $con->query($sql);
                        $row = $result->fetch_assoc();
                        $receiver = $row["receiver"];
                        echo "
                        <tr class='cell-1'>
                            <td>$set_id</td>
                            <td>$receiver</td>
                            <form action='/ecommerce/admin/order_update.php' method='post'>
                                <td>
                                    <select class='form-select' name='status' aria-label='Default select example'>
                                        <option value='pending'" . ($status == 'pending' ? ' selected' : '') . ">pending</option>
                                        <option value='confirmed'" . ($status == 'confirmed' ? ' selected' : '') . ">confirmed</option>
                                        <option value='delivered'" . ($status == 'delivered' ? ' selected' : '') . ">delivered</option>
                                    </select>
                                </td>
                                <td>$2674.00</td>
                                <td>$ordered_at</td>
                                <td><a href='/ecommerce/admin/order_details.php?set_id=$set_id' class='btn btn-primary btn-sm'>Details <i class='fa-solid fa-circle-info'></i></button></td>
                            </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-end mx-2">
            <button type="submit" name="save" class="btn btn-success">Save Changes</button>
            </form>
        </div>
    </div>
</div>
<?php include $root . "common/footer.php"; ?>