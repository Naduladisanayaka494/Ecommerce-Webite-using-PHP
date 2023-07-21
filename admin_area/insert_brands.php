<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
  $brand_title = $_POST['cat_title'];

  $select_query = "SELECT * FROM `brands` WHERE brand_title = '$brand_title'";
  $result_select = mysqli_query($con, $select_query);

  if($result_select){
    $number = mysqli_num_rows($result_select);
    if($number > 0){
      echo "<script>alert('Category already present')</script>";
    } else {
      $insert_query = "INSERT INTO `brands` (brand_title) VALUES ('$brand_title')";
      $result = mysqli_query($con, $insert_query);
      if($result){
        echo "<script>alert('Brand has been inserted successfully')</script>";
      }
    }
  } else {
    // Handle the case when the query fails (debugging or error reporting)
    echo "Error: " . mysqli_error($con);
  }
}
?>






<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2" >
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-reipt"></i></span>
  <input type="text" class="form-control"  name="cat_title" placeholder="Insert Brands" aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-102 mb-2 m-auto" >
  <input type="submit" class=" bg-info border-0 p-2 my-3" value="Insert Brands" name="insert_cat" placeholder="Insert Brands" aria-label="Username" aria-describedby="basic-addon1" class="bg-info">
  <!-- <button class="bg-info p-2 my-3 border-0">Insert Brands</button> -->
</div>





</form>