<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
include $root . "common/header.php";
include $root . "common/nav.php";
?>
<?php
if (isset($_POST['cart'])) {
    // Check if the user is logged in
    if (isset($_SESSION['Uid']) && $_SESSION['Uid']) {
        $id = $_POST['id'];
        $Uid = $_SESSION['Uid'];
        $sql = "SELECT * from cart where product_id = $id";
        $check = $con->query($sql);
        $row = $check->fetch_assoc();
        if($check and mysqli_num_rows($check)>0){
            $quantity = $row['quantity']+1;
            $sql = "UPDATE  cart SET quantity = $quantity where product_id=$id AND user_id = $Uid";
            $update = $con->query($sql);
            if($update){
                echo '<div class="container my-2 alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Product added to cart successfully!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
        }
        else{
        $sql = "INSERT INTO cart (product_id, quantity, user_id) VALUES ($id, 1, $Uid)";
        $result = $con->query($sql);

        if ($result) {
            echo '<div class="container my-2 alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Product added to cart successfully!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } else {
            echo '<div class="container my-3 alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error adding product to cart!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }}
    } else {
        echo '
        <div class="container absolute my-3 alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Please login first!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * from products where product_id = $id";
$product = $con->query($sql);
$row = $product->fetch_assoc();
$name = $row['product_name'];
$price = $row['price'];
$description = $row['description'];
$category = $row['category'];
$image = $row['image_url'];
?>
<!-- content -->
<section class="min-vh-100 pt-5" style="background: #f2f2f2";>
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="/ecommerce/<?php echo $image?>" />
          </a>
        </div>
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
          <?php echo $name?>
          </h4>
          <!-- <div class="d-flex flex-row my-3"> -->
            <!-- <!-- <div class="text-warning mb-1 me-2"> -->
              <!-- <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <span class="ms-1">
                4.5
              </span>
            </div> -->
            <!-- <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
            <span class="text-success ms-2">In stock</span> -->
          <!-- </div> -->

          <div class="mb-3">
            <span class="h5">$75.00</span>
            <span class="text-muted">/per box</span>
          </div>

          <p>
          <?php echo $description?>
          </p>

          <!-- <div class="row">
            <dt class="col-3">Type:</dt>
            <dd class="col-9">Regular</dd>

            <dt class="col-3">Color</dt>
            <dd class="col-9">Brown</dd>

            <dt class="col-3">Material</dt>
            <dd class="col-9">Cotton, Jeans</dd>

            <dt class="col-3">Brand</dt>
            <dd class="col-9">Reebook</dd>
          </div> -->

          <hr />

          <div class="row mb-4">
            <!-- col.// -->
            <form>
            <div class="col-md-4 col-6 mb-3">
              <label class="mb-2 d-block">Quantity</label>
                <input type="number" min="1" class="form-control text-center border border-secondary" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1" />
              </div>
            </div>
            <button type="submit" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </button>
          </div>
</form>
        </div>
      </main>
    </div>
  </div>
</section>
<!-- content -->
<?php
include $root . "common/footer.php";
?>


