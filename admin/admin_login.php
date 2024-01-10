<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
include $root . "common/header.php";
session_start(); ?>
<div class="container-fluid py-2 bg-dark">
<?php 
  if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM admins WHERE `email`='$email'";
  $user = $con->query($sql);
  if (mysqli_num_rows($user) > 0) {
    while ($row = $user->fetch_assoc()) {
      if ($password == $row['password']) {
          $_SESSION['admin'] = $row['admin_id'];
        header("Location: /ecommerce/admin/index.php");
      } else {
        echo "
        <div class='container mt-4 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Wrong Password!!</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
      }
    }
  } else {
    echo "
        <div class='container mt-4 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Wrong Email!!</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
  }
}
?>

  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card my-4">
        <form action="" method="post" class="card-body p-lg-5" style=" background-color: #ebf2fa;">

          <div class="text-center">
            <h2>Admin <i class="fa-solid fa-key"></i></h2>
            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid img-thumbnail rounded-circle my-3" width="200px" alt="profile">
          </div>

          <div class="mb-3">
            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
          </div>
          <div class="mb-3">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>
          <div class="text-center"><button type="submit" name="login" class="btn btn-dark px-5 mb-5 w-100">Login</button></div>
          <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
            Admin? <a href="/ecommerce/login/login.php" class="text-dark fw-bold"> Login as User</a>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<?php include $root . "common/footer.php" ?>