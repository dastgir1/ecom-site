<?php
include('../includes/header.php');
include('../includes/navbar.php');
include('../includes/sidebar.php');
include('../../front/include/config.php');
if(isset($_POST['submit'])){
    $f_name= $_POST['f_name'];
    $l_name= $_POST['l_name'];
    $email= $_POST['email'];
    $mobile= $_POST['mobile'];
    $address= $_POST['address'];
    $city= $_POST['city'];
    $user_role= $_POST['user_role'];
    $username= $_POST['username'];
    $password= md5($_POST['password']);
   
    $record=mysqli_query($conn,"INSERT INTO user(f_name,l_name,username,email,password,mobile,address,city,user_role) VALUES('$f_name','$l_name','$username','$email','$password','$mobile','$address','$city',$user_role)");
    if($record){
        echo '<div class="alert alert-success"> user added successfully.</div>';
        header('location: http://localhost/eccoo/admin/users.php');
    }else{
        echo '<div class="alert alert-warning"> !Oops some thing went wrong user not added</div>';
    }
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-3">
            <center><h3>Admin Sign-up</h3></center>
            <form action="" method="POST">
                <div class="form-floating">
                    <input type="text" name="f_name" class="form-control my-3" id="floatingInput" placeholder="Enter firstname">
                    <label for="floatingInput">Firstname</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="l_name" class="form-control my-3" id="floatingInput" placeholder="Enter lastname">
                    <label for="floatingInput">Lastname</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="username" class="form-control my-3" id="floatingInput" placeholder="Enter username">
                    <label for="floatingInput">username</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control my-3" id="floatingInput" placeholder="Enter password">
                    <label for="floatingInput">password</label>
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control  my-3" id="floatingInput" placeholder="Enter email">
                    <label for="floatingInput">E-Mail</label>
                </div>
                <div class="form-floating">
                    <input type="number" name="mobile" class="form-control my-3" id="floatingInput" placeholder="Enter moblie">
                    <label for="floatingInput">Mobile</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="address" class="form-control my-3" id="floatingInput" placeholder="Enter address">
                    <label for="floatingInput">Address</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="city" class="form-control my-3" id="floatingInput" placeholder="Enter city">
                    <label for="floatingInput">City</label>
                </div>
                <div class="form-group">
                    <input type="hidden" name="user_role"  value="1">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg mb-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include('../includes/footer.php');
?>
