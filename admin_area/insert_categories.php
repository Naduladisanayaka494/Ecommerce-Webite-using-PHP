<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
  $category_title = $_POST['cat_title'];

  $select_query = "SELECT * FROM `categories` WHERE category_title = '$category_title'";
  $result_select = mysqli_query($con, $select_query);

  if($result_select){
    $number = mysqli_num_rows($result_select);
    if($number > 0){
      echo "<script>alert('Category already present')</script>";
    } else {
      $insert_query = "INSERT INTO `categories` (category_title) VALUES ('$category_title')";
      $result = mysqli_query($con, $insert_query);
      if($result){
        echo "<script>alert('Category has been inserted successfully')</script>";
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
  <input type="text" class="form-control"  name="cat_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-102 mb-2 m-auto" >
  <input type="submit" class="bg-info border-0 p-2" value="Insert Categories" name="insert_cat" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1" class="bg-info">
  <!-- <button class="bg-info p-2 my-3 border-0">Insert Categories</button> -->
</div>





</form>