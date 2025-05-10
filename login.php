<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];

    // Validation
    if (empty($email) || empty($pass)) {
        $message[] = 'All fields are required!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message[] = 'Invalid email!';
    } else {
        // Check if user exists (prepared statement)
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
           $row= $result->fetch_assoc();
            if (password_verify($pass, $row['password'])) {
                if($row['user_type'] == 'admin'){
                    $_SESSION['admin_name'] = $row['name'];
                    $_SESSION['admin_email'] = $row['email'];
                    $_SESSION['admin_id'] = $row['id'];
                    header("Location: admin_page.php ");
                    exit();
                }elseif($row['user_type'] == 'user'){
                    $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_email'] = $row['email'];
                    $_SESSION['user_id'] = $row['id'];
                    header("Location: home.php ");
                }
            } else {
                $message[] = 'incorrect email or password!';
            }
        } else {
            $message[] = 'incorrect email or password!';
        }

    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- custom css file link -->
   <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
</head>
<body>

<?php
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
           <span> '.$message.'  </span>
           <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}

?>
    <div class="form-container">
        <form action="" method="post">
            <h3>Log now</h3>
            <input type="email" name="email" placeholder="enter your email" class="box" required>
            <input type="password" name="password" placeholder="enter your password" class="box"  autocomplete="new-password" required>
            <input type="submit" value="Log in now" class="btn" name="submit">
            <p>don’t have an account? <a href="register.php">Register now</a></p>
        </form>
    </div>
</body>
</html>