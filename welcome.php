<?php
session_start(); // Start session to access session variables

// Check if the user is logged in
if(!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: login.php");
    exit(); // Stop script execution
}

// If user is logged in, display welcome message
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="style2.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?> !</h1>
        <p>This is the welcome page. You are logged in.</p>
        <a href="index.html">Logout</a>
    </div>
</body>
</html>