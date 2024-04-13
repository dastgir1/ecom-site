<?php
include('../../front/include/config.php');
include('../includes/header.php');
include('../includes/navbar.php');
include('../includes/sidebar.php');

if(isset($_POST['submit'])){
    $brand_title= $_POST['brand_title'];
    $brand_cat=9;
    $record=mysqli_query($conn,"INSERT INTO brands(brand_title,brand_cat) VALUES('$brand_title',$brand_cat)");
    if($record){
        echo '<div class="alert alert-success"> Category added successfully.</div>';
        header('location: http://localhost/eccoo/admin/brand.php');
    }else{
        echo '<div class="alert alert-warning"> !Oops some thing went wrong category not added</div>';
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="brand_title" class="form-control my-3" placeholder="Add brand">
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
include('../includes/footer.php');
?>
