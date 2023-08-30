<?php
include_once('../includes/connect.php');
include_once('../functions/commonfunctions.php');

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}

$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);

if ($result_cart_price) {
    $count_products = mysqli_num_rows($result_cart_price);
    
    while ($row_price = mysqli_fetch_array($result_cart_price)) {
        $product_id = $row_price['product_id'];
        $select_product = "SELECT * FROM `products` WHERE product_id=$product_id";
        $run_price = mysqli_query($con, $select_product);

        if ($run_price) {
            while ($row_product_price = mysqli_fetch_array($run_price)) {
                $product_price = $row_product_price['product_price']; // corrected the variable name
                $total_price += $product_price;
            }
        } else {
            // Handle the query execution error in $select_product
            echo "Error in select_product query: " . mysqli_error($con);
        }
    }
} else {
    // Handle the query execution error in $cart_query_price
    echo "Error in cart_query_price query: " . mysqli_error($con);
}

// Now $total_price contains the total price
echo "Total Price: $total_price"; // You can use this value as needed
?>
