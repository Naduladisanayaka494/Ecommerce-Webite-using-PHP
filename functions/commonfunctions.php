<?php
include('./includes/connect.php');

function getproducts()
{
    if (!isset($_GET['category']) && !isset($_GET['brand'])) {
        global $con;
        $select_query = "SELECT * FROM `products` ORDER BY rand() LIMIT 0, 9";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'> $product_description </p>
                            <p class='card-text'>Price: $product_price /- </p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>";
        }
    }
}


function getallproducts()
{
    if (!isset($_GET['category']) && !isset($_GET['brand'])) {
        global $con;
        $select_query = "SELECT * FROM `products` ORDER BY rand() ";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'> $product_description </p>
                            <p class='card-text'>Price: $product_price /- </p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>";
        }
    }
}





function get_unique_categories()
{
    if (isset($_GET['category'])) {
        global $con;
        $category_id = $_GET['category'];

        $select_query = "SELECT * FROM `products` WHERE category_id = ?";
        $stmt = mysqli_prepare($con, $select_query);
        mysqli_stmt_bind_param($stmt, "i", $category_id);
        mysqli_stmt_execute($stmt);
        $result_query = mysqli_stmt_get_result($stmt);

        // Check if any rows are returned
        if (mysqli_num_rows($result_query) > 0) {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'> $product_description </p>
                                <p class='card-text'>Price: $product_price /- </p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
            }
        } else {
            // No data available, display message in red color
            echo "<div class='col-md-12 text-center' style='color: red;'>
                    <h4>No Stock Available</h4>
                </div>";
        }
    }
}


function get_unique_brands()
{
    if (isset($_GET['brand'])) {
        global $con;
        $category_id = $_GET['brand'];

        $select_query = "SELECT * FROM `products` WHERE brand_id = ?";
        $stmt = mysqli_prepare($con, $select_query);
        mysqli_stmt_bind_param($stmt, "i", $category_id);
        mysqli_stmt_execute($stmt);
        $result_query = mysqli_stmt_get_result($stmt);

        // Check if any rows are returned
        if (mysqli_num_rows($result_query) > 0) {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'> $product_description </p>
                                <p class='card-text'>Price: $product_price /- </p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
            }
        } else {
            // No data available, display message in red color
            echo "<div class='col-md-12 text-center' style='color: red;'>
                    <h4>This Brand is not available For service</h4>
                </div>";
        }
    }
}




function getbrands(){
    global $con;
    $select_brands="Select * from `brands`";
    $result_brands=mysqli_query($con,$select_brands);
    while($row_data=mysqli_fetch_assoc($result_brands)){
      $brand_title=$row_data['brand_title'];
      $brand_id=$row_data['brand_id'];
      echo " <li class='nav-item '>
      <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>

    </li>";
    }

}

function getcategories(){
    global $con;
    $select_categories="Select * from `categories`";
    $result_categories=mysqli_query($con, $select_categories);
    while($row_data=mysqli_fetch_assoc( $result_categories)){
      $category_title=$row_data['category_title'];
      $categoryi_id=$row_data['category_id'];
      echo " <li class='nav-item '>
      <a href='index.php?category=$categoryi_id' class='nav-link text-light'>$category_title</a>

    </li>";
    }
}


function searchproduct()
{
    
        global $con;
        if(isset($_GET['search_data_product'])){
            $search_data_value=$_GET['search_data'];
        $select_query = "SELECT * FROM `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'> $product_description </p>
                            <p class='card-text'>Price: $product_price /- </p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>";
        }
    }
    
}



function view_details()
{
    if (isset($_GET['product_id'])) {
        global $con;
        $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM `products` WHERE product_id = $product_id";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            
            // Individual product card
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price /- </p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                            <a href='index.php' class='btn btn-secondary'>Go Home</a>
                        </div>
                    </div>
                </div>";

            // Related products section
            echo "<div class='col-md-8'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-5'>Related Products</h4>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>
                        </div>
                        <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='...'>
                        </div>
                    </div>
                </div>";
        }
    }
}


function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  



function cart(){
 if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress();  
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
        echo "<script>alert('This item already present in the cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";

    }else{
        $insert_query="insert into `cart_details` (product_id,ip_address,quantity)values($get_product_id,'$ip',0)";
        $result_query = mysqli_query($con, $insert_query);
        echo "<script>window.open('index.php','_self')</script>";
        echo "<script>alert('Item is added to Cart')</script>";
    }

   
 }
}

function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress();  
        $get_product_id=$_GET['add_to_cart'];
        $select_query="Select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);
      
       
     }else{
        global $con;
        $ip = getIPAddress();  
        $select_query="Select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);
     }
     echo $num_of_rows;

}

function total_cart_price() {
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
            $product_price = $row_product_price['product_price']; // Corrected this line
            $total += $product_price; // Sum the product prices directly (no need for an array)
        }
    }
    
    echo $total;
}



?>
