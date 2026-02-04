<?php
session_start();
// Updated path to look inside the models folder
require '../models/config.php'; 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $pass  = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    
    if ($row && password_verify($pass, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_full_name'] = $row['name']; 
        
        
        header("Location: ../views/dashboard.php");
        exit();
    } else {
        
        header("Location: ../views/login.php?error=invalid");
        exit();
    }
}
?>