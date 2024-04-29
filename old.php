<?php
include('./connect.php');
include('./admin/common_funt.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- font awesome starts-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container {
            width: 40%;
            height: 610px;
            /* border: 1px solid red; */
            padding: 30px;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
            background-color: white;
            border-radius: 20px;
            /* margin-top: -10px; */

        }

        .form-outline {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* header starts */

        /* Google Fonts - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f0faff;
        }

        .nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 15px 200px;
            background: #4a98f7;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .nav,
        .nav .nav-links {
            display: flex;
            align-items: center;
        }

        .nav {
            justify-content: space-between;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        .nav .logo {
            font-size: 22px;
            font-weight: 500;

        }

        .logo h2 {
            margin-left: -100px;
        }

        .nav .nav-links {
            column-gap: 20px;
            list-style: none;
        }

        .nav .nav-links a {
            transition: all 0.2s linear;
            font-weight: bolder;
        }

        .nav .nav-links a:hover {
            color: greenyellow;
        }

        .nav-links li a b sup {
            border: 1px solid red;
            border-radius: 50%;
            background-color: red;

        }

        .nav-links li a b :hover {
            color: white;
        }

        .nav.openSearch .nav-links a {
            opacity: 0;
            pointer-events: none;
        }

        .nav .search-icon {
            color: #fff;
            font-size: 20px;
            cursor: pointer;
        }

        .nav .search-box {
            position: absolute;
            right: 250px;
            height: 45px;
            max-width: 555px;
            width: 100%;
            opacity: 0;
            pointer-events: none;
            transition: all 0.2s linear;
        }

        .nav.openSearch .search-box {
            opacity: 1;
            pointer-events: auto;
        }

        .search-box .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            left: 15px;
            color: #4a98f7;
            transform: translateY(-50%);
        }

        .search-box input {
            height: 100%;
            width: 100%;
            border: none;
            outline: none;
            border-radius: 6px;
            background-color: #d9f3f0;
            padding: 0 15px 0 45px;
            border: 1px solid rgb(129, 165, 242);
        }

        .nav .navOpenBtn,
        .nav .navCloseBtn {
            display: none;
        }

        /* responsive */
        @media screen and (max-width: 1160px) {
            .nav {
                padding: 15px 100px;
            }

            .nav .search-box {
                right: 150px;
            }
        }

        @media screen and (max-width: 950px) {
            .nav {
                padding: 15px 50px;
            }

            .nav .search-box {
                right: 100px;
                max-width: 400px;
            }
        }

        @media screen and (max-width: 768px) {

            .nav .navOpenBtn,
            .nav .navCloseBtn {
                display: block;
            }

            .nav {
                padding: 15px 20px;

            }

            .nav .nav-links {
                position: fixed;
                top: 0;
                left: -100%;
                height: 100%;
                max-width: 280px;
                width: 100%;
                padding-top: 100px;
                row-gap: 30px;
                flex-direction: column;
                background-color: #4a98f7;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                transition: all 0.4s ease;
                z-index: 100;
            }

            .logo h2 {
                margin-left: -10px;
            }

            .nav.openNav .nav-links {
                left: 0;
            }

            .nav .navOpenBtn {
                color: #fff;
                font-size: 20px;
                cursor: pointer;
            }

            .nav .navCloseBtn {
                position: absolute;
                top: 20px;
                right: 20px;
                color: #fff;
                font-size: 20px;
                cursor: pointer;
            }

            .nav .search-box {
                top: calc(100% + 10px);
                max-width: calc(100% - 20px);
                right: 50%;
                transform: translateX(50%);
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }


        }

        .cart_img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
        .head
        {
            margin-top: 50px;
        }
        

        /* header ends */

    </style>

</head>

<body>
   <!-- header starts -->
   <header>
        <nav class="nav">
            <i class="uil uil-bars navOpenBtn"></i>
            <a href="#" class="logo">
                <h2>Farm Cart</h2>
            </a>

            <ul class="nav-links">
                <i class="uil uil-times navCloseBtn"></i>
                <li><a href="home.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="home.php#section2">Shop by crop</a></li>
                <li><a href="cart.php">Cart <i class="fa-solid fa-cart-arrow-down"></i><b><sup class="sup"><?php echo cart_item() ?></sup></b> </a></li>
                <!-- <li><a href="register.php">Register</a></li> -->
                <li><a href="logout.php">Logout</a></li>
                <li><a href="#"><?php echo getUsernameById(); ?></a></li>
            </ul>

            <!-- <i class="uil uil-search search-icon" id="searchIcon"></i>
            <div class="search-box">
                <i class="uil uil-search search-icon"></i>
                <input type="search" placeholder="Search here..." />
                <button type="submit" name="searchdata" class="btn">Search</button>
            </div> -->
        </nav>
    </header>


    <!-- header ends -->

    <form action="" method="post">
        <table class="table table-bordered mt-5 text-center my_tab">
            <h2 class="text-center head ">Order History</h2>

            <thead>
                <tr>
                  
                    <th scope="col">Product</th>
                    <th scope="col">Image</th>
                    <th scope="col"><i class='fa-solid fa-indian-rupee -sign'></i> price</th>
                    <th scope="col">Ordered date</th>
                    

            </thead>
            <tbody>
                <!-- php code of cart db -->

                <?php
                // fetching query
                global $conn;
                $id=$_SESSION['users_id'];
                $select_query = "select * from `order_complete` where user_id=$id ";
                $result_query = mysqli_query($conn, $select_query);

                while ($row = mysqli_fetch_assoc($result_query)) {
                
                    $product_title = $row['product_title'];
                    $date = $row['date'];
                    $p_id = $row['product_id'];

                    $select_prod = "SELECT * FROM `products` WHERE product_id =$p_id ";

    
                    $result = mysqli_query($conn, $select_prod);
                
                    
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row_data = mysqli_fetch_assoc($result);
                       $price= $row_data['product_price']; 
                       $image= $row_data['product_image']; 

                    } 

            
                   

                ?>


                    <tr>
                       
                        <td><?php echo $product_title ?> </td>
                        <td><img src="./admin/product_images/<?php echo $image ?>" alt=" $image" class="cart_img"></td>
                        <td><i class='fa-solid fa-indian-rupee -sign'></i> <?php echo $price ?> </td>
                        <td> <?php echo $date ?> </td>

                       
                    </tr>

                <?php
                }

                ?>

              
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>