<h3 class="text-center text-success">List Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_users="Select * from `user_table`";
        $result=mysqli_query($con,    $get_users);
        $row_count=mysqli_num_rows(  $result);
        echo "    <tr>
        <th>Id</th>
           <th>User Name</th>
           <th>User Email</th>
            <th>User Image</th>
           <th>User Address</th>
           <th>User Mobile</th>
            <th>Delete</th>
   

        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";

    if($row_count==0){
        echo "<h2 class='bg-danger text-center mt-5'>No users</h2>";
    }else{
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['user_id'];
            $user_name=$row_data['username'];
            $user_email=$row_data['user_email'];
            $user_image=$row_data['user_image'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile'];
            $number++;
      
        }

    }
        ?>

         <td><?php echo $number; ?></td>
            <td> <?php echo   $user_name; ?></td>
            <td>  <?php echo  $user_email; ?></td>
            <td> <img src='../users_area/user_images/ <?php echo $user_image; ?>'alt='$user_name' /></td>
            <td> <?php echo  $user_address; ?> </td>
            <td>  <?php echo    $user_mobile; ?> </td>
          <td> <button class='btn btn-secondary' onclick="location.href='index.php?delete_users=<?php echo $user_id; ?>'">Delete</button></td>

     </tr>
    </tbody>

</table>
 
