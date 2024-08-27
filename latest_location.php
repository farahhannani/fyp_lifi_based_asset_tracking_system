<?php
header('Content-Type: application/json');

// Make a database connection
$conn = new mysqli('localhost', 'root', '', 'asset_tracking');
if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]));
}

// Assuming you get the barcode from a query parameter
if (isset($_GET['barcode'])) {
    $barcode = $conn->real_escape_string($_GET['barcode']);

    // Determine the table based on the barcode value
    $table = 'location_tracking_' . $barcode;

    // Query to retrieve the latest location entry for the given barcode from the specified table
    $sql = "SELECT *
            FROM $table
            ORDER BY timestamp DESC
            LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Check if the location is NULL
        if (is_null($row['location'])) {
            // Query to retrieve the latest entry with a non-null location
            $sql_non_null = "SELECT *
                             FROM $table
                             WHERE location IS NOT NULL
                             ORDER BY timestamp DESC
                             LIMIT 1";
            $result_non_null = $conn->query($sql_non_null);

            if ($result_non_null->num_rows > 0) {
                $row_non_null = $result_non_null->fetch_assoc();
                echo json_encode($row_non_null);
            } else {
                echo json_encode(['error' => 'No non-null location history found for asset with barcode ' . $barcode]);
            }
        } else {
            echo json_encode($row);
        }
    } else {
        echo json_encode(['error' => 'No location history found for asset with barcode ' . $barcode]);
    }
} else {
    echo json_encode(['error' => 'Barcode parameter not found in the URL']);
}

$conn->close();
?>
