
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
<?php
$username = $_SESSION['username'];
$get_user = "SELECT * FROM `user_table` WHERE username='$username'";
$result = mysqli_query($con, $get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];
echo "$user_id";

$number = 1; // Initialize $number here

?>
    <h3 class="text-center text success">All My Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
        <tr>
            <th>Sl no</th>
            <th>Amount Due</th>
            <th>Total products</th>
            <th>Invoice number</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
        </tr>
        </thead>
<tbody class="bg-secondry text-light">
    <?php

    $get_order_details = "SELECT * FROM `user_orders` WHERE user_id='$user_id'";
    $result_orders = mysqli_query($con, $get_order_details);

    while ($row_data = mysqli_fetch_assoc($result_orders)) {
        $order_id = $row_data['order_id'];
        $amount_due = $row_data['amount_due'];
        $total_products = $row_data['total_products'];
        $invoice_number = $row_data['invoice_number'];
        $order_status = $row_data['order_status'];
        if($order_status=='pending'){
            $order_status='Incomplete';
        }else{
            $order_status='complete'; 
        }
        $order_date = $row_data['order_date'];

        echo "<tr>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$total_products</td>
        <td>$invoice_number</td>
        <td>$order_date</td>
        <td>$order_status</td>";
        ?>
       <?php
       if($order_status=='complete'){
        echo "<td>Paid</td>";
       }else{
        echo  "<td><button class='btn btn-primary'><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></button></td>
        </tr>";
       }

        $number++; // Increment $number for the next row
    }

    ?>

</tbody>
    </table>
    
</body>
</html>