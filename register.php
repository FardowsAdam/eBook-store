<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $user_type = 'user';

    // Validation
    if (empty($name) || empty($email) || empty($pass)) {
        $message[] = 'All fields are required!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message[] = 'Invalid email!';
    } elseif ($pass != $cpass) {
        $message[] = 'Passwords do not match!';
    } else {
        // Check if user exists (prepared statement)
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $message[] = 'User already exists!';
        } else {
            // Hash password securely
            $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

            // Insert user (prepared statement)
            $stmt = $conn->prepare("INSERT INTO users (name, email, password, user_type) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $hashed_pass, $user_type);

            if ($stmt->execute()) {
                $message[] = 'Registered successfully!';
                header('location:login.php');
                exit();
            } else {
                $message[] = 'Error: ' . $conn->error;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            <h3>register now</h3>
            <input type="text" name="name" placeholder="enter your name" class="box" required>
            <input type="email" name="email" placeholder="enter your email" class="box" required>
            <input type="password" name="password" placeholder="enter your password" class="box"  autocomplete="new-password" required>
            <input type="password" name="cpassword" placeholder="confirm your password" class="box" required>
            <input type="submit" value="register now" class="btn" name="submit">
            <p>already have an account? <a href="login.php">login now</a></p>
        </form>
    </div>
</body>
</html>