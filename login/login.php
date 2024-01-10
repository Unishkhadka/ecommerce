<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
include $root . "common/header.php";
?>
<?php
session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * from users where email = '$email'";
    $user = $con->query($sql);

    if(mysqli_num_rows($user)>0){
        while($row=$user->fetch_assoc()){
            if(password_verify($password, $row['password'])){
                $_SESSION['Uid'] = $row['user_id'];
                header("Location: /ecommerce/index.php");
            }
        }
    }
    else{
        echo'<div class="my-3 alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Invalid credentials</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
?>
<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 ">

                        <h3 class="mb-5">Sign in</h3>
                        <form action="" method="post">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="typeEmailX-2">Email</label>
                                <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="typePasswordX-2">Password</label>

                                <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                            </div>
                            <button class="btn btn-primary btn-lg btn-block w-100"  name="login" type="submit">Login</button>
                        <div class="text-center">   
                        </form>
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