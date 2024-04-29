<?php
include('./admin/common_funt.php');
include('./connect.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search product</title>
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

        /* products cards starts */

        .card img {
            width: 90%;
            height: 20vh;
            padding-left: 10px;
            padding-top: 10px;
        }


        .rowcont {
            display: flex;
            justify-content: space-evenly;
            margin-top: 50px;
            flex-wrap: wrap;
            margin-right: 20px;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }


        .card {
            box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
            margin-top: 50px;
        }

        .prod {
            margin-left: 40px;
            /* margin-top: 50px; */
            margin-right: 20px;
        }

        .rupee
        {
           margin-left: 60px;

        }

        /* products cards ends */
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

                <li><a href="cart.php">Cart <i class="fa-solid fa-cart-arrow-down"> </i><b><sup class="sup"><?php echo cart_item() ?></sup> </b></a></li>
                <li><a href="old.php">My Orders</a></li>
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

    <!-- cards start -->

    <!-- products cards  starts-->
    <section id="section1">
        <div class="row">
            <div class='col-md-12  rowcont'>
                <div class='row'>
                    <?php

                    search_product();

                    ?>
                </div>
            </div>


        </div>

        <?php
        to_cart();
        ?>
</body>

</html>