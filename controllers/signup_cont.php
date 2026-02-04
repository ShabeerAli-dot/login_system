<?php

require '../models/config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email']; 
    $phone    = $_POST['phone'];
    $pass     = $_POST['password'];
    $conf_pass = $_POST['confirm_password'];


    if ($pass !== $conf_pass) {
        header("Location: ../views/signup.php?error=passwordmismatch");
        exit();
    }

   
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, phone_number, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $hashed_password);

    if ($stmt->execute()) {
        header("Location: ../views/login.php?signup=success");
        exit();
    } else {
        header("Location: ../views/signup.php?error=stmtfailed");
        exit();
    }
}
?>