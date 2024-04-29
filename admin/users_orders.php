<?php
include('../connect.php');
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users order list</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmCart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- font awesome starts-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container {
            display: flex;
            justify-content: space-evenly;
            margin-top: 10px;



        }

        .container a {
            width: 150px;
            height: 40px;
            border-radius: 20px;
            text-align: center;
            text-decoration: none;
            padding: 10px;
            font-weight: bolder;
            color: white;
            background-color: blue;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .container a:hover {
            background-color: greenyellow;
            color: black;
        }
        .cart_img
        {
            width: 80px;
            height: 80px;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="admin.php">Home</a>
    </div>
    <h1 class="text-center">Users order</h1>
    <table class="table table-bordered mt-5 text-center">
            

                <thead>
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Product Image</th>
                        <th scope="col"> <i class='fa-solid fa-indian-rupee-sign'></i> Price </th>
                        <th scope="col">ordered date</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                $orders_query = "Select * from `order_complete` order by user_id ";
                $cart_Result = mysqli_query($conn, $orders_query);
                while ($row = mysqli_fetch_array($cart_Result)) {
                    $date = $row['date'];
                    $user_id = $row['user_id'];
                    $product_id = $row['product_id'];
                    $select_product = "select * from `products` where  product_id='$product_id'";
                    $result = mysqli_query($conn, $select_product);
                    while ($row_product_price = mysqli_fetch_array($result)) {
                       
                        $price_table = $row_product_price['product_price'];
                        $price_title = $row_product_price['product_title'];
                        $product_image = $row_product_price['product_image'];

                        $user_query = "Select * from `user_table` where user_id= $user_id";
                        $user_result=mysqli_query($conn, $user_query);
                        if ($row = mysqli_fetch_assoc($user_result)) {
                            $username= $row["user_name"];
                            $address= $row["user_address"];

                        }
                        ?>
                        <tr>
                                
                                <td><?php echo $username ?></td>
                                <td><?php echo $price_title ?></td>
                                <td><img src="./product_images/<?php echo $product_image ?>" alt=" $product_image" class="cart_img"></td>
                                <td> <i class='fa-solid fa-indian-rupee-sign'></i> <?php echo $price_table ?></td>
                                <td><?php echo $date ?></td>
                                <td><?php echo $address ?></td>

                            </tr>

                        <?php
                        }
                    }
                

                        ?>

                </tbody>
    </table>            


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>