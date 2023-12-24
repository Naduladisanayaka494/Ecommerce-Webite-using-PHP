<?php include('../includes/connect.php');
 include('../functions/commonfunctions.php')


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
    <title>Admin Registration</title>
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
                        <label for="email" class="form-lable">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required="required">
                    </div>
                     <div class="form-outline mb-4 col-xl-4">
                        <label for="password" class="form-lable">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your Password" required="required">
                    </div>
                       <div class="form-outline mb-4 col-xl-4">
                        <label for="confirm_password" class="form-lable">Confirm Password</label>
                        <input type="confirm_password" id="confirm_password" name="confirm_password" placeholder="Confirm_password" required="required">
                    </div>
                    <div col-xl-4>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small">Already have an account?<a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>
                    </form>
            </div>
      </div>
    </div>
</body>
</html>


<?php
if (isset($_POST['admin_registration'])) {
    $admin_username = $_POST['username'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_admin_password = $_POST['confirm_password'];

    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_username' OR admin_email='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script>alert('Username or Email already exists')</script>";
    } elseif ($admin_password != $conf_admin_password) {
        echo "<script>alert('Passwords do not match')</script>";
    } else {
        $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) VALUES ('$admin_username', '$admin_email', '$hash_password')";
        $sql_execute = mysqli_query($con, $insert_query);

        if ($sql_execute) {
            echo "<script>alert('Data inserted successfully')</script>";
        } else {
            die(mysqli_error($con));
        }
    }
}
?>
