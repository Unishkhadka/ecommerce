<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
include $root."common/authenticate.php";
include $root . "common/header.php";
include $root . "common/nav.php";
?>
<section class="h-100" style="background-color: #eee;">
    <div class="container-fluid h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                    <!-- <div>
            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                  class="fas fa-angle-down mt-1"></i></a></p>
          </div> -->

                    <?php
                    $Uid = $_SESSION['Uid'];
                    $sql = "SELECT * from cart where user_id = $Uid";
                    $cart = $con->query($sql);
                    $num_items = mysqli_num_rows($cart);
                    echo "<div>
<p class='mt-3'>($num_items items)</p>    
</div>
</div>";
                    ?>

                    <?php
                    while ($row = $cart->fetch_assoc()) {
                        $cart_id = $row['cart_id'];
                        $quantity = $row['quantity'];
                        $pid = $row['product_id'];
                        $sql = "SELECT * from products where product_id=$pid";
                        $product = $con->query($sql);
                        $product_details = $product->fetch_assoc();
                        $name = $product_details['product_name'];
                        $price = $product_details['price'];
                        $image = $product_details['image_url'];
                        echo "
                <div class='card rounded-3 mb-4'>
                <div class='card-body p-4'>
                  <div class='row d-flex justify-content-between align-items-center'>
                    <div class='col-md-2 col-lg-2 col-xl-2'>
                      <img
                        src='/ecommerce/$image'
                        class='img-fluid rounded-3' alt='Cotton T-shirt'>
                    </div>
                    <div class='col-md-3 col-lg-3 col-xl-3'>
                      <p class='lead fw-normal mb-2'>$name</p>
                    </div>
                    <div class='col-md-3 col-lg-3 col-xl-2 d-flex'>
                      <input id='form1' min='0' name='quantity' value='2' type='number'
                        class='form-control form-control-sm px-3' />
                    </div>
                    <div class='col-md-3 col-lg-2 col-xl-2 offset-lg-1'>
                      <h5 class='mb-0'>$$price</h5>
                    </div>
                    <div class='col-md-1 col-lg-1 col-xl-1 text-end'>
                      <a href='/ecommerce/cart_remove.php' class='text-danger'><i class='fas fa-trash fa-lg'></i></a>
                    </div>
                  </div>
                </div>
              </div>
                ";
                    } ?>



                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>