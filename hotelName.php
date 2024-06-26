<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Name</title>
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
        .hotel-result {
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            margin-bottom: 20px;
            padding: 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .hotel-result img {
            max-width: 150px;
            border-radius: 5px;
            margin-right: 20px;
        }
        .hotel-result p {
            margin: 0;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Hotel at: <?php echo htmlspecialchars($_POST['location']); ?> </h1>
    <?php
    // Database connection
    $con = mysqli_connect("localhost", "root", "", "details");
    if (isset($_POST['location']) && $con) {
        $location = $_POST['location'];

        // Securely prepared query
        $stmt = $con->prepare("SELECT Hotel_Name, Image_Path FROM hotelname_location WHERE Location = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $con->error);
        }
        $stmt->bind_param("s", $location);
        $stmt->execute();
        $result = $stmt->get_result();

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='hotel-result'>";
                echo "<img src='" . htmlspecialchars($row['Image_Path']) . "' alt='" . htmlspecialchars($row['Hotel_Name']) . "'>";
                echo "<p>" . htmlspecialchars($row['Hotel_Name']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "No Hotels Found at this Location";
        }

        $stmt->close();
    } else {
        // Handle cases where location is not submitted or connection fails
        echo "Failed to retrieve hotel information.";
    }

    mysqli_close($con);
    ?>
</body>
</html>
