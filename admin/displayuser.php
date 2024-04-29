<?php
include('../connect.php');
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- font awesome starts-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container {
            width: 40%;
            height: 610px;
            /* border: 1px solid red; */
            padding: 30px;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
            background-color: white;
            border-radius: 20px;
            /* margin-top: -10px; */

        }

        .form-outline {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* header starts */

        .logo {
            width: 15%;
            height: 15%;
            border-radius: 50%;

        }

        .mangagetext {
            text-align: center;
            margin-left: 100px;

        }

        .home {
            text-decoration: none;
        }

        .headcon {
            display: flex;
            justify-content: space-between;
        }

        .headcon h2 {
            color: black;

        }

        .imagesoftable {
            width: 80px;
            height: 80px;
        }


        /* header ends */
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


                    <div class="headcon">

                        <a href="admin.php" class="home">
                            <h2>Home</h2>
                        </a>

                        <h2 class=" mangagetext">Admin Dashboard</h2>

                    </div>


                </ul>

            </div>
        </div>
    </nav>

    <!-- header ends -->

    <form action="" method="post">
        <table class="table table-bordered mt-5 text-center">
            <h2 class="text-center head ">Users Details</h2>

            <thead>
                <tr>
                    <!-- <th scope="col">Select</th> -->
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                   

            </thead>
            <tbody>
                <!-- php code of cart db -->

                <?php
                // fetching query
                global $conn;
                $select_query = "select * from `user_table` ";
                $result_query = mysqli_query($conn, $select_query);

                while ($row = mysqli_fetch_assoc($result_query)) {
                    $name = $row['user_name'];
                    $email = $row['user_email'];
                    $password = $row['user_password'];
                    $phone = $row['phone'];
                    $gender = $row['gender'];
                    $address = $row['user_address'];
                    $user_id = $row['user_id'];

                ?>


                    <tr>
                        <!-- <th scope="row"><input type="checkbox" name="remove_item[]" value="<?php echo $user_id ?>"></th> -->
                        <td><?php echo $name ?> </td>
                        <td> <?php echo $email ?> </td>
                        <td><?php echo $phone ?> </td>
                        <td> <?php echo $gender ?> </td>
                        <td> <?php echo $address ?> </td>

                        <!-- <td>
                        
                            <input type="submit" class="bg-danger px-5 py-2 rounded-pill border-0 text-white" name="remove_user" value="Remove">


                        </td>  -->

                    </tr>

                <?php
                }

                ?>

                <?php

                function remove_user()
                {
                    global $conn;
                    if (isset($_POST['remove_user'])) {
                        // Check if any items are selected for removal
                        if (isset($_POST['remove_item']) && is_array($_POST['remove_item'])) {
                            // Loop through each selected item
                            foreach ($_POST['remove_item'] as $remove_user) {
                                // Remove the item from the cart
                                $delete_query = "DELETE FROM `user_table` WHERE user_id = $remove_user ";
                                $run_query = mysqli_query($conn, $delete_query);
                                // Check if the deletion was successful
                                if ($run_query) {
                                    echo "<script>alert('Item removed successfully.');</script>";
                                    echo "<script>window.open('displayuser.php','_self')</script>";
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
                remove_user();

                ?>
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>