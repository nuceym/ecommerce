<!-- connect file --->
<?php 
include('../include/conect.php');
session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce Website checkout page</title>
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
.logo{
    width: 15%;
    height:70px;
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First Child --->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="../images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../user_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        
        
      </ul>
      
    </div>
  </div>
</nav>


<!--- Second Child  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  <li class="nav-item">
  <?php
        if(!isset($_SESSION['user_username'])){
          echo "<a class='nav-link' href='#'>Welcome Guest</a>
          </li>";

        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['user_username']."</a>
        </li>";

        }

        if(!isset($_SESSION['user_username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='login.php'>Login</a>
        </li>";

        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='logout.php'>Logout</a>
        </li>";

        }



?>
        
        
  </ul>
</nav>

<!--Third Child -->
<div class="bg-light">
  <h3 class="text-center">Hiden Store</h3>
  <p class="text-center">Communications is at the heart of e-Commerce and community</p>
</div>


<!--Fourth Child -->
<div class="row px-1 pt-0">
  <div class="col md-12">
    <!-- products --->
    <div class="row">
        <?php
        if(!isset($_SESSION['user_username'])){
include('user_login.php');
        }else{
            include('payment.php');
        }
        ?>
        

    

      
    </div>
    </div>
    

<!--Last Child --->
    <!--include footer --->
    <?php
    include("../include/footer.php")?>
</div>
    <!-- js Bootstrap Links -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
</body>
</html>