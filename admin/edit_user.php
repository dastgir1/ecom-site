

<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('../front/include/config.php');
 $user_id=$_GET['id'];
 $user=mysqli_query($conn,"SELECT * FROM user WHERE user_id=$user_id");
 if(mysqli_num_rows($user)>0){
    $row=mysqli_fetch_assoc($user);
   
 }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-3">
            <center><h3>Admin Update</h3></center>
            <form action="" method="POST">
                <div class="form-floating">
                    <input type="text" name="f_name" class="form-control my-3" id="floatingInput" value="<?php echo $row['f_name']; ?>">
                    <label for="floatingInput">Firstname</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="l_name" class="form-control my-3" id="floatingInput" value="<?php echo $row['l_name']; ?>">
                    <label for="floatingInput">Lastname</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="username" class="form-control my-3" id="floatingInput" value="<?php echo $row['username']; ?>">
                    <label for="floatingInput">username</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control my-3" id="floatingInput" value="<?php echo $row['password']; ?>">
                    <label for="floatingInput">password</label>
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control  my-3" id="floatingInput" value="<?php echo $row['email']; ?>">
                    <label for="floatingInput">E-Mail</label>
                </div>
                <div class="form-floating">
                    <input type="number" name="mobile" class="form-control my-3" id="floatingInput" value="<?php echo $row['mobile']; ?>">
                    <label for="floatingInput">Mobile</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="address" class="form-control my-3" id="floatingInput" value="<?php echo $row['address']; ?>">
                    <label for="floatingInput">Address</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="city" class="form-control my-3" id="floatingInput" value="<?php echo $row['city']; ?>">
                    <label for="floatingInput">City</label>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" name="update" class="btn btn-primary btn-lg mb-3">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['update'])){
    $newf_name = $_POST['f_name'];
    $newl_name = $_POST['l_name'];
    $newusername = $_POST['username'];
    $newemail = $_POST['email'];
    $newpassword = $_POST['password'];
    $newmobile = $_POST['mobile'];
    $newaddress = $_POST['address'];
    $newcity = $_POST['city'];
    
    // Prepare the SQL statement using prepared statements
    $stmt = $conn->prepare("UPDATE user SET f_name=?, l_name=?, username=?, email=?, password=?, mobile=?, address=?, city=? WHERE user_id=?");
    $stmt->bind_param("ssssssssi", $newf_name, $newl_name, $newusername, $newemail, $newpassword, $newmobile, $newaddress, $newcity, $user_id);
    
   
   // Execute the statement
   if($stmt->execute()){
    echo '<div class="alert alert-success">User updated successfully.</div>';
    echo '<meta http-equiv="refresh" content="0; URL=http://localhost/eccoo/admin/users.php">'; // Use meta refresh instead of header
    exit(); // Add exit() after meta refresh to stop further execution
}else{
    echo '<div class="alert alert-warning">Oops! Something went wrong. User not updated.</div>';
}
    
    // Close the statement
    $stmt->close();
}

include('includes/footer.php');
?>

