<?php

include('./connect.php');
include('./admin/common_funt.php');

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
  header("Location:login_dashboard.php");
  exit();
}

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





    /* corousel starts */

    .welcome {
      text-align: center;
      margin-top: -10px;
    }

    /* .carodiv {
      margin-top: 0px;
    } */

    #coro {
      margin: 10px;

    }

    .img1 {
      height: 600px;

    }


    .pre {
      font-size: xx-large;
      font-weight: bolder;
    }

    .hfarm {
      text-align: center;
      margin-top: 20px;
      font-weight: bolder;
      font-size: 80px;
    }


    .hfarm1 {
      text-align: center;
      margin-bottom: 250px;
      font-weight: bolder;
      font-size: 80px;
    }

    .speedcult {
      text-align: center;
      margin-top: -540px;
      font-weight: bolder;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }



    .btnline>button {
      margin-top: -30px;
      color: white;
      height: 10px;
    }


    /* corousel ends */

    /* main starts */

    .wheatimg {
      width: 450px;
      height: 500px;
      border-radius: 30px;
      position: relative;
    }

    .harvestquotes {
      color: rgb(58, 64, 64);
      position: absolute;
      margin-bottom: 90px;
      margin-left: 27px;
    }

    .wheatimg2 {
      width: 450px;
      height: 230px;
      border-radius: 30px;
    }

    .mainContainer {
      margin-top: 50px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;


    }

    .slide1 {
      margin-right: 25px;
    }

    .w1 {
      margin-bottom: 25px;
    }

    .w2 {
      margin-top: 25px;
    }

    /* main ends */

    /*  seed cards start */

    .containerscard1 {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      width: 100%;
    }

    .seedcon {
      width: 100%;
      height: 300px;

    }

    .seed a {
      margin-top: 40px;
    }


    .con {


      width: 200px;
      height: 200px;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      background-color: #fff;
      border-radius: 10px;
      margin-top: 30px;

    }

    .con:hover {
      transform: scale(1.04);
      transition: transform 0.1s ease-in-out;
    }

    .card img {
      width: 90%;
      height: 20vh;
      padding-left: 10px;
      padding-top: 10px;
    }

    .con a {
      text-decoration: none;

    }

    .con a h2 {
      text-align: center;
      margin-top: 8px;
      color: black;
      font-weight: lighter;
      font-family: 'Times New Roman', Times, serif;

    }

    .rupee {
      margin-left: 50px;
    }

    .card-img-top {
      width: 100%;
      height: 200px;
      object-fit: contain;
    }

    .cd {
      margin-left: 50px;
      margin-bottom: 50px;
    }

    /* cards ends */

    /* seedcard starts */

    .seedcontainers {
      margin-top: 80px;
      /* border: 1px solid red; */
      padding: 50px;
      margin-left: 40px;
      margin-right: 40px;
      background-color: whitesmoke;
      border-radius: 40px;
      width: 95%;
      height: 400px;
    }

    .shopby {
      margin-left: 20px;
    }

    @media (max-width: 820px) {


      .seedcontainers {
        height: 700px;
      }


    }

    @media (max-width: 940px) {

      .seedcon {
        height: 900px;
      }
    }

    @media (max-width: 944.8px) {

      .seedcon {
        height: 780px;
      }
    }

    @media (max-width:760px) {





      .cd {
        margin-top: 40px;
      }
    }

    @media (max-width: 525px) {


      .seedcontainers {
        height: 1680px;
        overflow-x: hidden;
      }

      .cd {
        margin-left: 40px;
      }


      .containerscard1 {
        height: 400px;
        display: flex;
        flex-wrap: wrap;

      }
    }




    /* seedcard starts */

    /* products cards starts */


    .rowcont {
      display: flex;
      justify-content: space-evenly;
      margin-top: 50px;
      flex-wrap: wrap;
    }


    .card {
      box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
    }

    /* products cards ends */


    /* footer starts */

    footer {
      background-color: rgb(78, 223, 234);
      ;
      padding: 40px 0;
      margin-top: 50px;

    }

    .container {
      max-width: 960px;
      margin: 0 auto;
    }

    .footer-content {
      display: flex;
      justify-content: space-between;
    }

    .footer-section {
      flex: 1;
      margin-right: 30px;
    }

    .footer-section h3 {
      color: black;
      font-size: 18px;
      margin-bottom: 15px;
    }

    .footer-section p {
      color: black;
      font-size: 14px;
    }

    .footer-section ul {
      list-style: none;
      padding: 0;
    }

    .footer-section ul li {
      margin-bottom: 5px;
    }

    .footer-section ul li a {
      color: black;
      text-decoration: none;
    }

    .footer-section ul li a:hover {
      text-decoration: underline;
    }

    .copyright {
      margin-top: 20px;
      text-align: center;
    }

    .copyright p {
      margin: 0;
      font-size: 14px;
      color: #666;
    }

    .container-fluid {
      max-width: 100%;
      overflow-x: hidden;

    }


    /* footer ends */

    .seedcon {
      width: 100%;
      height: 300px;
      margin: 0 auto;
      margin-top: 100px;
      display: flex;
      flex-wrap: wrap;
      /* border: 1px solid black; */
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
        <li><a href="home.php">Home</a></li>
        <li><a href="#section2">Shop by crop</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
       

      </ul>

      <i class="uil uil-search search-icon" id="searchIcon"></i>
      <div class="search-box">
        <i class="uil uil-search search-icon"></i>

        <input type="search" placeholder="Search here..." />
        <button type="submit" name="searchdata" class="btn">Search</button>
      </div>
    </nav>
  </header>

  <?php

  //calling cart function

  cart();

  ?>

  <!-- header ends -->

  <!-- cards starts -->
  <div class="containerscard1 seedcon">

    <div class="con con1 seed">
      <a href="">
        <div class="card">
          <img src="./seed.jpeg" alt="seed">
          <h2>seeds</h2>
        </div>
      </a>
    </div>

    <div class="con seed">
      <a href="">
        <div class="card">
          <img src="./tool.jpg" alt="tool">
          <h2>Tools</h2>
        </div>
      </a>
    </div>

    <div class="con seed">
      <a href="">
        <div class="card">
          <img src="./tracktor.webp" alt="tracktor">
          <h2>Rent4farm</h2>
        </div>
      </a>
    </div>

    <div class="con seed">
      <a href="">
        <div class="card">
          <img src="./fertlizer.jpeg" alt="fertlizer">
          <h2>Fertilizers</h2>
        </div>
      </a>
    </div>
    <div class="con seed">
      <a href="">
        <div class="card">
          <img src="./tissue.jpeg" alt="">
          <h2>Plants</h2>
        </div>
      </a>
    </div>

    <div class="con seed">
      <a href="">
        <div class="card">
          <img src="./feed.jpeg" alt="">
          <h2>Animal Feed</h2>
        </div>
      </a>
    </div>

  </div>

  <!--  cards ends -->

  <!-- carousel starts -->

  <div class="carodiv">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">

      <div class="sildecon">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./corn.png" class="d-block img1 w-100 img1" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h1 class="hfarm">FarmCart</h1>
              <h3 class="welcome"> Welcomes you</h3>

            </div>
          </div>
          <div class="carousel-item">
            <img src="./agri.jpg" class="d-block img1 w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h1 class="hfarm1">FarmCart</h1>

            </div>
          </div>
          <div class="carousel-item">
            <img src="./turnip.jpg" class="d-block img1 w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">

              <h3 class="speedcult">Speed Cultivation 1 hour@Rs 600</h3>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


  <!-- carousel ends -->



  <!-- products cards  starts-->
  <section id="section1">
    <div class="row">
      <div class='col-md-12 rowcont'>
        <div class='row'>
          <?php

          getproducts();

          ?>
        </div>
      </div>


    </div>



  </section>
  <!-- products cards ends -->
  <!-- main starts -->

  <div class="mainContainer">
    <div class="slide1">

      <div class="wheat">
        <img src="./wheat.jpg" class="wheatimg" alt="" srcset="">

      </div>
    </div>


    <div class="slide2">

      <div class="wheat w1">
        <img src="./fert.jpeg" class="wheatimg2" alt="" srcset="">
      </div>

      <div class="wheat w2">
        <img src="./agrihand.jpeg" class="wheatimg2" alt="" srcset="">
      </div>
    </div>

  </div>
  <!-- main ends -->



  <!-- seeds card starts -->
  <section id="section2">
    <div class="seedcontainers ">

      <h3 class="shopby">
        Shop by Crop
      </h3>

      <!-- cards starts -->
      <div class="containerscard1 cdd">

        <div class="con con1">
          <a href="">
            <div class="card">
              <img src="./chilli.png" alt="chilli">
              <h2>Chilli</h2>
            </div>
          </a>
        </div>

        <div class="con">
          <a href="">
            <div class="card">
              <img src="./onion.jpeg" alt="onion">
              <h2>Onion</h2>
            </div>
          </a>
        </div>

        <div class="con">
          <a href="">
            <div class="card">
              <img src="./cotton.jpeg" alt="cotton">
              <h2>Cotton</h2>
            </div>
          </a>
        </div>

        <div class="con">
          <a href="">
            <div class="card">
              <img src="./groundnut.jpeg" alt="groundnut">
              <h2>Groundnut</h2>
            </div>
          </a>
        </div>
        <div class="con">
          <a href="">
            <div class="card">
              <img src="./maize.jpeg" alt="maize">
              <h2>Maize</h2>
            </div>
          </a>
        </div>

      </div>


    </div>
  </section>

  <!-- seeds card ends -->

  <!-- footer starts  -->

  <footer>
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <h3>About Us</h3>
          <p>
            Dedicated to sustainable farming, we strive to provide quality produce while preserving the environment for future generations.</p>
        </div>
        <div class="footer-section">
          <h3>Contact Us</h3>
          <p>Get in touch with our team for inquiries, support, and partnership opportunities.</p>
        </div>
        <div class="footer-section">
          <h3>Follow Us</h3>
          <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
          </ul>
        </div>
      </div>
      <div class="copyright">
        <p>&copy; 2024 Farm Cart. All rights reserved. | Designed by Farm cart</p>
      </div>
    </div>
  </footer>


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