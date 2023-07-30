<?php
include('includes/connect.php');
include('functions/commonfunctions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website-Cart Details</title>
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
    .cart_img{
    width:50px;
    height:50px;
    object-fit:contain;
}
  </style>
  <link rel="stylesheet" href="style.css">

  <!-- Font Awesome JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
    integrity="sha512-AWnAjMF96LlXzX6KRScV3F+grv7/6RXgeALbzT0H3iPn02vHNNO3VYKdEsmVT5ez0B7NYNjbJGRvPllfiYxRw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i><sup><?php
         cart_item(); ?></sup>Cart</a>
        </li>
       
      </ul>

   
    </div>
  </nav>

  <?php
  cart();
  ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav mr-auto text-center">
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

  <div class="container">
    <!-- First main section: col-md-10 -->
   <div class="row">
    <form action="" metho="post">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove</th>
                <th colSpan="2">Operations</th>
            </tr>
        </thead>
    <!-- ... (previous code) ... -->
    <tbody>
    <?php
    global $con;
    $ip = getIPAddress();
    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
    $result_query = mysqli_query($con, $cart_query);

    $total = 0; // Initialize total to zero

    while ($row = mysqli_fetch_array($result_query)) {
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
        $result_products = mysqli_query($con, $select_products);

        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = $row_product_price['product_price'];
            $price_title = $row_product_price['product_title'];
            $price_image1 = $row_product_price['product_image1'];
            $quantity = $row['quantity']; // Get the quantity of the current product

            $total_product_price = $product_price * $quantity; // Calculate total price for each product based on its quantity
            $total += $total_product_price; // Add the total price of this product to the overall total
    ?>
            <tr>
                <td><?php echo $price_title; ?></td>
                <td><img src="./images/<?php echo $price_image1?>" alt="" class="cart_img"></td>
                <td><input type="text" name="qty[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>" class="form-input w-50"></td>
                <?php
                 $ip = getIPAddress();
                 if(isset($_POST['update_cart'])){
                    $quantities=$_POST['qty'][$product_id]; // Get the updated quantity for the current product
                    $update_cart="UPDATE `cart_details` SET quantity=$quantities WHERE product_id='$product_id' AND ip_address='$ip'";
                    mysqli_query($con, $update_cart);
                    $product_price = $product_price * $quantities;
                 }
                ?>
                <td><?php echo $total_product_price; ?>/-</td>
                <td><input type="checkbox"></td>
                <td>
                    <!-- <button class="bg-info px-3 py-2 boarder-0">
                        Update
                    </button> -->
                    <input type="submit" value="Update Cart" class="bg-info px-3 py-2 boarder-0" name="update_cart">
                    <button class="bg-secondry p-3 py-2 boarder-0">
                        Remove
                    </button>
                </td>
            </tr>
    <?php
        }
    }
    ?>
</tbody>

<!-- ... (remaining code) ... -->

    </table>
    <div class="d-flex">
        <h4 class="px-3">Subtotal:<?php echo $total?><strong class="test info">/-</strong>
        <a href="index.php"><button  class="bg-info px-3 py-2 boarder-0"> Continue Shoping</button></a>
        <a href="index.php"><button  class="bg-secondry p-3 py-2 boarder-0"> Check Out</button></a>
    </div>
   </div>
   </form>
      </div>

      <!-- Second group inside col-md-10 -->
      <!-- Add your content for the second group here -->

    </div>
    <!-- Second main section: col-md-2 -->
    <div class="col-md-2 bg-secondary p-0">
   
    </div>
  </div>

  <div class="bg-info p-3 text-center">
    <?php 
    include("./includes/footer.php")
    ?>
  </div>

</body>

</html>
