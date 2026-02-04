


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; background-color: #f4f4f4; }
        form {
            display: inline-block;
            background-color: #000000; 
            padding: 30px; 
            width: 300px; 
            border-radius: 10px;
            color: white;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
        }
        input { width: 90%; padding: 10px; margin: 10px 0; border-radius: 5px; border: none; }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover { background-color: #218838; }
        .error { color: #ff6b6b; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Login to Your Account</h2>
    
    <?php if(isset($_GET['error'])): ?>
        <p class="error">Invalid Email or Password!</p>
    <?php endif; ?>
    
    <form action="../controllers/login_cont.php" method="POST">
        <input type="email" name="email" placeholder="Email Address" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
</body>
</html>