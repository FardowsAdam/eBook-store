<?php

include 'config.php' ;

session_start();

// Check if the user is logged in
$admin_id=$_SESSION['admin_id'];

// If the session variable is not set, redirect to login page
if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>admin panel</title>

           <!-- font awesome cdn link -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

        <!-- customm admin css file link -->
        <link rel="stylesheet" href="./css/admin_style.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <?php include 'admin_header.php'; ?>

        <!-- admin dashboard section start -->

        <section class="dashboard">


            <h1 class="title">dashboard</h1>



            <div class="box-container">
                <!-- 1 -->
                <div class="box">
                    <?php
                        $total_pending = 0;
                        $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders`
                                        where payment_status='pending'") or die('query failed');

                        if(mysqli_num_rows($select_pending) > 0){
                            while($fetch_pending = mysqli_fetch_assoc($select_pending)){
                                $total_pending += $fetch_pending['total_price'];
                            };
                        };
                    ?>  
                    <h3><?php echo $total_pending; ?></h3> 
                    <p>total pending</p>
                </div>
                <!-- 2 -->
                <div class="box">
                    <?php
                        $total_completed = 0;
                        $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders`
                                        where payment_status='completed'") or die('query failed');

                        if(mysqli_num_rows($select_completed) > 0){
                            while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                                $total_completed += $fetch_completed['total_price'];
                            };
                        };
                    ?>  
                    <h3><?php echo $total_completed; ?></h3> 
                    <p>completed payments</p>
                </div>

                <!-- 3 -->
                <div class="box">
                    <?php
                        $total_orders = 0;
                        $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');

                        if(mysqli_num_rows($select_orders) > 0){
                            $total_orders = mysqli_num_rows($select_orders);
                        };
                    ?>  
                    <h3><?php echo $total_orders; ?></h3> 
                    <p>orders placed</p>
                </div>

                <!-- 4 -->
                <div class="box">
                    <?php
                        $total_products = 0;
                        $select_products= mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');

                        if(mysqli_num_rows( $select_products) > 0){
                            $total_products = mysqli_num_rows($select_products);
                        };
                    ?>  
                    <h3><?php echo $total_products ; ?></h3> 
                    <p>products added</p>
                </div>
                

                <!-- 5 -->
                <div class="box">
                    <?php
                        $total_users = 0;
                        $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type= 'user'") or die('query failed');

                        if(mysqli_num_rows($select_users) > 0){
                            $total_users = mysqli_num_rows($select_users);
                        };
                    ?>  
                    <h3><?php echo $total_users; ?></h3> 
                    <p>total users</p>
                </div>

                <!-- 6 -->
                <div class="box">
                    <?php
                        $total_admins = 0;
                        $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type= 'admin'") or die('query failed');

                        if(mysqli_num_rows($select_admins) > 0){
                            $total_admins = mysqli_num_rows($select_admins);
                        };
                    ?>  
                    <h3><?php echo $total_admins; ?></h3> 
                    <p>total admins</p>
                </div>

                <!-- 7 -->
                <div class="box">
                    <?php
                        $total_account = 0;
                        $select_account = mysqli_query($conn, "SELECT * FROM `users` ") or die('query failed');

                        if(mysqli_num_rows($select_account) > 0){
                            $total_account = mysqli_num_rows($select_account);
                        };
                    ?>  
                    <h3><?php echo $total_account; ?></h3> 
                    <p>total account</p>
                </div>

                <!-- 8 -->
                <div class="box">
                    <?php
                        $total_messages = 0;
                        $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');

                        if(mysqli_num_rows($select_messages) > 0){
                            $total_messages = mysqli_num_rows($select_messages);
                        };
                    ?>  
                    <h3><?php echo $total_messages; ?></h3> 
                    <p>new messages</p>
                </div>

            </div>
        </section>

        <!-- admin dashboard section end  -->
    

       <!-- custom js file link -->
       <script src="js/admin_script.js"></script>

    </body>
</html>