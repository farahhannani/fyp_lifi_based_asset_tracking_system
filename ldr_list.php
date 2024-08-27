<!DOCTYPE html>
<html lang="en">
<head>
    <title>LDR List - Li-Fi Asset Tracking</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        @font-face {
            font-family: 'Pumpkin';
            src: url('pumpkin.ttf') format('truetype');
        }

        @font-face {
            font-family: 'retro';
            src: url('retro.otf') format('truetype');
        }

        @font-face {
            font-family: 'remixable';
            src: url('remixable.ttf') format('truetype');
        }

        @font-face {
            font-family: 'dre';
            src: url('drephonic.ttf') format('truetype');
        }

        body {
            padding: 0;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9; /* Light grey background */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1 {
            font-family: retro;
            font-weight: bold;
            text-align: center;
            margin-top: 65px;
            color: #333; /* Dark grey text */
        }

        table {
            width: 60%; /* Ensure the table takes up full width */
            margin: 20px auto; /* Center the table */
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Add subtle shadow */
        }

        th, td {
            border: 1px solid #ddd; /* Light grey borders */
            padding: 12px; /* Adjusted padding for readability */
            text-align: center;
            color: #333; /* Dark grey text */
        }

        th {
            background-color: #4b49ac; /* Dashboard header color */
            color: #fff; /* White text */
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1; /* Light grey hover effect */
        }

        .page-container {
            flex: 1;
            padding: 16px;
            width: 100%; /* Allow the container to use full width */
            margin: 0 auto;
        }

        .w3-top {
            z-index: 1000; /* Ensure the top bar is above other content */
        }

        .w3-footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0; /* Reduce padding to make the footer smaller */
            position: fixed;
            width: 100%;
            bottom: 0;
            font-size: 12px; /* Reduce font size */
        }

        .btn {
            display: inline-block;
            padding: 10px 20px; /* Adjusted padding for better appearance */
            margin: 4px;
            background-color: #4b49ac;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            font-size: 14px; /* Adjusted font size */
            cursor: pointer;
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
            <a href="manage_ldrs.php" class="w3-bar-item w3-button" style="color: #000;">Back</a> <!-- Black text -->
        </div>
    </div>
</div>

<div class="page-container">
    <section>
        <h1>LDR List</h1>
        <table>
            <thead>
                <tr>
                    <th>LDR No.</th>
                    <th>Asset Code</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Make a database connection
                $conn = new mysqli('localhost', 'root', '', 'asset_tracking');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch LDRs data
                $sql = "SELECT ldr, barcode FROM ldr_info";
                $result = $conn->query($sql);

                // Output data in a table
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["ldr"]."</td>";
                        echo "<td>".$row["barcode"]."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No data found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </section>
</div>

<!-- Footer 
<footer class="w3-footer">
    <p>Li-Fi Based Asset Tracking System for Indoor Environment</p>
</footer>-->

</body>
</html>
