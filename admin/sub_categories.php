<?php 
include('../front/include/config.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

?>
<div class="container ">
    <div class="row  mt-5  justify-content-center">
        <div class="col">
            <h3 style="display: inline;">All Sub-Categories</h3>
        </div>
        <div class="col">
            <a href="forms/add_subcat.php"  > <button class="btn btn-primary">Add New </button></a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php
            $subcat= mysqli_query($conn,"SELECT * FROM sub_categories");
            if(mysqli_num_rows( $subcat)>0){
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th> Title</th>
                        <th> Category</th>
                        <th>Show in Header</th>
                        <th>Show in Footer</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($subcat)){
                            
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['sub_cat_id'];?>
                        </td>
                        <td>
                        <?php echo $row['sub_cat_title'];?>
                        </td>
                        <td>
                        <?php echo $row['cat_parent'];?>
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    
                            </div>
                        </td>
                        <td>
                        <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    
                            </div>
                        </td>
                        <td>
                         <a href="http://localhost/eccoo/admin/sub_update_cat.php?id= <?php echo $row['sub_cat_id'];?>"><button type="button" class="btn btn-primary "><i class="fa fa-cog"></i></button></a>
                        <a href="http://localhost/eccoo/admin/sub_delete_cat.php?id= <?php echo $row['sub_cat_id'];?>"><button type="submit" class="btn btn-primary "><i class="fa fa-remove"></i></button></a> 
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