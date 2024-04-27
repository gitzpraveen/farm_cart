<?php
include('./admin/common_funt.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FarmCart</title>
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
      position: relative;
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

    .mess h2 {

      margin-left: 450px;
      margin-bottom: 50px;
    }

    .rounded-pill {
      margin-top: 250px;
      margin-left: 650px;

    }

    .amt {
      margin-top: 250px;
      margin-left: 550px;
      color: red;
    }

    .btn-warning
    {
      margin-left: 700px;
      margin-bottom: 50px;
    }
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
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="index.php#section2">Shop by crop</a></li>
      </ul>
    </nav>
  </header>


  <!-- header ends -->

  <!--  success message-->

  <div class="mess">
    <h1 class="amt"> Amount Paid : <i class='fa-solid fa-indian-rupee -sign'></i> <?php total_cart_price() ?> /-</h1>
    <h2>payment successful, Order will reach soon...</h2>
    <p>
    <h2>Address : <?php echo get_address_ById() ?></h2>
    </p>

    <form action="" method="post">
    <div class="pay">

      <input type="submit" class=" px-3 py-2  btn-warning  rounded " value="Pay" name="pay" />

      <?php

      if (isset($_POST["pay"])) {

        $id = $_SESSION['users_id'];
        $total_price = 0;
        $cart_query = "Select * from `orders` WHERE user_id=$id ";
        $cartResult = mysqli_query($conn, $cart_query);
        while ($row = mysqli_fetch_array($cartResult)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $insert_query = "insert into `order_complete` (product_title,product_id ,user_id,date) values ('$product_title',$product_id,$id,NOW())";
          $res_query = mysqli_query($conn, $insert_query);

          $delete_query = "DELETE FROM `orders` WHERE user_id = $id and product_id=$product_id";
          $result_delete = mysqli_query($conn, $delete_query);

          echo "<script>alert('order placed successfully')</script>";
          echo "<script>window.open('home.php', '_self');</script>";
        }
       
      }
      ?>

    </div>
    </form>

    <a href="products.php" class="bg-info px-3 py-2 rounded-pill border-0">Continue Shopping</a>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>