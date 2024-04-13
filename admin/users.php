<?php
// include header file
    include '../front/include/config.php'; 
    include 'includes/header.php'; 
    include 'includes/navbar.php'; 
    include 'includes/sidebar.php'; 
    
    ?>
    <div class="container  pt-5">
        <div class="row d-flex ">
            <div class="col-md-3">
                <h2 class="admin-heading ">All Users</h2>
                
            </div>
            <div class="col-md-3">
                <form action="" method="" >
                    <div class="form-group d-flex">
                        <input type="search" class="form-control" placeholder="search here...">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

            </div>
            <div class="col-md-3 ">
                <a href="forms/add_user.php"><button class="btn btn-primary ">Add New User</button></a>

            </div>

        </div>
        <?php
        $limit=10;
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }else{
            $page=1;
        }
        $offset=($page-1)*$limit;
        $users=mysqli_query($conn,"SELECT * FROM user LIMIT {$offset},{$limit}");
        if(mysqli_num_rows($users)>0){
            
      
        ?>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <th>User ID</th>
                <th>Full Name</th>
                <th>E-Mail</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>City</th>
                <th>User Role</th>
                <th >Action</th>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($users)){                       
                ?>
                <tr>
                    <td><?php echo $row['user_id'];?></td>
                    <td><?php echo $row['f_name']." ".$row['l_name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['city'];?></td>
                    <td>
                        <?php
                            if($row['user_role']==1){
                                echo "Admin";
                            }else{
                                echo "User";
                            }
                        ?>
                    </td>
                    <td class="d-flex">
                       
                         
                        <a class="btn btn-xs btn-primary edit_user mx-3" href="edit_user.php?id=<?php echo $row['user_id'];?>" ><i class="fa fa-cog"></i></a>
                        <a class="btn btn-xs btn-danger delete_user" href="delete_user.php?id=<?php echo $row['user_id'];?>" ><i class="fa fa-trash"></i></a>

                    </td>
                </tr>
                <?php
                
                    
                }
                ?>
            </tbody>
        </table>
        <?php
     
            
            }
            //start pagination 
            $record=mysqli_query($conn,"SELECT* FROM user");
            if(mysqli_num_rows($record)>0){
                $rows=mysqli_fetch_array($record);
                $total_user=count($rows);
                $limit=10;
                $total_pages=ceil($total_user/$limit);
                echo '<nav aria-label="Page navigation example">';
                echo '<ul class="pagination">';
                echo ' <li class="page-item"><a class="page-link" href="users.php?page='.($page-1).'">Previous</a></li>';
                for($i=1; $i <= $total_pages; $i++){
                    if($i==$page){
                        $active='active';
                    }else{
                        $active="";
                    }
                    echo '<li class="page-item '.$active.'"><a class="page-link" href="users.php?page='.$i.'">'.$i.'</a></li>';
                }
                if($total_pages > $page){
                    echo '<li class="page-item"><a class="page-link" href="users.php?page='.($page+1).'">Next</a></li>';

                }
                echo '</ul>';
                echo '</nav>';
            }
        ?>
        
        <!--end pagination -->         
    </div>

<?php
//    include footer file
include "includes/footer.php";
?>
