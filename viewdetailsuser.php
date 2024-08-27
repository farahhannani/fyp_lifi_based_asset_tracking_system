<!DOCTYPE html>
<html lang="en">
<head>
    <title>Asset Details - Li-Fi Asset Tracking</title>
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
            margin: 0;
            font-family: "Arial", sans-serif;
            background-color: #fafaff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .w3-top {
            z-index: 1000;
        }

        .page-container {
            flex: 1;
            padding: 16px;
            margin: 0 auto;
            max-width: 800px;
        }

        h1 {
            font-family: retro;
            font-size: 30px;
            color: #000;
            text-transform: uppercase;
            font-weight: bold;
            text-align: center;
            margin-top: 65px;
            margin-bottom: 15px;
        }

        .asset-details {
            display: flex;
            max-width: 800px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #4b49ac;
            border-radius: 10px;
            align-items: flex-start; /* Align items to the top */
        }

        .asset-details img {
            max-width: 40%; /* Ensure the image takes up maximum available width */
            height: auto; /* Maintain aspect ratio */
            margin-right: 20px;
            border-radius: 5px; /* Optional: Add border radius for rounded corners */
        }

        .asset-details table {
            width: 100%;
            border-collapse: collapse;
            margin-left: auto; /* Push the table to the right */
        }

        .asset-details th, .asset-details td {
            padding: 10px;
            text-align: left;
        }

        .asset-details th {
            background-color: #4b49ac;
            color: #fff;
        }

        .asset-details td {
            border-bottom: 1px solid #ddd;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #4b49ac;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        .w3-footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            font-size: 12px;
        }
    </style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card" style="background-color: #4b49ac; color: #000;">
        <a href="#home" class="w3-bar-item w3-button"><b>LIFI</b></a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="displayasset_user.php" class="w3-bar-item w3-button" style="color: #000;">Back</a>
        </div>
    </div>
</div>

<div class="page-container">
    <h1>Asset Details</h1>
    <div class="asset-details">
        <?php
        // Get the barcode from the URL parameter
        $barcode = isset($_GET['barcode']) ? $_GET['barcode'] : '';

        // Dummy data for example purposes based on the barcode
        $assets = [
            'AA00' => [
                'description' => 'Bed',
                'ldr' => '1',
                'purchase_date' => '2022-01-15',
                'warranty_expiration' => '2024-01-15',
                'image' => 'https://hncmedicalsupplies.com.my/assets/img/hospital_bed/f.jpg' // Assume this is a valid image in the same directory
            ],
            'BB00' => [
                'description' => 'Medical Cabinet',
                'ldr' => '2',
                'purchase_date' => '2022-02-20',
                'warranty_expiration' => '2024-02-20',
                'image' => 'https://brauninternational.com/wp-content/uploads/2019/10/Medicine-Cabinet-with-DDA-Inner-Cabinet.jpg' // Assume this is a valid image in the same directory
            ]
        ];

        $asset = isset($assets[$barcode]) ? $assets[$barcode] : null;

        if ($asset) {
            // Display the asset image
            echo "<img src='{$asset['image']}' alt='Asset Image'>";

            // Output the asset details
            echo "<table>
                    <tr><th>Asset Code</th><td>{$barcode}</td></tr>
                    <tr><th>Description</th><td>{$asset['description']}</td></tr>
                    <tr><th>Category</th><td>Furniture</td></tr>
                    <tr><th>LDR</th><td>{$asset['ldr']}</td></tr>
                    <tr><th>Purchase Date</th><td>{$asset['purchase_date']}</td></tr>
                    <tr><th>Warranty Expiration</th><td>{$asset['warranty_expiration']}</td></tr>
                  </table>";
        } else {
            echo "<p>No details available for this asset.</p>";
        }
        ?>
    </div>
</div>

<!--footer class="w3-footer">
    <p>Li-Fi Based Asset Tracking System for Indoor Environment</p>
</footer>-->

</body>
</html>
