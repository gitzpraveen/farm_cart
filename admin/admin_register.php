<?php

include('../connect.php');

if(isset($_POST['insert_admin']))
{
    $user_Name=$_POST['fullname'];
    $emp_id=$_POST['emp_id'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $key='abc#123';
    // $hash_password=password_hash($password,PASSWORD_DEFAULT);
   


    // check empty condition

    if($user_Name=='' or $emp_id=='' or $gender=='' or $email=='' or $password=='')
    {
        echo "<script>alert('please fill all  the  fields')</script>";
        
        exit();
    }
    else{
       

        // insert query to db
        $insert_user= "insert into `admin_table`(admin_name,emp_id,gender,admin_email,password,security_key) values ('$user_Name','$emp_id','$gender','$email','$password','$key')";
        
        $result_query=mysqli_query($conn ,$insert_user);
    
            if ($result_query)
        {
            echo "<script> alert ('Registered successfully!'); </script>" ;
            echo "<script>window.open('./admin_login.php','_self');</script>";
  
        }
        else{
          echo "<script> alert ('Registered failed,try again!') </script>" ;
        }
   
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
input[type="email"],
input[type="password"] {
    outline: none;
    width: 80%;
    margin-left:50px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    height: 40px;
}
select{
  outline: none;
    width: 80%;
    margin-left:50px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    height: 40px;
}

button {
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 5px 20px;
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
      <a class="navbar-brand" href="#"><img src="../farmLogo.jpeg" alt="" class="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse navlinks" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../login_dashboard.php">Login</a>
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
      <h3 class="reg">Admin Registration</h3>
          <div class="form-group">
              <label for="fullname">Full Name</label>
              <input type="text" id="fullname" name="fullname" required autocomplete="off">
          </div>
          <div class="form-group">
              <label for="emp_id">Employee Id</label>
              <input type="text" id="emp_id" name="emp_id" required autocomplete="off">
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" required autocomplete="off">
          </div>
          <div class="form-group">
              <label for="gender">Gender</label>
              <select id="gender" name="gender" required>
                  <option value="">Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
              </select>
          </div>
          
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" required autocomplete="off">
          </div>
          <button type="submit" class="submitbtn" name="insert_admin">Register</button>
      </form>
  </div>


     <!-- register ends -->
  



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
</body>
</html>