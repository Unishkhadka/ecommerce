<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
// include $root."common/authenticate.php";
include $root . "common/header.php";
include $root . "common/nav.php";
?>
 <?php
                $Uid = $_SESSION['Uid'];
                $sql = $con->query("SELECT * from users where user_id = $Uid");
                    $user = $sql->fetch_assoc();
                    $username = $user['fullname'];
                    $email = $user['email'];
                    $phone = $user['phone'];
                $sql = "SELECT * from cart where user_id = $Uid";
                $cart = $con->query($sql);
                $num_items = mysqli_num_rows($cart);
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
                        $subtotal = $subtotal + ($quantity * $price);}
                ?>
<div class="container-fluid my-4">
    <h1>Checkout</h1>
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <ol class="mb-0 px-4 mt-3">
                        <li>
                            <div>
                                <div>
                                    <h3 class="mb-1">Billing Info</h3>
                                    <div class="mb-3">
                                        <form>
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-name">Name</label>
                                                            <input type="text" class="form-control" id="billing-name"
                                                            value="<?php echo $username?>"
                                                                placeholder="Enter name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-email-address">Email Address</label>
                                                            <input type="email" class="form-control"
                                                                id="billing-email-address" 
                                                                value = "<?php echo $email?>" placeholder="Enter email">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-phone">Phone</label>
                                                            <input type="text" class="form-control" id="billing-phone"
                                                            value = "<?php echo $phone?>"
                                                                placeholder="Enter Phone no.">
                                                        </div>
                                                </div>
                                                <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="billing-address">Address</label>
                                                    <input class="form-control" id="billing-address" rows="3"
                                                        placeholder="Enter full address">
                                                </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-4 mb-lg-0">
                                                            <label class="form-label">Country</label>
                                                            <select class="form-control form-select" title="Country">
                                                                <option value="0">Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-4 mb-lg-0">
                                                            <label class="form-label" for="billing-city">City</label>
                                                            <input type="text" class="form-control" id="billing-city"
                                                                placeholder="Enter City">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-0">
                                                            <label class="form-label" for="zip-code">Zip / Postal
                                                                code</label>
                                                            <input type="text" class="form-control" id="zip-code"
                                                                placeholder="Enter Postal code">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="pt-5">
                            <div>
                                <div>
                                    <h3 class="mb-4">Payment</h3>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 px-3">
                                            <div data-bs-toggle="collapse">
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay-method" id="pay-methodoption1"
                                                        class="card-radio-input">
                                                    <div class="text-center">
                                                        <span class="card-radio text-center text-truncate">
                                                            <h5><i class="fa-regular fa-credit-card"></i></h5>
                                                            Credit / Debit Card
                                                        </span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6 px-3">
                                            <div>
                                                <label class="card-radio-label bordered">
                                                    <input type="radio" name="pay-method" id="pay-methodoption2"
                                                        class="card-radio-input">
                                                    <div class="text-center">
                                                        <span class="card-radio py-3 text-center text-truncate">
                                                            <h5><i class="fa-solid fa-money-bill"></i></h5>
                                                            E-sewa
                                                        </span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6 px-3">
                                            <div>
                                                <label class="card-radio-label">
                                                    <input type="radio" name="pay-method" id="pay-methodoption3"
                                                        class="card-radio-input" checked="">
                                                    <div class="text-center">
                                                        <span class="card-radio py-3 text-center text-truncate">
                                                            <h5><i class="fa-solid fa-money-bill"></i></h5>
                                                            <span>Cash on Delivery</span>
                                                        </span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row my-4">
                <div class="col">
                    <a href="/ecommerce/" class="btn btn-link icon-link-hover text-decoration-none text-dark"><i
                            class="fa-solid fa-arrow-left"></i> Continue Shopping</a>
                </div> <!-- end col -->
                <div class="col">
                    <div class="text-end mt-2 mt-sm-0">
                        <a href="#" class="btn btn-success">Procced <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row-->
        </div>
        <div class="col-xl-4">
            <div class="card checkout-order-summary">
                <div class="card-body">
                    <div class="p-3 bg-light mb-3">
                        <h5 class="font-size-16 mb-0">Order Summary</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 table-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0" style="width: 110px;" scope="col" colspan="2">Product</th>
                                    <th class="border-top-0" scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td colspan="2">
                                    <h5 class="font-size-14 m-0">Sub Total :</h5>
                                </td>
                                <td>
                                <?php echo "$$subtotal"; ?>
                                </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Discount :</h5>
                                    </td>
                                    <td>
                                       
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Shipping Charge :</h5>
                                    </td>
                                    <td>
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Estimated Tax :</h5>
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>

                                <tr class="bg-light">
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Total:</h5>
                                    </td>
                                    <td>
                                        <?php echo "$$subtotal" ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
    <?php
    include $root . "common/footer.php";
    ?>
