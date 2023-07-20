<?php
 
 $con=mysqli_connect('localhost','root','','ecommerce');
 if(!$con){
    echo "connection successful";
 }else{
    die(mysqli_error($con));
 }


?>