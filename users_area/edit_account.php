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
        <input type="text" class="form-control w-50 m-auto" name="user_username"></input>
        </div>
          <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto" name="user_email"></input>
        </div>
           <div class="form-outline mb-4 d-flex w-50 m-auto">
        <input type="file" class="form-control " name="user_image"></input>
        <img src="./user_images/<?php echo $user_image?>" alt="" class="edit_img">
        </div>
           <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_useraddress"></input>
        </div>
           <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_mobile"></input>
        </div>
         <input type="submit" value="update" class="bg-info py-2 px-3 border-0" name="user_update"></input>
    </form>
</body>
</html>