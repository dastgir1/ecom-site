<?php
include "../front/include/config.php";
include('includes/header.php');
$sub_cat_id=$_GET['id'];
$sub_cat=mysqli_query($conn,"SELECT * FROM sub_categories WHERE  sub_cat_id = $sub_cat_id");
if(mysqli_num_rows($sub_cat)>0){
    $row=mysqli_fetch_assoc($sub_cat);
   
   $sub_cat_title=$row['sub_cat_title'];
   $sub_cat_id=$row['sub_cat_id'];
   
    $cat_id=$row['cat_parent'];
}
$cat=mysqli_query($conn,"SELECT* FROM categories WHERE cat_id=$cat_id");
if(mysqli_num_rows($cat)>0){
    $row1=mysqli_fetch_assoc($cat);
   
    $cat_title=$row1['cat_title'];

}

?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="sub_cat_title" class="form-control my-3" value="<?php echo $sub_cat_title; ?>">
                </div>
                <div class="form-group">
                <select name="cat_parent" class="form-control mb-3">
                    <option value="" selected><?php echo $cat_title; ?></option>
                    <?php
                    $cat_titles = mysqli_query($conn, "SELECT * FROM categories");
                    if(mysqli_num_rows($cat_titles) > 0){
                        while($row2 = mysqli_fetch_assoc($cat_titles)){
                            echo "<option value='" . $row2['cat_id'] . "'>" . $row2['cat_title'] . "</option>";
                        }
                    }
                    ?>
                </select>

                    
                   
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
            </form>

        </div>
    </div>
</div>
<?php
if(isset($_POST['submit'])){
    $newsub_cat_t = $_POST['sub_cat_title'];
    $newcat_parent = $_POST['cat_parent'];
    
    // Assuming $conn is your database connection object
    $stmt = $conn->prepare("UPDATE sub_categories SET sub_cat_title=? WHERE sub_cat_id=?");
    $stmt->bind_param("si", $newsub_cat_t, $sub_cat_id); // Assuming $sub_cat_id is available
    $stmt->execute();

    if($stmt->affected_rows > 0){ // Check if any rows were affected
        echo '<div class="alert alert-success">Sub Category updated successfully.</div>';
        header('location: http://localhost/eccoo/admin/sub_categories.php');
        exit; // Terminate script after redirection
    } else {
        echo '<div class="alert alert-warning">Oops! Something went wrong, category not updated.</div>';
    }
}
include('includes/footer.php');
?>