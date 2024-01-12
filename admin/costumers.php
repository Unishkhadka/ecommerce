<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "admin/admin_authenticate.php";
include $root . "common/header.php";
?>
<div class="d-flex">
  <?php
  include "sidebar.php";
  ?>
  <div class='w-100'>
    <div class='bg-dark'>
      <h1 class='p-2 text-white'>Costumers</h1>
    </div>
    <div class="container py-3 px-3">
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th class="text-center" scope="col">Action</th>
          </tr>
        </thead>
        <tbody class='table-group-divider'>
          <?php
          $sql = "SELECT * from users";
          $result = $con->query($sql);
          while ($row = $result->fetch_assoc()) {
            $name = $row['fullname'];
            $email = $row['email'];
            $phone = $row['phone'];

            echo "  
    <tr>
      <th scope='row'>$name</th>
      <td>$email</td>
      <td>$phone</td>
      <td>
      <div class='text-center'>
      <a class='btn btn-primary'>Edit <i class='fa-solid fa-gear'></i></a>
      <a class='btn btn-danger ms-3'>Ban <i class='fa-solid fa-ban'></i></a>
      </div>
      </td>
    </tr>
  ";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>