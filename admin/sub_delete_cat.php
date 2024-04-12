<?php
include "../front/include/config.php";
$sub_catid=$_GET['id'];

$record=mysqli_query($conn,"DELETE FROM  sub_categories WHERE sub_cat_id=$sub_catid");
if($record){
    echo '<div class="alert alert-warning"> record is deleted</div>';
    header('location: http://localhost/eccoo/admin/sub_categories.php');
    exit;
}


?>