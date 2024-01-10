<?php
$root = "C:/xampp/htdocs/ecommerce/";
include $root . "common/connection.php";
include $root . "common/header.php";
include $root . "common/nav.php";
?>
<section class="py-5 text-white text-center container-fluid" style="background-color:  #1A1D20;">
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

    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto text-warning">
            <h1 class="fw-semi-bold text-underline">SPENDIFY</h1>
            <p class="lead text-white">Dive into Spendify's curated collection — a fusion of style and quality handpicked by our creators. Each piece tells a unique story of innovation and sophistication, offering a shopping experience beyond the ordinary. Explore excellence, shop Spendify.</p>
            <p>
                <a href="#items" class="btn btn-warning my-2">Shop Now <i class="fa-solid fa-bag-shopping"></i></a>
                <a href="#" class="btn btn-secondary my-2">Special Offers %</a>
            </p>
        </div>
    </div>
</section>

<?php
include $root . "show_products.php";
include $root . "common/footer.php";
?>