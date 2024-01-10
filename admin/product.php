<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
include $root . "admin/admin_authenticate.php";
include $root . "common/header.php"; ?>

<div class="d-flex">
    <?php
    include "sidebar.php";
    ?>
    <div class='w-100'>
        <div class='bg-dark d-flex justify-content-between'>
            <h1 class='p-2 text-white'>Products</h1>
            <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add +
</button>

        </div>
        <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="publish_product.php" method="post" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label text-white">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Type product name" required>
                </div>
                <div class="col-md-6">
                    <label for="brand" class="form-label text-white">Brand (optional)</label>
                    <input type="text" name="brand" id="brand" class="form-control" placeholder="Product brand">
                </div>
                <div class="col-md-6">
                    <label for="price" class="form-label text-white">Price</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="$2999" required>
                </div>
                <div class="col-md-6">
                    <label for="category" class="form-label text-white">Category</label>
                    <select id="category" name="category" class="form-select">
                        <?php
                        $sql = "SELECT * from categories";
                        $categories = $con->query($sql);

                        while($row=$categories->fetch_assoc()){
                            $category= $row['category'];
                        echo "<option>$category</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label text-white" for="image">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image" enctype="multipart/form-data">
                </div>
                <div class="col-12">
                    <label for="description" class="form-label text-white">Description</label>
                    <textarea id="description" rows="4" name="description" class="form-control" placeholder="Your description here"></textarea>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="product" class="btn btn-primary">Add Product</button>
          </form>
      </div>
    </div>
  </div>
</div>
        <?php
        include $root . "admin/show_products_admin.php";
        ?>
    </div>
</div>