  <div class='container' style="width: 100%;">
    <?php
    $sql = "SELECT * from products";
    $products = $con->query($sql);
    if ($products->num_rows > 0) {
      echo "         
    <table class='table table-bordered mt-4'>
                <thead class=''>
                  <tr>
                    <th scope='col'>Name</th>
                    <th scope='col'>Price</th>
                    <th scope='col'>Category</th>
                    <th scope='col'>Image</th>
                    <th scope='col'>Action</th>
                    
                  </tr>
                </thead>
                ";
      while ($row = $products->fetch_assoc()) {
        $product_id = $row['product_id'];
        $name = $row['product_name'];
        $category = $row['category'];
        $price = $row['price'];
        $description = $row['description'];
        $image = $row['image_url'];
        $brand = $row['brand'];
        echo "
                    <tbody>
                      <tr>
                        <td>$name</td>
                        <td>$price</td>
                        <td>$category</td>
                        <td><img src='/ecommerce/$image' class='img-thumbnail object-fit-cover' alt='$name' style='height: 45px; width: 65px'></td>
                        <td>
                        <a href='/ecommerce/admin/edit_product.php?id=$product_id'><button type='button' class='btn btn-sm btn-primary'>Update</button></a>
                        <a href='/ecommerce/admin/delete_product.php?id=$product_id'><button type='button' class='btn btn-sm btn-danger '>Delete</button></a>
                        </td>
                      </tr>
                      </tbody>  
    ";
      }
      echo "
                </table>";
    } else {
      echo "
        <div class='container'>
            <h1 class='text-3xl font-bold'>No products available <i class='fa-solid fa-circle-exclamation'></i></h1>
        </div>
        ";
    }
    ?>
  </div>