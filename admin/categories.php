<?php 
include('../front/include/config.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

?>
<div class="container ">
    <div class="row  mt-5 justify-content-center">
        <div class="col">
            <h3 style="display: inline;">All Categories</h3>
        </div>
        <div class="col">
            <a href="forms/add_cat.php"  > <button class="btn btn-primary">Add New </button></a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php
            $cat= mysqli_query($conn,"SELECT * FROM categories");
            if(mysqli_num_rows( $cat)>0){
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th> Title</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($cat)){
                            
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['cat_id'];?>
                        </td>
                        <td>
                        <?php echo $row['cat_title'];?>
                        </td>
                        <td>
                        <a href="http://localhost/eccoo/admin/update_cat.php?id= <?php echo $row['cat_id'];?>"><button type="button" class="btn btn-primary "><i class="fa fa-cog"></i></button></a>
                                <a href="http://localhost/eccoo/admin/delete_cat.php?id= <?php echo $row['cat_id'];?>"><button type="submit" class="btn btn-primary "><i class="fa fa-remove"></i></button></a>
                        </td>
                    </tr>
                    <?php
                        }

                    ?>
                </tbody>
            </table>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php 

include('includes/footer.php');
?>