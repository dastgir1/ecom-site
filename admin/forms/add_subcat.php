<?php

include('../../front/include/config.php');
include('../includes/header.php');
include('../includes/navbar.php');
include('../includes/sidebar.php');

if(isset($_POST['submit'])){
   echo $sub_cat_title= $_POST['sub_cat_title'];
   echo $cat_parent= $_POST['cat_parent'];
    $cat_products=0;
    $show_in_header=0;
    $show_in_footer=0;
    $record=mysqli_query($conn,"INSERT INTO sub_categories(sub_cat_title,cat_parent,cat_products,show_in_header,show_in_footer) VALUES('$sub_cat_title','$cat_parent',$cat_products,$show_in_header,$show_in_footer)");
    if($record){
        echo '<div class="alert alert-success"> Category added successfully.</div>';
        header('location: http://localhost/eccoo/admin/sub_categories.php');
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
                    <input type="text" name="sub_cat_title" class="form-control my-3" placeholder="Add sub category">
                </div>
                <div class="form-group">
                <select name="cat_parent" class="form-control mb-3">
                    <option value="" selected>select category</option>
                    <?php
                    $cat_title = mysqli_query($conn, "SELECT * FROM categories");
                    if(mysqli_num_rows($cat_title) > 0){
                        while($row = mysqli_fetch_assoc($cat_title)){
                            echo "<option value='" . $row['cat_id'] . "'>" . $row['cat_title'] . "</option>";
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
include('../includes/footer.php');
?>
