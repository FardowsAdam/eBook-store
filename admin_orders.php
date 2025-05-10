<?php

include 'config.php' ;

session_start();

// Check if the user is logged in
$admin_id=$_SESSION['admin_id'];

// If the session variable is not set, redirect to login page
if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['update_order'])){

   $order_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];

   mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_id'") or die('query failed');
   $message[]='payment status has been updated'; 
   header('location:admin_orders.php');

}

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_orders.php');

}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>orders</title>

           <!-- font awesome cdn link -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

        <!-- customm admin css file link -->
        <link rel="stylesheet" href="./css/admin_style.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <?php include 'admin_header.php'; ?>
        <section class="orders">
            <h1 class="title">placed orders</h1>
            <div class="box-container">
                <?php
                    $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                    if(mysqli_num_rows($select_orders) > 0){
                        while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                ?>
                <div class="box">
                    <p> user id : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
                    <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
                    <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
                    <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
                    <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
                    <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
                    <p> total products : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
                    <p> total price : <span>$<?php echo $fetch_orders['total_price']; ?></span> </p>
                    <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>

                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">

                        <select name="update_payment">
                            <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                            <option value="pending">pending</option>
                            <option value="completed">completed</option>
                        </select>
                        <div class="button-group">
                            <input type="submit" value="update" name="update_order" class="option-btn">
                            <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
                        </div>

                    </form>

                </div>
                <?php
                        }
                    }else{
                        echo '<p class="empty">no orders placed yet!</p>';
                    }
                ?>
            </div>
        </section>
  
    

       <!-- custom js file link -->
       <script src="js/admin_script.js"></script>

    </body>
</html>