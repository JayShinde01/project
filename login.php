
<?php
session_start(); // Start session to access session variables
if(isset($_POST['btn'])) {
    login();
}

function login() {
    if(isset($_POST['uname'], $_POST['psw'])) {
        $UserName = $_POST['uname'];
        $Password = $_POST['psw'];
        // Establish connection to MySQL database
        $con = mysqli_connect("localhost", "root", "", "details");
        // Check connection
       /*  if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        } */
        // Query to check if user exists with the given username and password
        $q = "SELECT * FROM data WHERE UserName='$UserName' AND Password='$Password'";
        $result = mysqli_query($con, $q);
        // Check if any rows were returned-
        if(mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $UserName;
            echo "<script type='text/javascript'>alert('Login successful');</script>";
            // Redirect the user to a dashboard or profile page
            header("Location: welcome.php");
        } else {
            echo "<script type='text/javascript'>alert('Invalid username or password');</script>";
        }
        // Close the connection
        mysqli_close($con);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <form method="post" action="login.php">
        <div class="container">
            <label for="uname"><b>Username:</b></label>
            <input type="text" placeholder="Enter username" name="uname" required><br>
            <label for="psw"><b>Password:</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required><br>
            <input type="submit" name="btn" value="Login">
        </div>
    </form>
    <p>
        Not a member yet? <a href="reg.php">Sign up</a>
    </p>
</body>
</html>

