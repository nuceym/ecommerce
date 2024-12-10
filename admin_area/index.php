<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <!--- Bootstrap ccs link      --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

    <!-- Font Awesom Link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" 
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file--->
    <link rel="stylesheet" href="../style.css">
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
    <!-- navbar  --->
    <div class="container-fluid p-0">
        <!-- First Child  -->
        <nav class="navbar navbar-expend-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../images/logo.png" alt="" class="logo">
        <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">Welcome Guest</a>
                </li>
            </ul>
        </nav>
        </div>
        </nav>

        <!--- Second Child --->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!--- third child --->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">

            <div class="p-3">
            <a href=""><img src="../images/mango.png" alt="" class="admin_image"></a>
            <p class="text-light text-center">Admin Name</p>
        
        <div class="button text-center">
            <button><a href="insert_product.php" class="nav-link text-light 
            bg-info my-1">Insert Products</a></button>
            <button><a href="" class="nav-link text-light 
            bg-info my-1">View Products</a></button>
            <button><a href="index.php?insert_categroy" class="nav-link text-light 
            bg-info my-1">Insert Categories</a></button>
            <button><a href="" class="nav-link text-light 
            bg-info my-1">View Categories</a></button>
            <button><a href="index.php?insert_brands" class="nav-link text-light 
            bg-info my-1">Insert Brands</a></button>
            <button><a href="" class="nav-link text-light 
            bg-info my-1">View Brands</a></button>
            <button><a href="" class="nav-link text-light 
            bg-info my-1">All Orders</a></button>
            <button><a href="" class="nav-link text-light 
            bg-info my-1">All Payments</a></button>
            <button><a href="" class="nav-link text-light 
            bg-info my-1">List Users</a></button>
            <button><a href="" class="nav-link text-light 
            bg-info my-1">Logout</a></button>
        </div>
        </div>
        </div></div>
    </div>

    <!--- fourth child   --->

    <div class="container my-3">
      <?php
      if(isset($_GET['insert_categroy'])){
         include('insert_categries.php');
      }
      if(isset($_GET['insert_brands'])){
        include('insert_brands.php');
     }
      ?>  
    </div>
<!--Last Child --->
<div class="bg-info p-3 text-center footer">
      <p>All Right Reserved By Hassan </p> 
     </div> 
</body>
    <!--- Bootstrap js link      --->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
</html>