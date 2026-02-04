<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


$name = $_SESSION['user_full_name']; 
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background-color: #f0f2f5; text-align: center; }
        .header-top { background-color: #000; color: white; padding: 15px; font-size: 14px; }
        .container { padding: 50px 20px; }
        h1 { color: #333; margin-bottom: 30px; }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            max-width: 700px;
            margin: 0 auto;
        }
        .card {
            background: white;
            padding: 40px 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-decoration: none;
            color: #333;
            transition: 0.3s;
            border: 1px solid #ddd;
            display: block;
        }
        .card:hover { background-color: #f8f9fa; transform: translateY(-5px); border-color: #007bff; }
        .card h2 { color: #007bff; margin-bottom: 10px; }
        .logout-link { margin-top: 30px; display: inline-block; color: red; text-decoration: none; font-weight: bold; }
    </style>

    <script>
        let timeout;
        function resetTimer() {
            clearTimeout(timeout);
            
            timeout = setTimeout(function() {
                alert("Session expired! You will be logged out.");
              
                window.location.href = '../controllers/logout.php';
            }, 5000); 
        }

        window.onload = resetTimer;
        window.onmousemove = resetTimer;
        window.onmousedown = resetTimer; 
        window.onclick = resetTimer;     
        window.onkeypress = resetTimer;
    </script>
</head>
<body>

    <div class="header-top">
        Welcome, <?php echo htmlspecialchars($name); ?> | Active Session: 20s
    </div>

    <div class="container">
        <h1>Employee Portal</h1>
        
        <div class="grid-container">
            <a href="attendance.php" class="card">
                <h2>Attendance</h2>
                <p>Mark Daily Entry</p>
            </a>
            <a href="payroll.php" class="card">
                <h2>Payroll</h2>
                <p>View Salary Slips</p>
            </a>
        </div>

        <a href="../controllers/logout.php" class="logout-link">Manual Logout</a>
    </div>

</body>
</html>