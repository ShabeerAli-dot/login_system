


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }
        button:hover { background-color: #218838; }
        .error { color: #ff6b6b; margin-bottom: 10px; }
    </style>
</head>
<body>

    <h2>Create an Account</h2>

    <?php if(isset($_GET['error']) && $_GET['error'] == 'emailexists'): ?>
        <p class="error">Error: That email is already registered!</p>
    <?php endif; ?>

    <form action="../controllers/signup_cont.php" method="POST">
    <input type="text" name="name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email Address" required><br>
    <input type="text" name="phone" placeholder="Phone Number" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
    <button type="submit">Sign Up</button>
</form>

<?php if(isset($_GET['error']) && $_GET['error'] == 'passwordmismatch') echo "<p style='color:red;'>Passwords do not match!</p>"; ?>
    <p>Already have an account? <a href="login.php">Login here</a></p>

</body>
</html>