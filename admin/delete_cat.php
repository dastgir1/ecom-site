<?php
include('../front/include/config.php');
$catid=$_GET['id'];

$record=mysqli_query($conn,"DELETE FROM  categories WHERE cat_id=$catid");
if($record){
    echo '<div class="alert alert-warning"> record is deleted</div>';
    header('location: http://localhost/eccoo/admin/categories.php');
    exit;
}

?>