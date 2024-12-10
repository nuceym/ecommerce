
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Document</title>
</head>
<body>
    <?php

$username=$_SESSION['user_username'];
$get_user="select * from `user_table` where user_username='$username'";
$result=mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];
//echo $user_id;

    ?>
<h3 class="text-success">All My Orders</h3>
<table class="table table-responsive mt-5">
    <tr>
        <thead class="bg-info">
        <th>SI no</th>
        <th>Amount Due</th>
        <th>Invoice Number</th>
        <th>Total Products</th>
        <th>Date</th>
        <th>Cmplete/Incomlete</th>
        <th>Status</th>
    </tr></thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_order_details="select * from `user_orders` where user_id=$user_id";
        $result_orders=mysqli_query($con,$get_order_details);
        $number=1;
        while($row_orders=mysqli_fetch_assoc($result_orders)){
            $order_id=$row_orders['order_id'];
            $amount_due=$row_orders['amount_due'];
            $invoice_number=$row_orders['invoice_number'];
            $total_products=$row_orders['total_products'];
            $order_date=$row_orders['order_date'];
            $order_status=$row_orders['order_status'];
            if($order_status =='pending'){
                $order_status='incomplete';
            }else{
                $order_status='Complete';
            }
            
            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>";
            ?>

            <?php
            if($order_status=='Complate'){
                echo "<td>Paid</td>";
            }else{
                echo"<td> <a href='confirm_payment.php?order_id=$order_id' 
            class='text-light'>Confirm</a> </td>
            </tr>";
            }
            $number++;

        }

        ?>
        
    </tbody>
</table>
<!-- js Bootstrap Links -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
</body>
</html>