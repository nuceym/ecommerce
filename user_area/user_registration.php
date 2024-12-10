<?php 
include('../include/conect.php');
include('../functions/common_function.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Registration</title>
    <!-- Boostrap And Css Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <!---css Links -->
    <link rel="stylesheet" href="style.css" />
    <!-- Font Awesom Link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" 
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<a href="../index.php">Explore Products</a>
    <div class="container-fluid">
        <h2 class="text-center my-1">
            New User Registratin
        </h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!--- username feild ------>
                    <div class="form-outline mb-3">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomlete="off" required="required" name="user_username"/>

                    </div>
                    <!----- email feild      ---->
                    <div class="form-outline mb-3">
                        <label for="user_username" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomlete="off" required="required" name="user_email"/>

                    </div>
                     <!----- image feild      ---->
                     <div class="form-outline mb-3">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control" placeholder="Enter your email" autocomlete="off" required="required" name="user_image"/>

                    </div>
                    <!----- password feild      ---->
                    <div class="form-outline mb-3">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomlete="off" required="required" name="user_password"/>

                    </div>
                    <!----- conform password feild      ---->
                    <div class="form-outline mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" class="form-control" placeholder="Confirm password" autocomlete="off" required="required" name="confirm_password"/>

                    </div>
                      <!--- address feild ------>
                      <div class="form-outline mb-3">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomlete="off" required="required" name="user_address"/>

                    </div>
                    <!--- contact feild ------>
                    <div class="form-outline mb-3">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="number" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomlete="off" required="required" name="user_contact"/>

                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-1 px-3 border-0" name="user_register">
                        <h5 class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php" class="text-danger"> Login</a></h5>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>

<!-- php code  --->

<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIpaddress();

    

    // select query 
    $select_query="select * from `user_table` where user_username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username or Email already exist')</script>";
    }
        else if($user_password!=$confirm_password){
            echo "<script>alert('Password do not match')</script>";

        }
    else{
        // insert query 
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="insert into `user_table` (user_username,user_email,user_password,user_image,user_ip,
    user_address,user_mobile) values('$user_username','$user_email','$hash_password'
    ,'$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query); 

    }



    // selecting cart items
    $select_cart_items="select * from `cart_details` where
    ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['user_username']=$user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";

    }else{
        echo "<script>windows.open('.../index.php','_self')</script>";

    }



}

?>