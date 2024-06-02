<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Health Care</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }
    h1 {
      color: #333;
    }
    .result {
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #fff;
      margin-bottom: 20px;
      padding: 20px;
      display: flex;
      align-items: center;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .result img {
      max-width: 150px;
      border-radius: 5px;
      margin-right: 20px;
    }
    .result p {
      margin: 0;
      font-size: 18px;
      color: #555;
    }
  </style>
</head>
<body>
  <h1>Health Care</h1>
  <?php
  // Database connection
  $con = mysqli_connect("localhost", "root", "", "details");
  if ($con) {

    // Securely prepared query to retrieve all healthcare facilities
    $stmt = $con->prepare("SELECT Name, Image_Path FROM healthcare");
    if ($stmt === false) {
      die("Prepare failed: " . $con->error);
    }
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<div class='result'>";
        echo "<img src='" . htmlspecialchars($row['Image_Path']) . "' alt='" . htmlspecialchars($row['Name']) . "'>";
        echo "<p>" . htmlspecialchars($row['Name']) . "</p>";
        echo "</div>";
      }
    } else {
      echo "No Health Care Found";
    }

    $stmt->close();
  } else {
    // Handle connection failure
    echo "Failed to connect to database.";
  }

  mysqli_close($con);
  ?>
</body>
</html>
