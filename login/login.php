<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
include $root . "common/header.php";
?>
<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 ">

                        <h3 class="mb-5">Sign in</h3>
                        <form action="">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="typeEmailX-2">Email</label>
                                <input type="email" id="typeEmailX-2" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="typePasswordX-2">Password</label>

                                <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                            </div>
                        </form>
                        <button class="btn btn-primary btn-lg btn-block w-100" type="submit">Login</button>
                        <div class="text-center">
                        <p class="my-3">Don't have account? <a href="">Register here</a></p>
                        OR
                        <p class="my-3">Login as <a href="/ecommerce/admin/admin_login.php">Admin</a>?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include $root . "/common/footer.php"; ?>