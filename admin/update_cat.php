<?php
include('../front/include/config.php');
include('includes/header.php');

include('includes/navbar.php');


include('includes/sidebar.php');
$catid=$_GET['id'];

$record=mysqli_query($conn,"SELECT * FROM  categories WHERE cat_id=$catid");
if(mysqli_num_rows($record)>0){
   $row=mysqli_fetch_assoc($record);
   
}


?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="cat_title" class="form-control my-3" value="<?php echo $row['cat_title']; ?>">
                </div>
                <button type="submit" name="update" class="btn btn-primary mb-3">Save</button>
            </form>
            <?php
                if(isset($_POST['update'])){
                    $cat_title= $_POST['cat_title'];
                    $record=mysqli_query($conn,"UPDATE categories SET cat_title='$cat_title' WHERE cat_id=$catid");
                    if($record){
                        echo '<div class="alert alert-success"> record is updated successfully</div>';
                        header('location: http://localhost/eccoo/admin/categories.php');
                        exit;
                    }

                }
            ?>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>