<?php

include('../../front/include/config.php');
if(isset($_POST['submit'])){
    $cat_title= $_POST['cat_title'];
    $products=0;
    $record=mysqli_query($conn,"INSERT INTO categories(cat_title,products) VALUES('$cat_title',$products)");
    if($record){
        echo '<div class="alert alert-success"> Category added successfully.</div>';
        header('location: http://localhost/eccoo/admin/categories.php');
    }else{
        echo '<div class="alert alert-warning"> !Oops some thing went wrong category not added</div>';
    }
}
?>
<?php
include('../includes/header.php');

include('../includes/navbar.php');


include('../includes/sidebar.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="cat_title" class="form-control my-3" placeholder="Add category">
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
include('../includes/footer.php');
?>
