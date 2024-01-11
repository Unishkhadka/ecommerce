<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root."common/authenticate.php";
include $root . "common/header.php";
include $root . "common/nav.php";
?>
<section class="min-vh-100" style="background-color: #eee;">
    <div class="container-fluid h-100 py-5">
        <div class="row d-flex justify-content-center align-items-start h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                <?php
                $Uid = $_SESSION['Uid'];
                $sql = "SELECT * from cart where user_id = $Uid";
                $cart = $con->query($sql);
                $num_items = mysqli_num_rows($cart);
                echo "
                    <div>
                    <p class='mt-3'>($num_items items)</p>    
                    </div>
                    </div>";
                ?>
                <div class="col-8">
                    <?php
                    $subtotal = 0;
                    while ($row = $cart->fetch_assoc()) {
                        $cart_id = $row['cart_id'];
                        $quantity = $row['quantity'];
                        $pid = $row['product_id'];
                        $sql = "SELECT * from products where product_id=$pid";
                        $product = $con->query($sql);
                        $product_details = $product->fetch_assoc();
                        $name = $product_details['product_name'];
                        $price = $product_details['price'];
                        $total = $price*$quantity;
                        $subtotal = $subtotal + ($quantity * $price);
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
                      <input id='form1' min='1' name='quantity' value='$quantity' type='number'
                        class='form-control form-control-sm px-3' />
                    </div>
                    <div class='col-md-3 col-lg-2 col-xl-2 offset-lg-1'>
                      <h5 class='mb-0'>$$total</h5>
                    </div>
                    <div class='col-md-1 col-lg-1 col-xl-1 text-end'>
                      <a href='/ecommerce/cart_remove.php?id=$cart_id' class='text-danger'><i class='fas fa-trash fa-lg'></i></a>
                    </div>
                  </div>
                </div>
              </div>
                ";
                    } ?>

                    <div class="d-flex justify-content-between">
                        <a href="/ecommerce/" class="btn btn-link icon-link-hover text-decoration-none text-dark"><i
                                class="fa-solid fa-arrow-left"></i> Continue Shopping</a>
                        <a href="/ecommerce/checkout.php"><button type="button" class="btn btn-warning">Proceed to Pay</button>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="mt-5 mt-lg-0">
                        <div class="card border shadow-none">
                            <div class="card-header bg-transparent border-bottom py-3 px-4">
                                <h5 class="font-size-16 mb-0">Order Summary</h5>
                            </div>
                            <div class="card-body p-4 pt-2">

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total :</td>
                                                <td class="text-end"><?php echo "$$subtotal"; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Discount : </td>
                                                <td class="text-end"></td>
                                            </tr>
                                            <tr>
                                                <td>Shipping Charge :</td>
                                                <td class="text-end"></td>
                                            </tr>
                                            <tr>
                                                <td>Estimated Tax : </td>
                                                <td class="text-end"></td>
                                            </tr>
                                            <tr class="bg-light">
                                                <th>Total :</th>
                                                <td class="text-end">
                                                    <span class="fw-bold">
                                                    <?php echo "$$subtotal"; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include $root . "common/footer.php";
?>