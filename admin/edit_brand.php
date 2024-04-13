<?php
    include('../front/include/config.php');
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/sidebar.php');
    $brand_id=$_GET['id'];
    $brand=mysqli_query($conn,"SELECT * FROM brands WHERE brand_id=$brand_id");
    if(mysqli_num_rows($brand)>0){
        $row=mysqli_fetch_assoc($brand);

    }

?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="brand_title" class="form-control my-3" value="<?php echo $row['brand_title'];?>">
                </div>
                <button type="submit" name="update" class="btn btn-primary mb-3">Update</button>
            </form>
        </div>
    </div>
</div>

<?php

if(isset($_POST['update'])){
    $newbrand_title=$_POST['brand_title'];
    
    
    // Assuming $conn is your database connection object
    $stmt = $conn->prepare("UPDATE brands SET brand_title=? WHERE brand_id=?");
    $stmt->bind_param("si", $newbrand_title, $brand_id); // Assuming $sub_cat_id is available
    $stmt->execute();

    if($stmt->affected_rows > 0){ // Check if any rows were affected
        echo '<div class="alert alert-success">brand updated successfully.</div>';
        header('location: http://localhost/eccoo/admin/brand.php');
        exit; // Terminate script after redirection
    } else {
        echo '<div class="alert alert-warning">Oops! Something went wrong, brand not updated.</div>';
    }
}
include('includes/footer.php');
?>