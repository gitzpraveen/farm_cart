<?php
include('../connect.php');
session_start();
// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}


function getadminnameById() {
   
    global $conn;
    $id = $_SESSION['admin_id'];
   
    $select_query = "SELECT * FROM `admin_table` WHERE admin_id =$id ";

    
    $result = mysqli_query($conn, $select_query);

    
    if ($result && mysqli_num_rows($result) > 0) {
        $row_data = mysqli_fetch_assoc($result);
        return $row_data['admin_name']; // Return the username
    } else {
        return 'admin'; // User not found or error occurred
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  

    <style>
        
                /* header starts */

                .logo{
                    width: 15%;
                    height: 15%;
                    border-radius: 50%;

                }

                .mangagetext
                {
                    text-align: center;
                    margin-left: 200px;
                }

               

                /* header ends */

                /* admin dashboard  starts */
                .adminimage
                {
                    width: 100px;
                    object-fit: contain;
                }

                button{
                    border-radius: 10px;
                    outline: none;
                    width: 200px;
                    margin-bottom: 20px;
                    height: 50px;
                }

                .buttons
                {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }

                .admin{
                    color: black;
                    font-weight: bolder;
                    font-size: larger;
                    margin-bottom: 30px;
                }

                .imgcont
                {
                    display: flex;
                    justify-content: center;
                }

                button a{
                    text-decoration: none;
                    color: black;
                    font-weight: bolder;

                }

                button:hover{
                    background-color: wheat;
                }

                .adminrow{
                    margin-top: 20px;
                        margin-bottom: 20px;
                }
                /* admin_dashboard ends */
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
         
        
         

               <div>
                    <h2 class=" mangagetext" >Admin Dashboard</h2>
               </div>

         
        </ul>
       
      </div>
    </div>
  </nav>
      
      <!-- header ends -->

      


      <!-- admin dashboard starts -->
              
      <div class="row ">
        <div class="col-md-12  p-1 ">
           
            <p class=" text-center admin mt-5">Welcome, <?php echo getadminnameById() ?></p>

            <div class="buttons">
                <a href="allproducts.php" class="btncons"><button>View Products</button></a>
                <a href="displayuser.php" class="btncons"><button>Users</button></a>
                <a href="users_orders.php" class="btncons"><button>Users order</button></a>
                <a href="insert_product.php" class="btncons"><button>Insert Products</button></a>
                <a href="admin_logout.php" class="btncons"><button>Logout</button></a>
   
            </div>

        </div>
      </div>

      
      <!-- admin dashboard ends -->
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>