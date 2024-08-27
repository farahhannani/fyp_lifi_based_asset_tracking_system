<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$database = "asset_tracking"; // Change this to your database name
$table = "location_tracking_bb00"; // Change this to the table name for barcode BB00

// Get POST data
$location = isset($_POST["location"]) ? $_POST["location"] : '';

// Check if location is not NULL or empty
if (!empty($location)) {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO $table (ldr, barcode, location, timestamp) VALUES (2, 'BB00', ?, NOW())"; // Assuming you also have a timestamp column

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute statement
        $stmt->bind_param("s", $location); // 's' indicates the type is string
        if ($stmt->execute()) {
            echo "Data inserted successfully";
        } else {
            echo "Error executing SQL statement: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing SQL statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Location is empty or NULL. Data not inserted.";
}
?>
