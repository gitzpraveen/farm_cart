<?php

session_start();
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = 'farmcart';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";


//getting products

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

//cart function

function cart()
{
 
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $id = $_SESSION['users_id'];
        $get_product_id = $_GET['add_to_cart'];
        $get_product_title = $_GET['product_title'];
        $select_query = "Select * from `orders` WHERE user_id=$id && product_id='$get_product_id'";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
       

        if ($num_of_rows > 0) {
            echo "<script>alert('Item  already added!')</script>";
            echo "<script>window.open('products.php','_self')</script>";
        } else {
                 $insert_query = "INSERT INTO `orders` (product_title, product_id, user_id) VALUES ('$get_product_title',$get_product_id,$id)";
              $result_query = mysqli_query($conn, $insert_query);//this is the 72 line get error 
                echo "<script>alert('Item added to your Cart!')</script>";
                echo "<script>window.open('products.php','_self')</script>";
          
        }
    }
}

//functon to grt cart item numbers
function cart_item()
{
    $id = $_SESSION['users_id'];
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $select_query = "Select * from `orders` WHERE user_id=$id";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $conn;
        // $ip = getIPAddress();
        $select_query = "Select * from `orders` WHERE user_id=$id";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    return   $count_cart_items;
}


// total price function

function total_cart_price()
{
    $id = $_SESSION['users_id'];
    global $conn;
    // $ip = getIPAddress();
    $total_price = 0;
    $cart_query = "Select * from `orders` WHERE user_id=$id ";
    $cartResult = mysqli_query($conn, $cart_query);
    while ($row = mysqli_fetch_array($cartResult)) {
        $product_id = $row['product_id'];
        $select_product = "select * from `products` where  product_id='$product_id'";
        $result = mysqli_query($conn, $select_product);
        while ($row_product_price = mysqli_fetch_array($result)) {

            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }

    echo $total_price;
}

//fetching user name

function getUsernameById()
{

    global $conn;
    $id = $_SESSION['users_id'];

    $select_query = "SELECT user_name FROM `user_table` WHERE user_id =$id ";


    $result = mysqli_query($conn, $select_query);


    if ($result && mysqli_num_rows($result) > 0) {
        $row_data = mysqli_fetch_assoc($result);
        return $row_data['user_name']; // Return the username
    } else {
        return null; // User not found or error occurred
    }
}


function get_address_ById()
{

    global $conn;
    $id = $_SESSION['users_id'];

    $select_query = "SELECT user_address  FROM `user_table` WHERE user_id =$id ";


    $result = mysqli_query($conn, $select_query);


    if ($result && mysqli_num_rows($result) > 0) {
        $row_data = mysqli_fetch_assoc($result);
        return $row_data['user_address']; // Return the username
    } else {
        return null; // User not found or error occurred
    }
}
