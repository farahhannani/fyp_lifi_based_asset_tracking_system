<!DOCTYPE html>
<html lang="en">
<head>
    <title>Insert New Asset</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        @font-face {
            font-family: 'Pumpkin';
            src: url('pumpkin.ttf') format('truetype');
        }

        @font-face {
            font-family: 'wild';
            src: url('wild.otf') format('truetype');
        }

        @font-face {
            font-family: 'retro';
            src: url('retro.otf') format('truetype');
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin-top: 90px; /* Adjusted for header height */
            background: white;
        }

        h1 {
            font-family: retro;
            text-align: center;
        }

        label {
            font-family: retro; 
            font-size: 14px;
        }

        .container {
            max-width: 700px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
            margin: 0 auto; /* Center the container */
        }

        .container .heading {
            font-size: 25px;
            font-weight: 500;
            margin-bottom: 20px;
            color: #333;
        }

        .container .content {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 500;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        select {
            font-family: arial;
            height: 40px;
            width: 100%;
            font-size: 14px;
            border-radius: 5px;
            padding: 0 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }

        input[type="submit"] {
            height: 45px;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            font-family: 'retro';
        }

        input[type="submit"]:hover {
            background: linear-gradient(-135deg, #71b7e6, #9b59b6);
        }

        .w3-top {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            background-color: #4b49ac; /* Match the dashboard header color */
            color: #fff;
        }

        .w3-bar {
            background-color: #4b49ac; /* Match the dashboard header color */
            color: #fff;
            padding: 0; /* Remove padding */
        }

        .w3-bar .w3-bar-item {
            color: #fff; /* White text */
            padding: 8px 16px; /* Adjust padding for bar items */
        }

        .w3-bar .w3-bar-item:hover {
            text-decoration: underline;
        }

        .w3-bar .w3-button {
            color: #fff; /* White text */
            padding: 8px 16px; /* Adjust padding for buttons */
        }

        .w3-bar a {
            color: #fff;
        }
    </style>
</head>
<body>

<header>
    <div class="w3-top">
        <div class="w3-bar w3-wide w3-padding w3-card"> <!-- Match the dashboard header color -->
            <a href="#home" class="w3-bar-item w3-button"><b>LIFI</b></a>
            <div class="w3-right w3-hide-small">
                <a href="user_dashboard.php" class="w3-bar-item w3-button">Back</a>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <h1 class="heading">Insert Asset Information</h1>
    <div class="content">
        <form action="insert_asset.php" method="post">
            <label for="barcode">Asset Code</label><br>
            <input type="text" id="barcode" name="barcode" required><br><br>
            
            <label for="description">Name</label><br>
            <input type="text" id="description" name="description" required><br><br>
            
            <label for="category">Category</label><br>
            <select id="category" name="category" required>
                <?php
                // Fetch categories from the database
                $conn = new mysqli('localhost', 'root', '', 'asset_tracking');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT id, name FROM categories";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
                $conn->close();
                ?>
            </select><br><br>
            
            <label for="ldr">LDR</label><br>
            <input type="number" id="ldr" name="ldr" required><br><br>
            
            <input type="submit" value="Add Asset">
        </form>
    </div>
</div>

</body>
</html>
