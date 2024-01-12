<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
include $root . "common/header.php";
include $root . "common/nav.php";
$id = $_GET['id'];
?>
<section class="min-vh-100 pt-5" style="background: #f2f2f2" ;>
  <?php
  if (isset($_POST['cart'])) {
    // Check if the user is logged in
    if (isset($_SESSION['Uid']) && $_SESSION['Uid']) {
      $Uid = $_SESSION['Uid'];
      $quantity = $_POST['quantity'];
      $sql = "SELECT * from cart where product_id = $id";
      $check = $con->query($sql);
      $row = $check->fetch_assoc();
      $prev_quantity = $row["quantity"];
      if ($check and mysqli_num_rows($check) > 0) {
        $sql = "UPDATE  cart SET quantity = $quantity+$prev_quantity where product_id=$id AND user_id = $Uid";
        $update = $con->query($sql);
        if ($update) {
          echo '<div class="container mb-2 alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Product added to cart successfully!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
      } else {
        $sql = "INSERT INTO cart (product_id, quantity, user_id) VALUES ($id, $quantity, $Uid)";
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
        }
      }
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
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="/ecommerce/<?php echo $image ?>" />
          </a>
        </div>
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
            <?php echo $name ?>
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
            <span class="text-muted">per/</span>
            <span class="h5">$75.00</span>
          </div>

          <p>
            <?php echo $description ?>
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
            <form action="" method="post">
              <div class="col-md-4 col-6 mb-3">
                <label class="mb-2 d-block">Quantity</label>
                <input type="number" name="quantity" min="1" class="form-control text-center border border-secondary" value="1" aria-label="Example text with button addon" aria-describedby="button-addon1" />
              </div>
          </div>
          <button type="submit" name="cart" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </button>
        </div>
        </form>
    </div>
    </main>
  </div>
  </div>
  <div class='container mt-4'>
    <form action='/ecommerce/post_comment.php' method='post'>
      <div class='mb-3'>
        <label for='exampleFormControlTextarea1' class='form-label'>
          <h5>Comment:</h5>
        </label>
        <textarea class='form-control' name='comment' id='exampleFormControlTextarea1' rows='2'></textarea>
      </div>
      <div class='text-end'>
        <input type='hidden' name='product_id' value='<?php echo $id; ?>'>
        <button type='submit' name="submit" class='btn btn-primary'>Comment</button>
      </div>
    </form>
  </div>

  <div class="container mb-4">
    <hr>
    <h4 class="pb-2">Comments</h4>
    <?php
    $sql = "SELECT * FROM reviews WHERE product_id = $id";
    $comments = $con->query($sql);

    if (mysqli_num_rows($comments) > 0) {
      while ($row = $comments->fetch_assoc()) {
        $review_id = $row['review_id'];
        $comment = $row['comment'];
        $user_id = $row['user_id'];
        $user_result = $con->query("SELECT * FROM users WHERE user_id = $user_id");
        $user = $user_result->fetch_assoc();

        echo "
            <div class='row'>
                <div class='col-md-12 col-lg-10 col-xl-8'>
                    <div class='card mb-3'>
                        <div class='card-body'>
                            <div class='d-flex flex-start'>
                                <div class='img-circle-comment'>
                                    <img src='' alt=''>
                                </div>
                                <div class='w-100'>
                                    <div class='d-flex justify-content-between align-items-center mb-3'>
                                        <h6 class='fw-bold mb-0'>
                                            " . $user['fullname'] . ":
                                            <span class='text-primary ms-2'>" . $comment . "</span>
                                        </h6>
                                    </div>
                                    <div class='d-flex align-items-center'>                ";

        $Uid = $_SESSION['Uid'];
        if ($Uid == $user_id) {
          echo "
                    <a href='/Blog_php/delete_comment.php?id=$review_id&&blog_id=$id' class='link-grey'>Delete<i class='fa-solid fa-trash'></i></a> •
                    <!-- Button trigger modal -->
                    <a type='button' class='link-grey' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                        Edit <i class='fa-solid fa-pen-to-square'></i>
                    </a>

                    <!-- Modal -->
                    <div class='modal fade' id='staticBackdrop' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='staticBackdropLabel'>Comments</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <form action='/Blog_php/update_comment.php' method='post'>
                                        <div class='mb-3'>
                                            <textarea class='form-control' name='comment' id='exampleFormControlTextarea1' rows='2'>$comment</textarea>
                                        </div>
                                        <div class='modal-footer'>
                                            <div class='text-end'>
                                                <input type='hidden' name='blog_id' value=$id>
                                                <input type='hidden' name='comment_id' value=$review_id>
                                                <button type='submit' class='btn btn-primary'>Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
        } else {
          echo "
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
";
        }
      }
    } else {
      echo "<h1>No comments!</h1>
      <hr>  ";
    }
    ?>
  </div>
  </div>
</section>
<!-- content -->
<?php
include $root . "common/footer.php";
?>