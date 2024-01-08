<div class='album bg-body-tertiary'>
    <div class="container-fluid py-5" style="background-color:#e5e2df ">
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
                    <img src='/ecommerce/$image' class='img-thumbnail object-fit-cover' style='height:220px; width: 100%;' alt='$name'>
                        <div class='card-body'>
                            <a class='text-black text-decoration-none text-decoration-underline-hover' href='/ecommerce/product_details.php?id=$product_id'><p class='card-text my-2'>$name</p>
                            </a>
                            <div class='d-flex justify-between align-items-center'>
                            <h3 class='mb-0'>$$price</h3>
                                <div class='btn-group ms-auto'>
                                    <a href='?id=$product_id'><button type='button' class='cart btn btn-sm btn-outline-primary text-end'>Add to cart</button></a>
                                </div>
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
</div>