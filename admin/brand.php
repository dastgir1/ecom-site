<?php
// include header file
include '../front/include/config.php'; 
include 'includes/header.php'; 
include 'includes/navbar.php'; 
include 'includes/sidebar.php';

?>
<div class="container ">
    <h2 class="admin-heading mt-4 d-inline">All Brands</h2>
    <a class="fs-4 pull-right mx-3 text-decoration-none text-black d-inline mt-3" href="forms/add_brand.php"><button class="btn btn-primary mb-3">Add New</button></a>
   <?php
        $total_brands=mysqli_query($conn,"SELECT * FROM  brands ") ;
        if(mysqli_num_rows($total_brands)>0){

       
   ?>
    
    <table class="table table-striped table-hover table-bordered">
        <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php
            while ($row = mysqli_fetch_assoc($total_brands)){
                $catid=$row['brand_cat'];
                $cat=mysqli_query($conn,"SELECT * FROM categories WHERE cat_id=$catid");
                if(mysqli_num_rows($cat)>0){
                    $row1=mysqli_fetch_assoc($cat);
                    
                }
           
        ?>
            <tr>
                <td><?php echo $row['brand_id']; ?></td>
                <td><?php echo $row['brand_title']; ?></td>
                <td><?php echo $row1['cat_title']; ?></td>
                <td>
                    <a href="edit_brand.php?id=<?php echo $row['brand_id']; ?>"><i class="fa fa-cog fs-4 mx-3"></i></a>
                    <a class="delete_brand" href="delete_brand.php?id=<?php echo $row['brand_id']; ?>"><i class="fa fa-trash fs-4"></i></a>
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

<?php
//    include footer file
    include "includes/footer.php";
?>
