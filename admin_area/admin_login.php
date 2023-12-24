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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin Login</title>
    <style>
        body{
            overflow:hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
      <h2 class="text-center mb-5">
       Admin Registration
      </h2>
      <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
              <img src="./product_images/adinreg.png" alt="Admin Registration" class="img-fluid">
            </div>
                 <div class="col-lg-6 col-xl-4">
                    <form action="" method="post">

                    <div class="form-outline mb-4 col-xl-4">
                        <label for="username" class="form-lable">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required="required">
                    </div>
                   
                     <div class="form-outline mb-4 col-xl-4">
                        <label for="password" class="form-lable">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your Password" required="required">
                    </div>
                 
                    <div col-xl-4>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                        <p class="small">Don't you have an account?<a href="admin_registration.php" class="link-danger">Register</a></p>
                    </div>
                    </form>
            </div>
      </div>
    </div>
</body>
</html>


<?php
 // Make sure to start the session at the beginning of your script

if (isset($_POST['admin_login'])) {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];
    if ($con) {
        $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_username'";
        $result = mysqli_query($con, $select_query);

        if ($result) {
            $row_count = mysqli_num_rows($result);


if ($row_count > 0) {
    $row_data = mysqli_fetch_assoc($result);

    if (password_verify($admin_password, $row_data['admin_password'])) {
        $_SESSION['username']=  $admin_username ;
        echo "<script>alert('Login Successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

// ...

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
