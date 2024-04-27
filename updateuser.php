<?php

include('./connect.php');

$select_query="select * from `user_table` where user_id='$users_id'";
$result=mysqli_query($conn,$select_query);
$row_count=mysqli_num_rows($result);
$row_data=mysqli_fetch_assoc($result);

$current_name=$row_data['user_name'];
$current_password=$row_data['user_password'];
$current_phone=$row_data['phone'];
$current_email=$row_data['user_email'];


if(isset($_POST['update_user']))
{
    $user_Name=$_POST['fullname'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $password=$_POST['password'];

        // insert query to db
        $update_user= "update `user_table` set 	user_name='$user_Name',
        user_email='$email',gender='$gender',phone='$phone',password='$password'
        where user_id=$user_id";
        $update_result=mysqli_query($conn,$update_user);
        
    
            if ($update_result)
        {
            echo "<script> alert ('updated successfully!') </script>" ;
        }
        else{
          echo "<script> alert ('update failed,try again!') </script>" ;
        }
   
    }  

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <!-- font awesome starts-->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
  <!-- font awesome ends -->
 
 <style>

       /* header starts */

       .logo{
                    width: 15%;
                    height: 15%;
                    border-radius: 50%;

                }

                .navlinks{
                    margin-left: -350px;
                }

                .navlinks ul li{
                    margin-left: 40px;
                }

                /* header ends */

                /* form starts */

                 /* form starts */
    body {
    font-family: Arial, sans-serif;
    background-color: white;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

.container {
    max-width: 500px;
    margin: 50px auto;
    background-color: white;
    padding-top: 40px;
    padding-bottom:0.5px;
    border-radius: 8px;
    height: 580px;
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
    margin-top: 30px;
}


.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    margin-left: 50px;
}

input[type="text"],
input[type="tel"],
input[type="email"],
select,
input[type="password"] {
    outline: none;
    width: 80%;
    margin-left:50px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    
}

.reg{
  margin-top: -30px;
  text-align: center;
}

button:hover {
    background-color: #45a049;
}

button:focus {
    outline: none;
}

.submitbtn{
    margin-left: 200px;
}

/* form ends */
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
            <a class="nav-link" href="products.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
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

        <!-- register starts -->
    
    <div class="container">
     
      <form id="registration-form" action="" method="post">
      <h3 class="reg">Update</h3>
          <div class="form-group">
              <label for="fullname">Full Name</label>
              <input type="text" id="fullname" name="fullname" required autocomplete="off" value="<?php echo $current_name ?>">
          </div>
          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" id="phone" name="phone" required autocomplete="off"  value="<?php echo $current_phone ?>">
          </div>
          <div class="form-group">
              <label for="gender">Gender</label>
              <select id="gender" name="gender" required >
                  <option value="">Select Gender</option>
                  <option value="male" default>Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
              </select>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" required autocomplete="off"  value="<?php echo $current_email?>">
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" required autocomplete="off"  value="<?php echo $current_password ?>">
          </div>
          <button type="submit" class="submitbtn" name="update_user">Register</button>
      </form>
  </div>


     <!-- register ends -->
  



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
</body>
</html>