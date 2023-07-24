<?php
include('includes/connect.php');
include('functions/commonfunctions.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website using PHP and MYSQL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <!-- Font Awesome CSS CDN (Font Awesome 5) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-KT9MsB9k75XHk2vjAWPauD02Gk57qo0eGyFcaC91bBFK4AtxfLZ9b8eyqq8d9hA3nV/TFDt5fhCyBhwGuVc2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    /* Custom CSS to move search to the left */
    .search-form {
      display: flex;
    }

    .search-form .form-control {
      margin-right: 5px;
    }

    /* Additional styles to adjust the height of the navbar */
    .navbar {
      min-height: 50px;
    }

    .navbar .navbar-brand {
      margin-right: 20px;
    }
  </style>
  <link rel="stylesheet" href="style.css">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand" href="#"><img src="./images/logo.png" class="logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i><sup><?php
         cart_item(); ?></sup>Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li> -->
      </ul>

      <!-- Move the search field and button to the left -->
      <form class="form-inline my-2 my-lg-0 search-form" style="float: right;">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <!-- Font Awesome JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
    integrity="sha512-AWnAjMF96LlXzX6KRScV3F+grv7/6RXgeALbzT0H3iPn02vHNNO3VYKdEsmVT5ez0B7NYNjbJGRvPllfiYxRw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
          <a class="nav-link" href="/">Welcome Guest <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>

    </ul>
    </nav>

    <div class="bg-light">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">communication is at the heart of e-commerce and community</p>

    </div>

    <div class="row">
    <!-- First main section: col-md-10 -->
    <div class="col-md-10">
        <!-- First group inside col-md-10 -->
        <div class="row">
          <!-- ... (previous code) ... -->

<?php
getallproducts();
get_unique_categories();
get_unique_brands()
?>

<!-- ... (remaining code) ... -->

  
          
            <div class="col-md-4  mb-2">

            </div>
            <div class="col-md-4  mb-2">
 
            </div>
        </div>

        <!-- Second group inside col-md-10 -->
        <!-- Add your content for the second group here -->

    </div>
    <!-- Second main section: col-md-2 -->
    <div class="col-md-2 bg-secondary p-0">
       <ul class="navbar-nav me-auto text-center"> 
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>

        </li>
        <?php
        getbrands()
              
        ?>
      
       </ul>
       <ul class="navbar-nav me-auto text-center"> 
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
          <?php
          getcategories();
        
          
        ?>

        </li>
  
       </ul>
    </div>
</div>




    <div class="bg-info p-3 text-center">
        <p>All right reserved  Design by Nadula 2022</p>

    </div>

</body>


</html>
