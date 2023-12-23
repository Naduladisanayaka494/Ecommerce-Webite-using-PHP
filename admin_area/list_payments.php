<h3 class="text-center text-success">AllPayements</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_payments="Select * from `user_payments`";
        $result=mysqli_query($con,  $get_payments);
        $row_count=mysqli_num_rows(  $result);
        echo "    <tr>
           <th>sl no</th>
           <th>Invoice number</th>
           <th>Amount</th>
           <th>Payment ModeDate</th>
           <th>Order Date</th>
           <th>delete</th>
       

        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";

    if($row_count==0){
        echo "<h2 class='bg-danger text-center mt-5'>No Payments yet</h2>";
    }else{
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $payment_id=$row_data['payment_id'];
            $order_id=$row_data['order_id'];
            $amount=$row_data['amount'];
            $invoice_number=$row_data['invoice_number'];
            $payment_mode=$row_data['payment_mode'];
            $date=$row_data['date'];
            $number++;
            echo "
            <th>  $number</th>
            <th>  $invoice_number</th>
            <th>    $amount</th>
            <th>  $payment_mode</th>
            <th>   $date</th>
       <th>
    <button type='button' class='btn btn-secondary' onclick='location.href='list_orders.php?delete_order=<?php echo $order_id ?>
        Delete
    </button>
</th>

        </tr>";
        }

    }
        ?>
    
    </tbody>

</table>
