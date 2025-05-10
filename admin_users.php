<?php

include 'config.php' ;

session_start();

// Check if the user is logged in
$admin_id=$_SESSION['admin_id'];

// If the session variable is not set, redirect to login page
if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_users.php');
 
 }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>users</title>

           <!-- font awesome cdn link -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

        <!-- customm admin css file link -->
        <link rel="stylesheet" href="./css/admin_style.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <?php include 'admin_header.php'; ?>
        

        <!-- section for displaying users -->
        <section class="users">
            <h1 class="title">users accounts</h1>

            <div class="box-container">

                <?php
                    $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
                    if(mysqli_num_rows($select_users) > 0){
                        while($fetch_users = mysqli_fetch_assoc($select_users)){
                ?>
                <div class="box">
                    <p> username : <span><?php echo $fetch_users['name']; ?></span> </p>
                    <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
                    <p> user type : <span style="color: <?php if($fetch_users['user_type']== 'admin'){echo 'var(--orange)';}?>"><?php echo $fetch_users['user_type']; ?></span> </p>
                    <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
                </div>
                <?php
                        }
                    }else{
                        echo '<p class="empty">no users added yet!</p>';
                    }
                ?>

            </div>
        <!-- end of the section for user displaying -->
    
    

       <!-- custom js file link -->
       <script src="js/admin_script.js"></script>

    </body>
</html>