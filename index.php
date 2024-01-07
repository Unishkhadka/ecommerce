<?php 
$root = "C:/xampp/htdocs/ecommerce/";
include $root."common/connection.php";
// include $root."common/authenticate.php";
include $root."common/header.php";
include $root."common/nav.php";
?>
<section class="py-5 text-white text-center container-fluid" style="background-color:  #1A1D20;">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">SPENDIFY</h1>
            <p class="lead text-white">Dive into Spendify's curated collection — a fusion of style and quality handpicked by our creators. Each piece tells a unique story of innovation and sophistication, offering a shopping experience beyond the ordinary. Explore excellence, shop Spendify. 
            </p>
            <p>
                <a href="#" class="btn btn-warning my-2">Shop Now <i class="fa-solid fa-bag-shopping"></i></a>
                <a href="#" class="btn btn-secondary my-2">Special Offers %</a>
            </p>
        </div>
    </div>
</section>
<?php
  include $root."show_products.php";
?>
<?php include $root."common/footer.php" ?>
<script>
const cart = document.querySelector('.cart')
cart.addEventListener('click', () => {
    Swal.fire({
        icon: "success",
        title: "Added to cart",
        // text: "Something went wrong!",
    });
})
</script>