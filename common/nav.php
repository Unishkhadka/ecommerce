<header class="p-3 text-bg-dark d-none d-lg-block">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between">
            <a href="/ecommerce/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <h3>SPENDIFY <i class="fa-solid fa-shop"></i></h3>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 px-4">
                <?php
                if (isset($_SESSION['Uid']) && $_SESSION['Uid']) {
                    $Uid = $_SESSION['Uid'];
                    $sql = $con->query("SELECT fullname from users where user_id = $Uid");
                    $username = $sql->fetch_assoc();
                    $username = $username['fullname'];
                    $sql = "SELECT * from cart where user_id = $Uid";
                    $cart = $con->query($sql);
                    $num_items = mysqli_num_rows($cart);
                    echo "
                    <li><a href='/ecommerce/cart.php' class='nav-link px-2 text-white'><i class='fa-solid fa-cart-shopping'></i> ($num_items)</a></li>
                    <li><a href='/ecommerce/my_order.php' class='nav-link px-2 text-white'>My Orders</a></li>
                    <li><a href='#' class='nav-link px-2 text-white disabled'>Logged in as $username</a></li>";
                }  ?>


            </ul>

            <div class="d-flex text-end">
                <form class="col-12 col-lg-auto px-4 mb-2 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-dark text-white" placeholder="Search..." aria-label="Search">
                </form>

                <?php
                if (isset($_SESSION['Uid']) && $_SESSION['Uid']) {
                    // User is logged in
                    echo "<a href='/ecommerce/login/logout.php' class='btn btn-danger'>Logout</a>";
                } else {
                    // User is not logged in
                    echo "
                            <a href='/ecommerce/login/login.php' class='btn btn-outline-light me-2'>Login</a>
                            <a href='/ecommerce/login/signup.php' class='btn btn-warning'>Sign-up</a>
                        ";
                }
                ?>

            </div>
        </div>
    </div>
</header>