
<?php
session_start();
include('../connect.php');
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

if(isset($_POST['insert_product']))
{
    $product_title=$_POST['product_title'];
    $product_Description=$_POST['product_Description'];
    $product_catagories=$_POST['product_catagories'];
    $product_price=$_POST['product_price'];
    $product_keyword=$_POST['product_keyword'];
    $product_status='true';
   
	// access image

    $product_image=$_FILES['product_image']['name'];

    // access image tmp name

    $temp_image=$_FILES['product_image']['tmp_name'];

    // check empty condition

    if($product_title=='' or $product_Description==''or $product_keyword=='' or $product_catagories=='' or $product_price=='' or $product_image=='')
    {
        echo "<script>alert('please fill all  the  fields')</script>";
        
        exit();
    }
    else{
        move_uploaded_file($temp_image,"./product_images/$product_image");

        // insert query to db
        $insert_product= "insert into `products` (product_title,product_Description,product_catagories,
        product_image,product_price,product_keyword,date,status) values ('$product_title','$product_Description','$product_catagories','$product_image','$product_price','$product_keyword',NOW(),'$product_status')";
        
        $result_query=mysqli_query($conn ,$insert_product);
    
            if ($result_query)
        {
            echo "<script> alert ('Product has been added successfully!') </script>" ;
        }
   
    }

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <!-- font awesome starts-->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
  <!-- font awesome ends -->

  <style>
   

    .container
    {
        width: 40%;
        height: 610px;
        /* border: 1px solid red; */
        padding: 30px;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        background-color: white;
        border-radius: 20px;
        /* margin-top: -10px; */
       
    }

    .form-outline
    {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

      /* header starts */

      .logo{
                    width: 15%;
                    height: 15%;
                    border-radius: 50%;

                }

                .mangagetext
                {
                    text-align: center;
                    margin-left: 100px;
                   
                }

                .home{
                    text-decoration: none;
                }

                .headcon
                {
                    display: flex;
                    justify-content: space-between;
                }

                .headcon h2{
                    color: black;
                    
                }


              
                /* header ends */
  </style>
</head>
<body >

 <!-- header starts -->
   
 <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="../farmLogo.jpeg" alt="" class="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse navlinks" id="navbarSupportedContent">
        
               
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      

               <div class="headcon">
               
                    <a href="admin.php" class="home"><h2>Home</h2></a>
               
                    <h2 class=" mangagetext" >Admin Dashboard</h2>

               </div>

         
        </ul>
       
      </div>
    </div>
  </nav>
      
      <!-- header ends -->

      <!-- insert form starts -->
   <div class="container mt-3">
    <h2 class="text-center" >Insert Product</h2>  

    <form action="" method="post" enctype="multipart/form-data">

            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" autocomplete="off" required >
            
            </div>

            <div class="form-outline mb-2 w-50 m-auto">
                <label for="Description" class="form-label">Description</label>
                <input type="text" name="product_Description" id="Description" class="form-control" autocomplete="off" required >
            
            </div>

            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" autocomplete="off" required >
            
            </div>

            <div class="form-outline mb-2 w-50 m-auto">
            <label for="product_catagories" class="form-label">Select Catagory </label>
                <select name="product_catagories" id="product_catagories" class="form-select" >
                    <option value="Animal Feed">Animal Feed</option>
                    <option value="Crop">Crop</option>
                    <option value="seeds">Seeds</option>
                    <option value="Plants">Plants</option>
                    <option value="Fertilizer">Fertilizer</option>
                    <option value="Pesticides">Pesticides</option>
                    <option value="tools">Tools</option>
                    <option value="Rent for farmer">Rent for farmer</option>
                    

                    

                </select>
            </div>

            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image" class="form-label">Product image</label>
                <input type="file" name="product_image" id="product_image" class="form-control" autocomplete="off" required >
            
            </div>

            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" autocomplete="off" required >
            
            </div>

            <div class="form-outline mb-2 w-50 m-auto">
               
                <input type="submit" name="insert_product"  class="btn btn-info mb-3 mt-1 px-3 insertbtn "  value="Insert Product">
            
            </div>
    </form>
    </div>
    
</body>
</html>