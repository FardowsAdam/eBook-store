<?php

include 'config.php' ;

session_start();

// Check if the user is logged in
$admin_id=$_SESSION['admin_id'];

// If the session variable is not set, redirect to login page
if(!isset($admin_id)){
   header('location:login.php');
}
   


//add product
if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $price = $_POST['price'];
   $image = $_FILES['image']['name'];
   $image_size= $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'upload_img/'.$image;

   // Check if the product already exists
   $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE name = '$name'") or die('query failed');
   if(mysqli_num_rows($select_product) > 0){
      $message[] = 'product already exists';
   }else{
      // Insert the new product into the database
      $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$name', '$price', '$image')") or die('query failed');
      if($add_product_query){
        if($image_size > 2000000){
            $message[] = 'image size is too large';
        }
        else {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'new product added successfully';
            header('location: admin_products.php'); // ✅ Redirect to clear URL
            exit();
        }
         
      }else{
         $message[] = 'could not add the product';
      }
   }
}

// Delete product
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('upload_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_products.php');
}



// Update product
if(isset($_POST['update_product'])){

    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];

    mysqli_query($conn, "UPDATE `products` SET name='$update_name', price='$update_price' WHERE id='$update_p_id'") or die('query failed');
    
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_folder= 'upload_img/'.$update_image;
    $update_old_image = $_POST['update_old_image'];
 
    if(!empty($update_image_size )){
       if($image_size > 2000000){
          $message[] = 'image size is too large';
       }else{
          mysqli_query($conn, "UPDATE `products` SET image='$update_image' WHERE id='$update_p_id'") or die('query failed');
          move_uploaded_file($update_image_tmp_name, 'upload_img/'.$update_image);
          unlink('upload_img/'.$update_old_image);
          header('location:admin_products.php');
       }
    }
       header('location:admin_products.php');
    
 }   

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>products</title>

           <!-- font awesome cdn link -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

        <!-- customm admin css file link -->
        <link rel="stylesheet" href="./css/admin_style.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <?php include 'admin_header.php'; ?>

  <!-- product CRUD section starts -->

   <section class="add-products">

    <h1 class="title">shop products</h1>

    <form action="" method="post" enctype="multipart/form-data">
         <h3>add product</h3>

         <input type="text" name="name" class="box" placeholder="enter product name" required>
         <input type="number" name="price" min="0" class="box" placeholder="enter product price" required>
         <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp, image/gif" class="box">
         <input type="submit" value="add product" name="add_product" class="btn">
        
    </form>
   </section>

  <!-- product CRUD section ends  -->

   <!-- product display section starts  -->
<section class="show-products">
    <div class="box-container">
        <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>
        <div class="box">
            <img src="upload_img/<?php echo $fetch_product['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_product['name']; ?></div>
            <div class="price">$<?php echo $fetch_product['price']; ?></div>
            <!-- Add description here -->
            <div class="description"><?php echo $fetch_product['Description']; ?></div>
            <div class="action-buttons">
                <a href="admin_products.php?update=<?php echo $fetch_product['id']; ?>" class="option-btn">update</a>
                <a href="admin_products.php?delete=<?php echo $fetch_product['id']; ?>" class="delete-btn"
                   onclick="return confirm('delete this product?')">delete</a>
            </div>
        </div>
        <?php
                }
            }else{
                echo '<p class="empty">no products added yet!</p>';
            }
        ?>
    </div>
</section>
<!-- product display section ends  -->

    <!-- update product section starts -->
    <section class="edit-product-form">
        <?php
            if(isset($_GET['update'])){
                $update_id = $_GET['update'];
                $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
                if(mysqli_num_rows($update_query) > 0){
                    while($fetch_update = mysqli_fetch_assoc($update_query)){
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
            <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
            <img src="upload_img/<?php echo $fetch_update['image']; ?>" alt="">
            <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required>
            <input type="number" name="update_price" min="0" value="<?php echo $fetch_update['price']; ?>" class="box" required>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png, image/webp, image/gif" class="box">
            <input type="submit" value="update" name="update_product" class="btn">
            <input type="reset" value="cancel" id="close-update-form" class="option-btn"   onclick="document.querySelector('.edit-product-form').style.display = 'none';">
        </form>
        <?php
                    }
                }
            }else{
                echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
            }
        ?>
    </section>
    <!-- update product section ends -->

       <!-- custom js file link -->
       <script src="js/admin_script.js"></script>

    </body>
</html>