<!DOCTYPE html>
<html lang="en">
<head>
    <title>Asset List - Li-Fi Asset Tracking</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @font-face {
            font-family: 'Pumpkin';
            src: url('pumpkin.ttf') format('truetype');
        }

        @font-face {
            font-family: 'dre';
            src: url('drephonic.ttf') format('truetype');
        }

        @font-face {
            font-family: 'remixable';
            src: url('remixable.ttf') format('truetype');
        }

        @font-face {
            font-family: 'retro';
            src: url('retro.otf') format('truetype');
        }

        @font-face {
            font-family: 'cal';
            src: url('calibri.ttf') format('truetype');
        }

        body {
            padding: 0;
            margin: 0;
            font-family: "Arial", sans-serif;
            background-color: #fafaff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1 {
            font-family: retro;
            font-weight: bold;
            text-align: center;
            margin-top: 65px;
            color: #000; /* Black text */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #4b49ac; /* Match the dashboard header color */
            background-color: #ffffff;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #4b49ac; /* Match the dashboard header color */
            padding: 10px; /* Adjusted padding for smaller size */
            text-align: center;
            color: #000; /* Black text */
        }

        th {
            background-color: #4b49ac; /* Match the dashboard header color */
            color: #fff; /* White text */
            font-weight: bold;
        }

        .page-container {
            flex: 1;
            padding: 16px;
        }

        .w3-footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 5px 0; /* Reduce padding to make the footer smaller */
            position: fixed;
            width: 100%;
            bottom: 0;
            font-size: 12px; /* Reduce font size */
        }

        .btn {
            display: inline-block;
            padding: 6px 12px; /* Smaller padding */
            margin: 4px;
            background-color: #4b49ac;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            font-size: 14px; /* Smaller font size */
        }

        .btn:hover {
            background-color: #3e3c8e;
        }
    </style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card" style="background-color: #4b49ac; color: #000;"> <!-- Match the dashboard header color -->
        <a href="#home" class="w3-bar-item w3-button"><b>LIFI</b></a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="try.php" class="w3-bar-item w3-button" style="color: #000;">Back</a> <!-- Black text -->
        </div>
    </div>
</div>

<div class="page-container">
    <section>
        <h1>Asset List</h1>
        
        <!-- Search form -->
        <form method="GET">
            <input type="text" name="search" placeholder="Search by Asset Code" 
                value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                style="font-family: 'cal'; font-size: 16px;">

            <button type="submit" class="btn">Search</button>
        </form>

        <?php
        // Make a database connection
        $conn = new mysqli('localhost', 'root', '', 'asset_tracking');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $search_query = ""; // Initialize the search query variable

        // Check if a search query is submitted
        if(isset($_GET['search'])) {
            $search_query = $_GET['search']; // Get the search query from the URL parameter
        }

        // Fetch assets data with category names in ascending order based on asset code and filtered by search query
        $sql = "SELECT assets.barcode, assets.description, assets.ldr
                FROM assets
                WHERE assets.barcode LIKE '%$search_query%'"; // Use LIKE operator for partial match
        $result = $conn->query($sql);

        // Output data in a table
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Asset Code</th><th>Name</th><th>LDR No.</th><th>Location</th><th>Details</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["barcode"]."</td>";
                echo "<td>".$row["description"]."</td>";
                echo "<td>".$row["ldr"]."</td>";
                echo "<td><a href='view_location.php?barcode=".$row["barcode"]."' class='btn'><i class='fas fa-map-marker-alt'></i></a></td>"; // Font Awesome icon for location
                echo "<td><a href='view_details.php?barcode=".$row["barcode"]."' class='btn'><i class='fas fa-info-circle'></i></a></td>"; // Font Awesome icon for details
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </section>
</div>

<!--footer class="w3-footer">
    <p>Li-Fi Based Asset Tracking System for Indoor Environment</p>
</footer-->

</body>
</html>
