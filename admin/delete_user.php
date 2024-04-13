<?php

include('../front/include/config.php');
 $user_id=$_GET['id'];
 $record=mysqli_query($conn,"DELETE FROM  user WHERE user_id=$user_id");
if($record){
    echo '<div class="alert alert-warning"> record is deleted</div>';
    header('location: http://localhost/eccoo/admin/users.php');
    exit;
}
   
 
?>