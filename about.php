<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images\open-book-pile-books_116547-110573.avif" alt="">
      </div>

      <div class="content">
         <h3>📚 About Us</h3>
         <p>
Welcome to Novella, your ultimate destination for discovering, enjoying, and collecting digital books across all genres.
We’re passionate about literature and believe in the power of stories to transform lives, broaden perspectives, and inspire creativity.

What Makes Us Different?
🌟 User-friendly experience: Clean design, easy navigation, and secure checkout.

📖 Diverse catalog: Genres for every interest — romance, mystery, sci-fi, history, and more.

🛒 Personalized cart: Easily manage your reading list and purchases.

Thank you for choosing Novella — where stories begin, and adventures never end.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">client's reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic1.jpeg" alt="">
         <p>Novella feels like a digital library with heart. The aesthetic and attention to detail make reading even more joyful</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Hellie</h3>
      </div>


      <div class="box">
         <img src="images/pic2.jpeg" alt="">
         <p>I discovered so many great reads through Novella. The design is beautiful, and the quotes inspire me every day😍</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Jonason</h3>
      </div>

      <div class="box">
         <img src="images/pic3.jpg" alt="">
         <p>A cozy space for book lovers. I especially love the daily quotes and curated reading suggestions.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Smith William</h3>
      </div>

   <div class="box">
         <img src="images/pic4.jpeg" alt="">
         <p>An absolute haven for bookworms. The curated quotes and visuals elevate the reading experience😍</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Emailnk</h3>
      </div>

      <div class="box">
         <img src="images/pic5.jpg" alt="">
         <p>Every time I visit Novella, I leave with a new book on my list. It's like Pinterest for readers!🙌</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Posten jackob</h3>
      </div>

      <div class="box">
         <img src="images/pic6.jpeg" alt="">
         <p>Finally, a place that combines beauty and literature. Novella is where design meets storytelling.💕</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Petter Aolla</h3>
      </div>


</section>

<section class="authors">

   <h1 class="title">greate authors</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/Author1.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Emmilie William</h3>
      </div>

      <div class="box">
         <img src="images/Author2.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Thomas Jroki</h3>
      </div>

      <div class="box">
         <img src="images/Author3.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Sam Martin</h3>
      </div>

      <div class="box">
         <img src="images/Author4.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Margaret Atwoord</h3>
      </div>

      <div class="box">
         <img src="images/Author5.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>john Kans</h3>
      </div>

      <div class="box">
         <img src="images/Author6.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Eliam Warhk</h3>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>