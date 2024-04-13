<?php
include "../front/include/config.php";
$brand_id=$_GET['id'];

$record=mysqli_query($conn,"DELETE FROM  brands WHERE brand_id=$brand_id");
if($record){
    echo '<div class="alert alert-warning"> record is deleted</div>';
    header('location: http://localhost/eccoo/admin/brand.php');
    exit;
}


?>