
<?php
include('./connect.php');
function  getproducts()
{
    // fetching query
    global $conn;
    $select_query = "select * from `products` order by rand()";
    $result_query = mysqli_query($conn, $select_query);

    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_title = $row['product_title'];
        $product_Description = $row['product_Description'];
        $product_price = $row['product_price'];
        $product_image = $row['product_image'];
        $product_id = $row['product_id'];


        echo "
                <div class='col-md-3 '>
                <div class='card cd  prod' style='width: 18rem;'>
                    <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title''> 
                    <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'> $product_Description</p>
                    <a href='index.php?add_to_cart=$product_id&product_title=$product_title' class='btn btn-primary'>Add to Cart</a>
                    <span  class='btn btn-success rupee'><i class='fa-solid fa-indian-rupee -sign'></i>$product_price</span>
                    </div>
                </div>
            
            </div> ";
    }
}

?>
