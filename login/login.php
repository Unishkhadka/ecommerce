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

<div class="container mx-auto col-4 mt-5">
    <h1 class="my-4">Login</h1>
    <form action="" method="post">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email address</label>
            <input type="email" name="email" id="form2Example1" class="form-control" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
            <input type="password" name="password" id="form2Example2" class="form-control" />
        </div>

        <!-- 2 column grid layout for inline styling -->

        <!-- Submit button -->
        <button type="submit" name="login" class="btn btn-primary btn-block mb-4 w-full">Sign in</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="#!">Register</a></p>
        </div>
    </form>
</div>
<?php include $root . "/common/footer.php"; ?>