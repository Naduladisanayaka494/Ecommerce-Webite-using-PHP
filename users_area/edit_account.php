<?php
if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];

    // Make sure you connect to the database before executing the query.
    global $con;
    
    // Fix the SQL query by removing single quotes around $user_session_name.
    $result_query = "SELECT * FROM `user_table` WHERE username='$user_session_name'";
    $query_result = mysqli_query($con, $result_query);

    // Check if the query was successful.
    if ($query_result) {
        $row_fetch = mysqli_fetch_assoc($query_result);
        if ($row_fetch) {
            $user_id = $row_fetch['user_id'];
            $username = $row_fetch['username'];
            $user_email = $row_fetch['user_email'];
            $user_address = $row_fetch['user_address'];
            $user_mobile = $row_fetch['user_mobile'];
           
     
        } else {
            // Handle the case where no user was found.
            echo "User not found.";
        }
    } else {
        // Handle the case where the query failed.
        echo "Query failed: " . mysqli_error($con);
    }

           if(isset($_POST['user_update'])){
            $update_id=$user_id;
            $username = $_POST['user_username'];
            $user_email = $_POST['user_email'];
            $user_address = $_POST['user_address'];
            $user_mobile = $_POST['user_mobile'];
            $user_image = $_FILES['user_image']['name'];
            $user_image_tmp = $_FILES['user_image']['tmp_name'];
            move_uploaded_file($user_image_tmp,"./user_images/$user_image");

            $update_data="update `user_table` set username='$username',user_email='$user_email',user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile' where user_id='$update_id'";
            $result_query_update=mysqli_query($con,$update_data);
            if($result_query_update){
                echo"<script>alert('Data Updated Successfuly')</script>";
                  echo"<script>window.open('logout.php','_self')</script>";
            }
            }
}
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
</head>
<body>
    <h3 class="text-center text-success mt-2 mb-4">Edit account </h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $username?>" name="user_username"></input>
        </div>
          <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto"  value="<?php echo   $user_email?>" name="user_email"></input>
        </div>
           <div class="form-outline mb-4 d-flex w-50 m-auto">
        <input type="file" class="form-control " name="user_image"></input>
        <img src="./user_images/<?php echo $user_image?>" alt="" class="edit_img">
        </div>
           <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo  $user_address?>" name="user_address"></input>
        </div>
           <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value=<?php echo  $user_mobile?> name="user_mobile"></input>
        </div>
         <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user_update"></input>
    </form>
</body>
</html>