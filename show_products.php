<?php
    $sql = "SELECT * from products";
    $products = $con->query($sql);
    if($products->num_rows>0){
    while($row=$products->fetch_assoc()){
        $product_id = $row['product_id'];
        $name = $row['product_name'];
        $category = $row['category'];
        $price = $row['price'];
        $description = $row['description'];
        $image = $row['image_url'];
        $brand = $row['brand'];
        echo "
        <div class='w-full my-3 ml-3 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700'>
        <a href='/ecommerce/product_details.php?id=$product_id'>
            <img class='p-8 rounded-t-lg' src='/ecommerce/$image' alt='$name' />
        </a>
        <div class='px-5 pb-5'>
            <a href='/ecommerce/product_details.php?id=$product_id'>
                <h5 class='text-xl font-semibold tracking-tight text-gray-900 dark:text-white hover:underline'>$name</h5>
            </a>
            <div class='flex items-center mt-2.5 mb-5'>
                <div class='flex items-center space-x-1 rtl:space-x-reverse'>
                    <svg class='w-4 h-4 text-yellow-300' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 22 20'>
                        <path d='M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z'/>
                    </svg>
                    <p class='text-white'>0 Reviews</p>
                </div>
                            </div>
            <div class='flex items-center justify-between'>
                <span class='text-3xl font-bold text-gray-900 dark:text-white'>$$price </span>
                <a href='#' class='text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-blue-800'>Add to cart <i class='fa-solid fa-cart-shopping'></i></a>
            </div>
        </div>
        </div>";
    }}
    else{
        echo "
        <div class='h-lvh flex justify-center items-center pb-16'>
            <h1 class='text-3xl font-bold'>No products available <i class='fa-solid fa-circle-exclamation'></i></h1>
        </div>
        ";
    }
?>