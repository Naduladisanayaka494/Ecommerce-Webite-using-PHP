<?php
@include('../includes/connect.php');
@include('../functions/commonfunctions.php');
@session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User-Rigistration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <!-- Font Awesome CSS CDN (Font Awesome 5) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-KT9MsB9k75XHk2vjAWPauD02Gk57qo0eGyFcaC91bBFK4AtxfLZ9b8eyqq8d9hA3nV/TFDt5fhCyBhwGuVc2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    /* Custom CSS to move search to the left */
    .search-form {
      display: flex;
    }

    .search-form .form-control {
      margin-right: 5px;
    }

    /* Additional styles to adjust the height of the navbar */
    .navbar {
      min-height: 50px;
    }

    .navbar .navbar-brand {
      margin-right: 20px;
    }
    body{
      overflow-x: hidden;
    }
  </style>
  <link rel="stylesheet" href="style.css">

  <!-- Font Awesome JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
    integrity="sha512-AWnAjMF96LlXzX6KRScV3F+grv7/6RXgeALbzT0H3iPn02vHNNO3VYKdEsmVT5ez0B7NYNjbJGRvPllfiYxRw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center"> User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" >
                <div class="form-outline">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your name" autocomplete="off" required="required" name="user_username"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required" name="user_password"/>
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="login" class="bg-info py-2 px-3 border-0" name="user_login"/>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Not Registerd yet?<a href="http://localhost//Ecommercewebsite/users_area/user_registration.php" class="text-dangergiy">Register</p></a> 

                </div>

            </form>


        </div>
        </div>
    </div>
    
</body>
</html>
<?php

if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    
    // Check if the database connection is established
    if ($con) {
        $select_query = "SELECT * FROM `user_table` WHERE username='$user_username'";
        $result = mysqli_query($con, $select_query);

        // Check if the query executed successfully
        if ($result) {
            $row_count = mysqli_num_rows($result);

            if ($row_count > 0) {
                $_SESSION['username']=$user_username;
                $row_data = mysqli_fetch_assoc($result);

                // Verify the password
                if (password_verify($user_password, $row_data['user_password'])) {
                    $user_ip = $_SERVER['REMOTE_ADDR'];
                    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
                    $select_cart = mysqli_query($con, $select_query_cart);
                    $row_count_cart = mysqli_num_rows($select_cart);

                    // Adjust your logic based on your requirements
                    if ($row_count == 1 && $row_count_cart == 0) {
                        $_SESSION['username']=$user_username;
                        echo "<script>alert('Login Successfully')</script>";
                        echo "<script>window.open('./profile.php','_self')</script>";
                    } else {
                        $_SESSION['username']=$user_username;
                        echo "<script>alert('Login Successfully')</script>";
                        echo "<script>window.open('../payment.php','_self')</script>";
                    }
                } else {
                    echo "<script>alert('Invalid Credentials')</script>";
                }
            } else {
                echo "<script>alert('Invalid Credentials')</script>";
            }
        } else {
            // Handle the query execution error
            echo "Query execution failed: " . mysqli_error($con);
        }
    } else {
        // Handle the database connection error
        echo "Database connection failed.";
    }
}
?>

