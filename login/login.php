<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
include $root . "common/header.php";
?>
<?php
session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE `email`='$email'";
    $user = $con->query($sql);

    if (mysqli_num_rows($user) > 0) {
        while ($row = $user->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['loggedin'] = true;
                header("Location: /ecommerce/index.php");
            }
        }
    } else {
        echo "<div class='container mt-4 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Invalid credentials!!</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
}
?>
<section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="/ecommerce/static/shopping.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body px-4 pt-4 text-black">

                                <form action="" method="post">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <h3>SPENDIFY <i class="fa-solid fa-shop" style="color: orange;"></i></h3>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account
                                    </h5>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example17">Email address</label>
                                        <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27">Password</label>
                                        <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" />
                                    </div>

                                    <div class="d-grid gap-2 pt-1">
                                        <button class="btn btn-dark btn-lg btn-block " type="submit" name="login">Login</button>
                                        <hr>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p style="color: #393f81;">Don't have an account? <a href="/ecommerce/login/signup.php" style="color: #393f81;">Register here</a>
                                    </p>
                                    OR
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Log in as <a href="/ecommerce/admin/admin_login.php" style="color: #393f81;">Admin</a> <i class="fa-solid fa-user-tie"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include $root . "/common/footer.php"; ?>