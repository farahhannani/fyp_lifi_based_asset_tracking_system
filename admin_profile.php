<?php
ob_start(); // Start output buffering
session_start(); // Start session

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Retrieve the username from the session variable
$logged_in_username = $_SESSION['username'];

// Database connection
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "asset_tracking"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to fetch admin details based on username
$stmt = $conn->prepare("SELECT name, age, employee_id FROM admin WHERE username = ?");
$stmt->bind_param("s", $logged_in_username);
$stmt->execute();
$result = $stmt->get_result();

// Fetch admin details if available
$admin = $result->fetch_assoc();

// Close statement and database connection
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style>
        /* Add your custom styles here */
        .asset-details {
            max-width: 800px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #4b49ac;
            border-radius: 10px;
            overflow: hidden;
            text-align: center; /* Center text content */
        }

        .asset-details img {
            display: block; /* Ensure image is a block element */
            margin: 0 auto 20px; /* Center the image horizontally and add margin at the bottom */
            max-width: 40%;
            border-radius: 5px;
        }

        .asset-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .asset-details th,
        .asset-details td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .asset-details th {
            background-color: #4b49ac;
            color: #fff;
        }

        .edit-profile-link {
            text-align: right;
            margin-top: 10px;
        }

        .edit-profile-link a {
            text-decoration: none;
            color: #007bff;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Header Part -->
    <header>
        <div class="logosec">
            <div class="logo">LIFI</div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
                class="icn menuicn" id="menuicn" alt="menu-icon">
        </div>
        <div class="message">
            <div class="dp">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
                    class="dpicn" alt="dp">
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <!-- Dashboard -->
                    <div class="nav-option logout" onclick="window.location.href = 'try.php';">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
                            class="nav-img" alt="dashboard">
                        <h3> Dashboard</h3>
                    </div>
                    <!-- Profile -->
                    <div class="nav-option logout" onclick="window.location.href = 'admin_profile.php';">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                            class="nav-img" alt="blog">
                        <h3> Profile</h3>
                    </div>
                    <!-- About -->
                    <div class="nav-option logout" onclick="window.location.href = 'about.php';">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
                            class="nav-img" alt="settings">
                        <h3> About</h3>
                    </div>
                    <!-- Logout -->
                    <div class="nav-option logout" onclick="window.location.href = 'logout.php';">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
                            class="nav-img" alt="logout">
                        <h3>Logout</h3>
                    </div>
                </div>
            </nav>
        </div>
        <div class="main">
            <div class="table-container">
                <div class="asset-details">
                    <?php if ($admin) : ?>
                        <img src="admin.jpg" alt="Admin Image" style="max-width: 20%; height: auto;">
                        <table>
                            <tr>
                                <th>Field</th>
                                <th>Details</th>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><?php echo $admin['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td><?php echo $admin['age']; ?></td>
                            </tr>
                            <tr>
                                <td>Employee ID</td>
                                <td><?php echo $admin['employee_id']; ?></td>
                            </tr>
                        </table>
                        <div class="edit-profile-link">
                            <a href="edit_profile.php">Edit Profile</a>
                        </div>
                    <?php else : ?>
                        <p>No data found for user: <?php echo htmlspecialchars($logged_in_username); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>
<?php
ob_end_flush(); // End output buffering and flush the output
?>
