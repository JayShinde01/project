

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Name</title>
    <!-- Your head content -->
</head>
<body>
    <h1>Hotel at: <?php echo $_POST['location']; ?></h1>
    <?php 
     if(isset($_POST['btn'])) {
        $location = isset($_POST['location']) ? $_POST['location'] : 'Unknown';
        echo "<h1>Hotel at: $location</h1>";
    }
    ?>
    <!-- Your other HTML content -->
</body>
</html>