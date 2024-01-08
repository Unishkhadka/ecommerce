<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
// include $root."common/authenticate.php";
include $root . "common/header.php";
include $root . "common/nav.php";
?>
<section class="vh-100" style="background-color: #f2f2f2;">
    <?php
    $Uid = $_SESSION['Uid'];
    $sql = "SELECT * from cart where user_id = $Uid";
    $cart = $con->query($sql);
    $num_items = mysqli_num_rows($cart);
    echo "<div class='container my-3 d-flex align-items-center'>
<h1>Shopping Cart </h1><p class='mt-3'>($num_items items)</p>    
</div>";
    ?>


    <div class="container">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <?php
            while ($row = $cart->fetch_assoc()) {
                $cart_id = $row['cart_id'];
                $pid = $row['product_id'];
                $sql = "SELECT * from products where product_id=$pid";
                $product = $con->query($sql);
                $product_details = $product->fetch_assoc();
                $name = $product_details['product_name'];
                $price = $product_details['price'];
                $image = $product_details['image_url'];
                echo "
        <tbody>
            <tr>
                <td><img src='/ecommerce/$image' class='img-thumbnail object-fit-cover mr-2' alt$name' style='width:90px; height: 70px;'>$name</td>
                <td>$$price</td>
                <td><div class='text-center form-outline w-50'>
                <input type='number' value='1' id='typeNumber' class='form-control' />
            </div>
              </div></td>
                <td><div class='text-center text-danger'><a href='/ecommerce/cart_remove.php?id=$cart_id'<i class='fa-solid fa-trash-can'></i></div></td>
            </tr>
        </tbody>";
            } ?>
        </table>
    </div>
</section>