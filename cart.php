<!-- connect file --->
<?php 
include('include/conect.php');
include('functions/common_function.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce Website Cart_details</title>
    <!-- Boostrap And Css Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <!---css Links -->
    <link rel="stylesheet" href="style.css" />
    <style>
    .cart-img{
    width: 70px;
    height: 70px;
    object-fit:contain;
}
.logo{
    width: 15%;
    height:70px;
}

    </style>
    <!-- Font Awesom Link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" 
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First Child --->
        <nav class="navbar navbar-expand-lg navbar-light bg-info ">
  <div class="container-fluid">
    <img src="images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"><sup><?php cart_item(); ?></sup></i></a>
        </li>
        </ul>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
cart();
?>
<!--- Second Child  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
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
          <a class='nav-link' href='./user_area/user_login.php'>Login</a>
        </li>";

        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/logout.php'>Logout</a>
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

<!-- Fourth Child Table  ---->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            
              <!-- php code to display dynamic data --->

              <?php
              
              $get_ip_add = getIPAddress(); 
              $total_price=0;
              $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
              $result=mysqli_query($con,$cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count>0){
                echo " <thead>
                <tr>
                    <th>Produc Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr>
            </thead>
            <tbody>";

                while($row=mysqli_fetch_array($result)){
                $product_id=$row['product_id'];
                $select_products="select * from `products` where product_id='$product_id'";
                $result_products=mysqli_query($con,$select_products);
                while($row_product_price=mysqli_fetch_array($result_products)){
                  $product_price=array($row_product_price['product_price']);
                  $price_table=$row_product_price['product_price'];
                  $product_tiltle=$row_product_price['product_tiltle'];
                  $product_image1=$row_product_price['product_image1'];
                  $product_values=array_sum($product_price);
                  $total_price+=$product_values;
        
               

              ?>

                <tr>
                    <td><?php echo $product_tiltle?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1?>" alt="" class="cart-img"></td>
                    <td><input type="text" name="qty" id="" class="form-input w-50"></td>
                    <?php
                    $get_ip_add = getIPAddress(); 
                    if(isset($_POST['update_cart'])){
                      $quantities=$_POST['qty'];
                      $update="update `cart_details` set quantity=$quantities where
                      ip_address='$get_ip_add'";
                      $result_products_quantity=mysqli_query($con,$update);
                      $total_price=$total_price*$quantities;
                    }

                   
                    ?>
                    <td><?php echo $price_table?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id  ?>"></td>
                    <td>
                    <button name="update_cart" type="submit" value="Update Cart" class="btn btn-white border-secondary bg-white btn-md mb-2" >
                                    <i class="fas fa-sync"></i>
                                </button>
                                <button name="remove_cart" type="submit" value="Remove Cart" class="btn btn-white border-secondary bg-white btn-md mb-2" >
                                    <i class="fas fa-trash"></i>
                                </button>
                    </td>
                </tr>
               <?php

}
}      
}
else{
  echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
}



?>
                
            </tbody>
        </table>
        <!-- Subtotal ---->
        <?php
        $get_ip_add = getIPAddress(); 
        $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
        $result=mysqli_query($con,$cart_query);
        $result_count=mysqli_num_rows($result);
        if($result_count>0){
          echo "<div class='d-flex mb-5'>
          <h4 class='px-3'>
            Subtotal: <strong class='text-info'> $total_price  /-</strong></h4>
            <a href='./user_area/checkout.php' class='btn btn-primary mb-4 btn-lg pl-5 pr-5'>Checkout</a>
        </div>
        <div type='submit' value='continue_shopping' class='col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left'>
            <a href='index.php'>
                <i class='fas fa-arrow-left mr-2'></i> Continue Shopping</a>

          
        </div>";
        }else{
          echo "<div type='submit' value='continue_shopping' class='col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left'>
          <a href='index.php'>
              <i class='fas fa-arrow-left mr-2'></i> Continue Shopping</a>

        
      </div>";
        }
        if(isset($_POST['continue_shopping'])){
          echo "<script>open.window('index.php'),'_self'</script>";
        }

        ?>
        
</div></div></form>
<!-- function to remove item ----->

<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";

      }
    }
  }
}
echo $remove_item=remove_cart_item();



?>




<!--Last Child --->
    <!--include footer --->
    <?php
    include("./include/footer.php");



?>
    <!-- js Bootstrap Links -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
</body>
</html>