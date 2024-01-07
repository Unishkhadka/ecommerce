<header class="p-3 text-bg-dark">
    <div class="container-fluid d-flex">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <h3>SPENDIFY<i class="fa-solid fa-shop"></i></h3>
            </a>
            <form class="col-12 col-lg-auto px-4 mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-black" placeholder="Search..."
                    aria-label="Search">
            </form>
            <div class="d-flex justify-content-end">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-white"><i class="fa-solid fa-cart-shopping"></i></a></li>
                <li><a href="#" class="nav-link px-2 text-white">Orders</a></li>
            </ul>
                <?php 
          if (session_status() == PHP_SESSION_NONE) {
              echo "
              <button type='button' class='btn btn-outline-light me-2'>Login</button>
              <button type='button' class='btn btn-warning'>Sign-up</button>
            ";
            }
            else{
              echo
              "
              <a href='/ecommerce/login/logout.php' class='btn btn-danger'>Logout</a>
            ";
            }
          ?>

            </div>
        </div>
    </div>
</header>