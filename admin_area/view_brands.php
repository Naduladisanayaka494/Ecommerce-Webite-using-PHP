<h3 class="text-center text-success">
All Categories
</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>slno</th>
            <th>Brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat="Select * from `brands`";
        $result=mysqli_query($con, $select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc( $result)){
            $category_id=$row['brand_id'];
            $category_title=$row['brand_title'];
            $number++;
   
        ?>
        <tr>
            
            <td><?php echo $number;?></td>
            <td><?php echo $category_title;?></td>
               <td>
  <button onclick="location.href='index.php?edit_products=<?php echo $product_id?>'" class='text-light'>Edit</button>
  <i class='fa-solid fa-trash'></i>
</td>


             <td>  <button onclick="location.href='index.php?delete_products=<?php echo $product_id?>'" class='text-light'>Delete</button>
  <i class='fa-solid fa-trash'></i></td>
        </tr>
        <?php
            
                 }
            ?>
    </tbody>
</table>