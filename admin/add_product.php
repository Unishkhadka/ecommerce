<?php 
$root = "C:/xampp/htdocs/ecommerce/";
include $root."common/connection.php";
include $root."common/header.php";
?>

<div class="d-flex">
<?php include "sidebar.php"; ?>
<section class="vh-100" style="background-color: #1A1D20;">
    <div class="container col-8 py-5 px-4 mx-auto max-w-2xl lg:py-8">
        <h2 class="mb-4 text-xl font-bold text-white">Add new Product</h2>
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
                <div class="col-12 text-end">
                    <button type="submit" name="product" class="btn btn-primary">Add Product</button>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include $root."common/footer.php" ?>