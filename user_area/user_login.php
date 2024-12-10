<?php 
include('../include/conect.php');
include('../functions/common_function.php');
@session_start();


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
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center my-3">
            User Login
        </h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!--- username feild ------>
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomlete="off" required="required" name="user_username"/>

                    </div>
                   
                    <!----- password feild      ---->
                    <div class="form-outline mb-5">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomlete="off" required="required" name="user_password"/>

                    </div>
                   
                     
                   
                    <div class="mt-4 pt-2 mb-5">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <h5 class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_registration.php" class="text-danger"> Register</a></h5>
                    </div>
                </form>

            </div>
        </div>
    </div>
     <!-- js Bootstrap Links -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
    
</body>
</html>

<!----- php code ---->


<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];


    $select_query="select * from `user_table` where
    user_username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();



    // cart item
    $select_query_cart="select * from `cart_details` where
    ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['user_username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
           // echo "<script>alert('Login successful')</script>";
        if($row_count==1 and $row_count_cart==0){
            $_SESSION['user_username']=$user_username;
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }else{
            $_SESSION['user_username']=$user_username;
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('payment.php','_self')</script>";
        }
        }else{
        echo "<script>alert('Invalid Credentials')</script>"; 
        }

    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }

    

    
}


?>



