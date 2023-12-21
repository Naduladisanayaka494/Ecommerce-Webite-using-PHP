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
  <button class="btn btn-primary"onclick="location.href='index.php?edit_brands=<?php echo  $category_id?>'" >Edit</button>
  <i class='fa-solid fa-trash'></i>
</td>


       <td>
    <button type="button" class="btn btn-secondary"onclick="location.href='index.php?delete_brands=<?php echo  $category_id?>  data-toggle="modal" data-target="#exampleModal">
        Delete
    </button>
    <i class='fa-solid fa-trash'></i>
</td>

        </tr>
        <?php
            
                 }
            ?>
    </tbody>
</table>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brands=<?php echo  $category_id?>'  class="text-light text-decoration-none" >Yes</a></button>
      </div>
    </div>
  </div>
</div>