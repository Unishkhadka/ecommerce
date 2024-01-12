<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/header.php";
?>
<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
include $root . "common/header.php";
?>
<section class="min-vh-100 py-4" style="background-color: #508bfc;">
    <?php
    if (isset($_POST['signup'])) {
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT email from users";
        $result = $con->query($sql);
        while ($row = $result->fetch_assoc()) {
            $exitsting_email = $row['email'];
            if ($email != $exitsting_email) {
                $email_exist = false;
            }
            else{
                $email_exist = true;
            }
         }
            if($email_exist == true){
                echo '<div class="container alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Password and Confirm Password does not match!!</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
            }
            else {
                if ($password == $cpassword) {
                    $sql = "INSERT into users(`fullname`, `email`, `phone`, `password`) VALUES('$fullname', '$email', '$phone', '$hash')";
                    $user = $con->query($sql);
                } else {
                    echo '<div class="container alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Password and Confirm Password does not match!!</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
                }
            }
    }
    ?>
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 ">

                        <h3 class="mb-3">Sign in</h3>
                        <form action="" method="post">
                            <div class="form-outline mb-4">
                                <input name="name" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Fullname" required />
                            </div>
                            <div class="form-outline mb-4">

                                <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Email" required />
                            </div>
                            <div class="form-outline mb-4">

                                <input type="text" name="phone" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Phone" required />
                            </div>

                            <div class="form-outline mb-4">

                                <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Password" required />
                            </div>
                            <div class="form-outline mb-4">

                                <input type="password" name="cpassword" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Confirm Password" required />
                            </div>
                            <button class="btn btn-primary btn-lg btn-block w-100" name="signup" type="submit">Sign Up</button>
                        </form>
                        <div class="text-center">
                            <p class="my-3">Already have account? <a href="/ecommerce/login/login.php">Login here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include $root . "/common/footer.php"; ?>