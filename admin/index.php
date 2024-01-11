<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "admin/admin_authenticate.php";
include $root . "common/header.php";
 ?>

<div class="d-flex">
    <?php
    $products = "SELECT * FROM products";
    $users = "SELECT * FROM users";
    $orders = "SELECT * FROM order_set where `status` = 'pending' ";
    $n_products = mysqli_num_rows($con->query($products));
    $n_users = mysqli_num_rows($con->query($users));
    $n_orders = mysqli_num_rows($con->query($orders));

    include "sidebar.php";
    ?>

    <div class="container">
        <h1 class="mb-4">Dashboard</h1>

        <div class="row">
            <div class="col-md-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text"><?php echo $n_products; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text"><?php echo $n_users; ?></p>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="card bg-warning text-dark mb-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Orders</h5>
                        <p class="card-text"><?php echo $n_orders; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include $root . "common/footer.php"; ?>
