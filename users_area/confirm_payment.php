<?php
include('../includes/connect.php');
include('../functions/commonfunctions.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="Select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body class="bg-secondary">

    <div class="container my-5">
            <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="inovice_number" value="<?php echo $invoice_number?>">
            </div>
              <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo  $amount_due?>">
            </div>
          <div class="form-outline my-4 text-center w-50 m-auto">
               <select name="payment_mode" class="form-select w-50 m-auto">
                <option >Select payment mode</option>
                <option >UPI</option>
                <option>Netbanking</option>
                <option >paypal</option>
                <option>Cash on Delivery</option>
                <option >payoffline</option>
               </select>
            </div>
       <div class="form-outline my-4 text-center w-50 m-auto">
              <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment" >
            </div>
        </form>
    </div>
    
</body>
</html>