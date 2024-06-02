<?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "details");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$images = [
  ['assets\\images\\h1.jpg', 'garava', 'powai naka'],
  ['assets\\images\\h2.jpg', 'srushti misal', 'sadar bazar'],
  ['assets\\images\\h3.jpg', 'chandra vilas', 'powai naka'],
  ['assets\\images\\h4.jpg', 'bombay retrorant', 'sadar bazar'],
  ['assets\\images\\h5.jpg', 'Hotelshree', 'sadar bazar'],
  ['assets\\images\\h6.jpg', 'samudra', 'powai naka'],
  ['assets\\images\\h7.jpg', 'Hotel shreemant', 'sadar bazar'],
  ['assets\\images\\h8.jpg', 'Hotel lakeview', 'powai naka'],
  ['assets\\images\\h9.jpg', 'manas hotel', 'sadar bazar'],
  ['assets\\images\\h10.jpg', 'food hiest', 'powai naka'],
  // Add more images here
]; 

foreach ($images as $image) {
    $image_path = str_replace("\\", "/", $image[0]);
    $hotel_name = $image[1];
    $location = $image[2];

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO hotelname_location (Hotel_Name, Location, Image_Path) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $hotel_name, $location, $image_path);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Image path inserted successfully for " . $hotel_name . ".<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    // Close the statement after each insert
    $stmt->close();
}

// Close the connection
mysqli_close($con);
?>
