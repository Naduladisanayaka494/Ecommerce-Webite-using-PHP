<?php
include('../includes/connect.php');
if (isset($_POST['insert_cat'])) {
  $brand_title = $_POST['cat_title'];

  // Using prepared statements to prevent SQL injection
  $select_query = "SELECT * FROM `brands` WHERE brand_title = ?";
  $stmt = mysqli_prepare($con, $select_query);
  mysqli_stmt_bind_param($stmt, "s", $brand_title);
  mysqli_stmt_execute($stmt);
  $result_select = mysqli_stmt_get_result($stmt);

  if ($result_select) {
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
      echo "<script>alert('Category already present')</script>";
    } else {
      // Using prepared statements for the insert query
      $insert_query = "INSERT INTO `brands` (brand_title) VALUES (?)";
      $stmt = mysqli_prepare($con, $insert_query);
      mysqli_stmt_bind_param($stmt, "s", $brand_title);
      $result = mysqli_stmt_execute($stmt);
      if ($result) {
        echo "<script>alert('Brand has been inserted successfully')</script>";
      }
    }
  } else {
    // Handle the case when the query fails (debugging or error reporting)
    echo "Error: " . mysqli_error($con);
  }
}
?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="cat_title" placeholder="Insert Brands" aria-label="brands" aria-describedby="basic-addon1">
  </div>
  <div class="input-group w-102 mb-2 m-auto">
    <input type="submit" class="bg-info border-0 p-2 my-3" value="Insert Brands" name="insert_cat" placeholder="Insert Brands" aria-label="Username" aria-describedby="basic-addon1" class="bg-info">
  </div>
</form>
