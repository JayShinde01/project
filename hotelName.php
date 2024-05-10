

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Name</title>
    <!-- Your head content -->
</head>
<body>
    <h1>Hotel at: <?php echo $_POST['location'];?> </h1>
    <?php 
    
    // Check if the form is submitted
        // Get the selected location from the form
        $location = $_POST['location'];

        // Database connection
        $con = mysqli_connect("localhost","root","","details");

        // SQL query
        $q = "SELECT Hotel_Name FROM hotelname_location WHERE Location = '$location'";
        
        // Execute the query
        $rs = mysqli_query($con, $q);
        $row = mysqli_fetch_array($rs);
            
            
        if(mysqli_num_rows($rs) > 0) {
            // Output data of each row using a while loop
            while($row = mysqli_fetch_array($rs)) {
                echo "<p>" . $row['Hotel_Name'] . "</p>";
            }
        }

        else{
            echo "No Hotel's Found at this Location";
        }
    ?>
    <!-- Your other HTML content -->
</body>
</html>