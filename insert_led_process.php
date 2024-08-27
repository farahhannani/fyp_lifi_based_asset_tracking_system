<!DOCTYPE html>
<html>
<head>
    <title>Insert LED Information</title>
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

        /* Paste the CSS styles here */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .container {
            max-width: 700px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }

        .container .message {
            font-family: retro;
            text-align: center;
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 20px;
            color: #333;
        }

        .container .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button {
            height: 45px;
            width: 150px;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-family: retro;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            text-align: center;
            line-height: 45px;
            text-decoration: none;
        }

        .button:hover {
            background: linear-gradient(-135deg, #71b7e6, #9b59b6);
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "asset_tracking";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Extract data from the form submission
        $led_id = $_POST['led_id'];
        $location = $_POST['location'];

        // Prepare and execute the SQL statement to insert data into the leds table
        $sql = "INSERT INTO leds (led_id, location) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $led_id, $location);

        if ($stmt->execute()) {
            // If insertion is successful, display a success message
            echo "<p class='message'>LED information inserted successfully</p>";
        } else {
            // If insertion fails, display an error message
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();
        ?>
        <div class="button-container">
            <a href="dashboard.php" class="button">Go Back</a>
        </div>
    </div>
</body>
</html>
