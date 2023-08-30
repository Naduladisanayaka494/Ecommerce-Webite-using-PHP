<?php
include_once('./functions/commonfunctions.php');
include_once('./includes/connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <!-- Font Awesome CSS CDN (Font Awesome 5) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-KT9MsB9k75XHk2vjAWPauD02Gk57qo0eGyFcaC91bBFK4AtxfLZ9b8eyqq8d9hA3nV/TFDt5fhCyBhwGuVc2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
</head>
<style>
    img{
        width:90%;
        margin:auto;
        display:block;
    }
</style>
<body>
    <?php
    $user_ip=getIPAddress();
    $get_user="Select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    
    ?>
    
    <div class="container">
                <h2 class="text-center text-info">Payment Options</h2>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-6">
                            <a href="https://www.paypal.com"><img src="./users_area/user_images/upi.jpg" alt="" target="_blank"></a>
                    </div>
                     <div class="col-md-6">
                            <a href="order.php?user_id=<?php echo $user_id?>"><h2 class="text-center"> Pay Offline</h2></a>
                    </div>
               
                </div>
    </div>
</body>
</html>