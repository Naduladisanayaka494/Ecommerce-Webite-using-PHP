<?php
include('../includes/connect.php');
include('../functions/commonfunctions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
     .adminimage{
    width:100px;
    object-fit: contain;


}
 .footer{
  position:absolute;
  bottom:0;
 }
 body{
  overflow-x:hidden;
 }
 .product_img{
width:100px;
object-fit:contain;

 }
 
    </style>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <img src="../images/logo.png" alt="" class="logo2">
        <nav class="navbar navbar-expand-lg">
      <ul class="navbar-nav">
        <li class="nav-item">
               <?php
               if (!isset($_SESSION['username'])) {

  echo "<li class='nav-item'><a class='nav-link' href='./users_area/profile.php'>WelCome ".$_SESSION['adminname']." </a></li>";
}
if (!isset($_SESSION['username'])) {
  echo "<li class='nav-item'><a class='nav-link' href='./admin_registration.php'>Login</a></li>";
} else {
  echo "<li class='nav-item'><a class='nav-link' href='./admin_login.php'>Logout</a></li>";
}
?>

        </li>
      </ul>

    </nav>
      </div>
    </nav>
    <div calss="bg-light">
      <h3 class="text-center p-2">Manage Details</h3>
    </div>
    <div class="row">
      <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-5">
          <a href="#"><img src="../images/treecoconut.jpg" alt="" class="adminimage"></a>
          <p class="text-light text-center" >Admin Name</p>
        </div>
        <div class="button text-center">
          <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
          <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View products</a></button>
          <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
          <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
          <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
          <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
          <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
          <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All payments</a></button>
          <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
          <button><a href="./admin_login.php" class="nav-link text-light bg-info my-1">Logout</a></button>
        </div>

      </div>
    </div>

    <div class="container my-5">
      <?php 
      if(isset($_GET['insert_category'])){
        include('insert_categories.php');
      }
      if(isset($_GET['insert_brands'])){
        include('insert_brands.php');
      }
       if(isset($_GET['view_products'])){
        include('view_products.php');
      }
        if(isset($_GET['edit_products'])){
        include('editproducts.php');
      }
          if(isset($_GET['delete_products'])){
        include('delete_products.php');
      }
             if(isset($_GET['view_categories'])){
        include('view_categories.php');
      }
              if(isset($_GET['edit_category'])){
        include('edit_categories.php');
      }
              if(isset($_GET['view_brands'])){
        include('view_brands.php');
      }
               if(isset($_GET['edit_brands'])){
        include('edit_brands.php');
      }
                if(isset($_GET['delete_category'])){
        include('delete_category.php');
      }
                if(isset($_GET['delete_brands'])){
        include('delete_brands.php');
      }
                   if(isset($_GET['list_orders'])){
        include('list_orders.php');
      }
                    if(isset($_GET['delete_order'])){
        include('delete_order.php');
      }
                     if(isset($_GET['list_payments'])){
        include('list_payments.php');
      }
                      if(isset($_GET['list_users'])){
        include('list_users.php');
      }
                       if(isset($_GET['delete_users'])){
        include('delete_users.php');
      }
  
      ?>
    </div>
<!-- 
    <div class="bg-info p-3 text-center footer">
        <p>All right reserved D- Design by Nadula 2022</p>

    </div> -->
  

  </div>




  <div class="bg-info p-3 text-center">
    <?php 
    include("../includes/footer.php")
    ?>
  </div>
    
</body>
</html>