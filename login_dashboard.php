<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #f0f0f0;
    }

    .card {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 10px;
      text-align: center;
      width: 300px;
    }

    .card h2 {
      margin-top: 0;
      color: #333;
    }

    .card p {
      color: #666;
    }

    .card a {
      display: inline-block;
      text-decoration: none;
      color: #fff;
      background-color: #007bff;
      padding: 10px 20px;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    .card a:hover {
      background-color: #0056b3;
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

    .nav{
      display: flex;
      justify-content:space-around;

    }

    .nav a{
      color: black;
      font-weight: bolder;
      font-size: x-large;
      margin-right: 700px;
    }
  </style>
</head>

<body>

  <header>
    <nav class="nav">
     
        <h2>Farm Cart</h2>
        <a href="home.php">Home</a>
    </nav>
  </header>
  <div class="card">
    <h2>User Dashboard</h2>
    <p>Welcome to the User Dashboard. Please click below to login:</p>
    <a href="login.php">User Login</a>
  </div>

  <div class="card">
    <h2>Admin Dashboard</h2>
    <p>Welcome to the Admin Dashboard. Please login to access admin features.</p>
    <a href="./admin/admin_login.php">Admin Login</a>
  </div>
</body>

</html>