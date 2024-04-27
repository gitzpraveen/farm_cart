<?php

include('./connect.php');
include('./admin/common_funt.php');
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {



  if (isset($_POST['email']) && isset($_POST['password'])) {
    $get_user_email = $_POST['email'];

    $select_query = "select * from `user_table` where user_email= '$get_user_email'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
      $row_data = mysqli_fetch_assoc($result);
      $username = $row_data['user_email'];
      $password = $row_data['user_password'];
      $_SESSION['users_id'] = $row_data['user_id'];


      // Simulate database check (replace with actual database query)
      if ($_POST['email'] === $username && $_POST['password'] === $password) {

        $_SESSION['email'] = $_POST['email'];
        echo "<script>alert('login successfull')</script>";
        header("Location: home.php"); // Redirect to the secured page
        exit();
      } else {
        // Authentication failed
        echo "<script>alert('Invalid username or password.')</script>";
      }
    } else {
      echo "<script>alert('Data  not found in our db,Register first!')</script>";
    }
  } else {
    echo "<script>alert('enter username or password.')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- font awesome starts-->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- font awesome ends -->

  <style>
    /* header starts */

    .logo {
      width: 15%;
      height: 15%;
      border-radius: 50%;

    }

    .navlinks {
      margin-left: -350px;
    }

    .navlinks ul li {
      margin-left: 40px;
    }

    /* header ends */


    /* login form starts*/
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      overflow: hidden;
    }



    .login-container {
      max-width: 400px;
      margin: 100px auto;
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      height: 450px;
      margin-top: 15px;
    }

    .logo-container {
      text-align: center;
    }

    .logo-container img {
      width: 100px;
      height: auto;
    }

    .login-form {
      margin-top: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-left: 20px;
      margin-bottom: 5px;
    }

    input[type="email"],
    input[type="password"] {
      width: 80%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-left: 20px;
      outline: none;

    }

    button {
      width: 30%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;

    }

    .submitbtn {
      margin-left: 110px;
      background-color: lawngreen;
      color: black;
      outline: none;
      border-radius: 10px;
      padding: 10px;
      width: 80px;
    }

    button:hover {
      background-color: green;
    }


    /* login form ends*/
  </style>
</head>

<body>

  <!-- header starts -->

  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="./farmLogo.jpeg" alt="" class="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse navlinks" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>


        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- header ends -->
  <div class="title">
    <h2 class="mt-3 text-center">User Login</h2>
  </div>
  <!-- form starts -->
  <div class="login-container">
    <div class="logo-container">
      <img src="./farmLogo.jpeg" alt="Company Logo" class="logo">
    </div>
    <form class="login-form" action="" method="post">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required autocomplete="off">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required autocomplete="off">
      </div>
      <input type="submit" value="Login" class="submitbtn" name="user_login">

    </form>
  </div>

  <!-- form ends -->



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>