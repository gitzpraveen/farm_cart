<?php
include('./connect.php');
include('./admin/common_funt.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- font awesome starts-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- font awesome ends -->

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* scroll-behavior: smooth; */
        }

        body {
            background: white;
            overflow-x: hidden;
            /* user-select: none */
        }

        /* header starts */

        /* Google Fonts - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");


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

        .nav .nav-links a:hover {
            color: greenyellow;
        }

        .nav .nav-links a {
            transition: all 0.2s linear;
            font-weight: bolder;
        }

        .nav-links li a b sup {
            border: 1px solid red;
            border-radius: 50%;
            background-color: red;

        }

        .form-control:focus {
            outline: none;
            box-shadow: none;
            margin-left: 50px;
        }

        .nav-links li a b {
            width: 200px;
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
            display: flex;
            flex-wrap: wrap;
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

            .carousel-item img {
                width: 200px;
                object-fit: contain;
            }

            .wheat img {
                width: 350px;
                object-fit: contain;
            }
        }

        .nav .btn {
            /* position: fixed; */
            width: 140px;
            height: 35px;
            text-align: center;
            margin-left: 410px;
            margin-top: -40px;
            border: 1px solid black;
        }

        .nav .btn:hover {
            background-color: lightskyblue;
        }

        /* header ends */


        /* table starts */

        .head {
            margin-top: 100px;
        }

        .table {
            padding: 20px;
        }

        /* table ends */

        .cart_img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }



        .full {
            position: relative;
            height: 100vh;
            overflow-y: scroll;
        }

        .pay,
        .total {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;

        }

        .pay a button:hover {
            background-color: skyblue;
        }

        .pay a button {
            background-color: greenyellow;
        }
    </style>


</head>

<body>

    <div class="full">
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
                    <li><a href="#"><?php echo getUsernameById(); ?></a></li>


                </ul>
            </nav>
        </header>



        <!-- header ends -->

        <!-- table cart starts -->

        <form action="cart.php" method="post">
            <table class="table table-bordered mt-5 text-center">
                <h2 class="text-center head ">Your Cart</h2>

                <thead>
                    <tr>
                        <th scope="col">Select</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Product Image</th>
                        <th scope="col"> <i class='fa-solid fa-indian-rupee-sign'></i> Price </th>
                        <th scope="col">operations</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- php code of cart db -->

                    <?php

                    $id = $_SESSION['users_id'];
                    $total_price = 0;
                    $cart_query = "Select * from `orders` WHERE user_id=$id ";
                    $cartResult = mysqli_query($conn, $cart_query);
                    while ($row = mysqli_fetch_array($cartResult)) {
                        $product_id = $row['product_id'];
                        $select_product = "select * from `products` where  product_id='$product_id'";
                        $result = mysqli_query($conn, $select_product);
                        while ($row_product_price = mysqli_fetch_array($result)) {

                            $product_price = array($row_product_price['product_price']);
                            $product_id = $row_product_price['product_id'];
                            $price_table = $row_product_price['product_price'];
                            $price_title = $row_product_price['product_title'];
                            $price_image = $row_product_price['product_image'];
                            $product_values = array_sum($product_price);
                            $total_price += $product_values;

                    ?>
                            <tr>
                                <th scope="row"><input type="checkbox" name="remove_item[]" value="<?php echo $product_id ?>"></th>
                                <td><?php echo $price_title ?></td>
                                <td><img src="./admin/product_images/<?php echo $price_image ?>" alt=" $price_image" class="cart_img"></td>
                                <td> <i class='fa-solid fa-indian-rupee-sign'></i> <?php echo $price_table ?></td>
                                <td>

                                    <input type="submit" class="bg-danger px-5 py-2 rounded-pill border-0 text-white" value="Remove Item" name="removecart">

                                </td>
                            </tr>

                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
            <div class="total d-flex ">
                <h4 class="px-3"> Grand Total : <i class='fa-solid fa-indian-rupee-sign'></i> <strong class="text-info"><?php total_cart_price() ?></strong></h4>
                <a href="products.php" class="bg-info px-3 py-2 rounded-pill border-0">Continue Shopping</a>




            </div>

            <div class="pay">



                <input type="submit" class="bg-info px-3 py-2 rounded-pill border-0" value="Proceed to Pay" name="proceed">

                <?php

                $cart_item = cart_item();

                if (isset($_POST['proceed'])) {
                    if ($cart_item == 0) {
                        echo "<script>alert('Empty cart add items')</script>";
                      echo "<script>window . open('cart.php', '_self')</script>";
                    } else {
                        echo "<script>window . open('payment.php', '_self')</script>";
                    }
                }
                ?>

            </div>


        </form>
        <?php

        function remove_cart_item()
        {
            $id = $_SESSION['users_id'];
            global $conn;

          
            if (isset($_POST['removecart'])) {
                
                if (isset($_POST['remove_item']) && is_array($_POST['remove_item'])) {
                   
                    foreach ($_POST['remove_item'] as $remove_item) {
                        
                        $delete_query = "DELETE FROM `orders` WHERE product_id = $remove_item and user_id=  $id";
                        $run_query = mysqli_query($conn, $delete_query);
                        
                        if ($run_query) {
                            echo "<script>alert('Item removed successfully.');</script>";
                            echo "<script>window.open('cart.php','_self')</script>";
                        } else {
                            echo "<script>alert('Error removing item: " . mysqli_error($conn) . "');</script>";
                        }
                    }
                } else {
                    echo "<script>alert('No items selected for removal.');</script>";
                }
            }
        }

        // Call the function to remove items from the cart
        remove_cart_item();

        ?>




        <!-- table cart ends -->


    </div>


    <!-- footer ends -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        const nav = document.querySelector(".nav"),
            searchIcon = document.querySelector("#searchIcon"),
            navOpenBtn = document.querySelector(".navOpenBtn"),
            navCloseBtn = document.querySelector(".navCloseBtn");

        searchIcon.addEventListener("click", () => {
            nav.classList.toggle("openSearch");
            nav.classList.remove("openNav");
            if (nav.classList.contains("openSearch")) {
                return searchIcon.classList.replace("uil-search", "uil-times");
            }
            searchIcon.classList.replace("uil-times", "uil-search");
        });

        navOpenBtn.addEventListener("click", () => {
            nav.classList.add("openNav");
            nav.classList.remove("openSearch");
            searchIcon.classList.replace("uil-times", "uil-search");
        });
        navCloseBtn.addEventListener("click", () => {
            nav.classList.remove("openNav");
        });
    </script>
</body>

</html>