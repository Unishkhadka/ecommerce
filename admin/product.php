<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
// include $root."common/authenticate.php";
include $root . "common/header.php"; ?>

<div class="d-flex">
    <?php
    include "sidebar.php";
    echo "
    <div class=''>
    <div class='bg-dark d-flex justify-content-between'>
    <h1 class='px-3 text-white'>Products</h1>
    <a href='/ecommerce/admin/add_product.php'><button type='button' class='btn btn-warning my-2 mx-3'>Add <i class='fa-solid fa-plus'></i></button>
    </a>
    </div>";
    include $root . "admin/show_products_admin.php";
    ?>
</div>
</div>