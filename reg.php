<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <form method="post" action="reg.php">
        <div class="container">
            <label for="uname"><b>UserName:</b></label>
            <input type="text" placeholder="Enter username" name="uname" required><br>
            <label for="email"><b>Email:</b></label>
            <input type="text" placeholder="Enter email id" name="email" required><br>
            <label for="psw"><b>Password:</b></5label>
            <input type="password" placeholder="Enter Password" name="psw" required minlength="8" style="color:red;" ><br>
            <label for="cpsw"><b>Confirm Password:</b></label>
            <input type="password" placeholder="Confirm Password" name="cpsw" required><br>
            <label>
                <input type="checkbox" checked="checked" name="remember" required> Remember me
            </label>
            <input type="submit" name="btn" value="Register">
        </div>
    </form>
	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
	  
</body>
</html>

<?php
if(isset($_POST['btn'])) {
    add();
}


     
   
function add() {
    if(isset($_POST['uname'], $_POST['email'], $_POST['psw'], $_POST['cpsw'])) {
        $UserName = $_POST['uname'];
        $Email = $_POST['email'];
        $Password = $_POST['psw'];
        $cPassword = $_POST['cpsw'];
        // Establish connection to MySQL database
        $con = mysqli_connect("localhost", "root", "", "details");
		
		  // Ensure passwords match (already checked by browser, but can be double-checked)
		  if ($Password !== $cPassword) {
			echo "<script type='text/javascript'>alert('Password do not match');</script>";

			return false;
		  }
	// Check connection
        // if (!$con) {
        //     die("Connection failed: " . mysqli_connect_error());
        // }
        // Hash the password
        // $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
        // Prepare and bind the SQL query
      /*   $stmt = $con->prepare("INSERT INTO data (UserName, Email, Password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $UserName, $Email, $Password);
        // Execute the query
        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Data added');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error: " . mysqli_error($con) . "');</script>";
        }
        // Close the prepared statement and connection
        $stmt->close();
        mysqli_close($con); */
        $r="SELECT * FROM data";
        $result=mysqli_query($con,$r);
        $row = mysqli_fetch_array($result);
        if($row['username']==$UserName){
            echo "<script type='text/javascript'>alert('UserName Already Exist Try another One');</script>";
		
        }
        else
        {$q="INSERT INTO data values('$UserName', '$Email', '$Password')";
            if(mysqli_query($con,$q))
            {
                echo "<script type='text/javascript'>alert('Data Added Successfully !');</script>";
    
    
            }}
    }
}

?>






