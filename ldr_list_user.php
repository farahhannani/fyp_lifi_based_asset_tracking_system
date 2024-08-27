<!DOCTYPE html>
<html lang="en">
<head>
    <title>LDR List - Li-Fi Asset Tracking</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
            padding: 16px;
            margin: 0;
            font-family: "Arial", sans-serif;
            background-color: #fafaff; /* Match the dashboard background color */
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure full height of the viewport */
        }

        .w3-top {
            z-index: 1000; /* Ensure the top bar is above other content */
        }

        .page-container {
            flex: 1; /* Fill remaining space */
            padding: 16px;
            margin: 0 auto;
            max-width: 800px; /* Limit content width */
        }

        h1 {
            font-family: retro;
            font-size: 30px;
            color: #000; /* Black text */
            text-transform: uppercase;
            font-weight: bold;
            text-align: center;
            margin-top: 70px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #4b49ac; /* Match the dashboard header color */
            background-color: #ffffff;
            margin-top: 20px;
            table-layout: fixed; /* Ensure consistent table width */
        }

        th, td {
            padding: 12px; /* Adjust padding */
            text-align: center;
            vertical-align: middle;
            font-weight: 300;
            font-size: 15px; /* Adjust font size */
            color: #000; /* Black text */
            border: 1px solid #4b49ac; /* Match the dashboard header color */
        }

        th {
            background-color: #4b49ac; /* Match the dashboard header color */
            color: #fff; /* White text */
            font-weight: bold; /* Make header text bold */
        }

        a {
            color: #4b49ac; /* Match the dashboard header color */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .w3-footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0; /* Adjust footer padding */
            position: fixed;
            width: 100%;
            bottom: 0;
            font-size: 12px; /* Adjust footer font size */
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
            <a href="user_dashboard.php" class="w3-bar-item w3-button" style="color: #000;">Back</a> <!-- Black text -->
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
