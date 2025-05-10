<?php
require 'config.php'; //  database connection file

// Admin credentials
$name = "rawan";
$email = "rawan@gmail.com";
$plain_password = "12"; 
$user_type = "admin";

// Hash the password
$hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);

// Insert into database
$stmt = $conn->prepare("INSERT INTO users (name, email, password, user_type) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $hashed_password, $user_type);

if($stmt->execute()) {
    echo "Admin created successfully!";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>