<?php include "includes/header.php";?>
<?php include "includes/navbar.php";?>
<?php include "includes/sidebar.php";?>
<div class="container " >
        <div class="row">
            <div class="col-md-12">
           
                <?php
                include('../front/include/config.php');
                $pro=mysqli_query($conn,"SELECT * FROM 	products");
                if(mysqli_num_rows($pro)>0){
                    
                    
                }
                $cat=mysqli_query($conn,"SELECT * FROM 	categories");
                if(mysqli_num_rows($cat)>0){
                    
                    
                }
                $subcat=mysqli_query($conn,"SELECT * FROM 	sub_categories");
                if(mysqli_num_rows($subcat)>0){
                    
                    
                }
                $brands=mysqli_query($conn,"SELECT * FROM 	brands");
                if(mysqli_num_rows($brands)>0){
                    
                    
                }
                $order=mysqli_query($conn,"SELECT * FROM 	order_products");
                if(mysqli_num_rows($order)>0){
                    
                    
                }
                $users=mysqli_query($conn,"SELECT * FROM 	user");
                if(mysqli_num_rows($order)>0){
                    
                    
                }
                ?>
                <div class="row pt-5">
                    <div class="card my-3 bg-danger text-center mx-3" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title text-white"><?php echo $pro->num_rows;?></h3>
                            <h4 class="card-subtitle mb-2 text-white">Products</h4>
                        </div>
                    </div>
                
                    <div class="card my-3 bg-danger text-center mx-3" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title text-white"><?php echo $cat->num_rows;?></h3>
                            <h4 class="card-subtitle mb-2 text-white">Categories</h4>
                        </div>
                    </div>
                     <div class="card my-3 bg-danger text-center mx-3" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title text-white"><?php echo $subcat->num_rows;?></h3>
                            <h4 class="card-subtitle mb-2 text-white">Sub-Categories</h4>
                        </div>
                    </div>
                    <div class="card my-3 bg-danger text-center mx-3" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title text-white"><?php echo $brands->num_rows;?></h3>
                            <h4 class="card-subtitle mb-2 text-white">Brands</h4>
                        </div>
                    </div>
                    <div class="card my-3 bg-danger text-center mx-3" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title text-white"><?php echo $order->num_rows;?></h3>
                            <h4 class="card-subtitle mb-2 text-white">Orders</h4>
                        </div>
                    </div>
                    <div class="card my-3 bg-danger text-center mx-3" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title text-white"><?php echo $users->num_rows;?></h3>
                            <h4 class="card-subtitle mb-2 text-white">Users</h4>
                        </div>
                    </div> 
                </div>
          
            </div>
        </div>
    </div>
<?php include "includes/footer.php";?>