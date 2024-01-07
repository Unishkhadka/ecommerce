<div class='album py-5 bg-body-tertiary'>
    <div class='container'>
        <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>
            <?php
            $sql = "SELECT * from products";
            $products = $con->query($sql);
            if ($products->num_rows > 0) {
                while ($row = $products->fetch_assoc()) {
                    $product_id = $row['product_id'];
                    $name = $row['product_name'];
                    $category = $row['category'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image = $row['image_url'];
                    $brand = $row['brand'];
                    echo "
                <div class='col'>
                    <div class='card shadow-sm'>
                    <img src='$image' class='img-fluid' alt='$name'>
                        <div class='card-body'>
                            <a class='text-black text-decoration-none text-decoration-underline-hover' href='/ecommerce/product_details.php?id=$product_id'><h4 class='card-text'>$name</h4>
                            </a>
                            <div class='d-flex justify-content-between align-items-center'>
                                <div class='btn-group'>
                                    <button type='button' class='cart btn btn-sm btn-outline-primary'>Add to cart</button>
                                </div>
                                <small class='text-body-secondary'>9 mins</small>
                            </div>
                        </div>
                    </div>
               </div>
    ";
                }
            } else {
                echo "
        <div class='container'>
            <h1 class='text-3xl font-bold'>No products available <i class='fa-solid fa-circle-exclamation'></i></h1>
        </div>
        ";
            }
            ?>
        </div>
    </div>
</div>