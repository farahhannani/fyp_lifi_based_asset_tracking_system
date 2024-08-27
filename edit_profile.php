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

// Handle form submission for updating profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs (for example, using htmlspecialchars() and mysqli_real_escape_string())

    // Update admin details in the database
    $name = $_POST['name']; // Example field from form
    $age = $_POST['age']; // Example field from form
    $employee_id = $_POST['employee_id']; // Example field from form

    // Prepare SQL statement to update admin details based on username
    $stmt = $conn->prepare("UPDATE admin SET name = ?, age = ?, employee_id = ? WHERE username = ?");
    $stmt->bind_param("ssss", $name, $age, $employee_id, $logged_in_username);
    $stmt->execute();

    // Redirect to profile page after update
    header("Location: admin_profile.php");
    exit();
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
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style>
        .main-container {
        display: flex;
        justify-content: center; /* Center the content horizontally */
        align-items: center; /* Center the content vertically */
    
    }

        
        /* Add your custom styles here */
        .edit-profile-container {
        width: 100%; /* Occupy full width of the parent container */
        max-width: 800px; /* Adjust this value as needed */
        background-color: #ffffff;
        padding: 20px;
        border: 1px solid #4b49ac;
        border-radius: 10px;
        overflow: hidden;
    }

        .edit-profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .edit-profile-container form {
            display: grid;
            gap: 10px;
        }

        .edit-profile-container form label {
            font-weight: bold;
        }

        .edit-profile-container form input[type="text"],
        .edit-profile-container form input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .edit-profile-container form input[type="submit"],
        .edit-profile-container form input[type="button"] {
            background-color: #4b49ac;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-profile-container form input[type="submit"]:hover,
        .edit-profile-container form input[type="button"]:hover {
            background-color: #333;
        }
    </style>
</head>

<body>
    <!-- Header and Navigation -->

    <!-- Main Container -->
    <div class="main-container">
        <div class="edit-profile-container">
            <h2>Edit Profile</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($admin['name']); ?>"
                    required>

                <label for="age">Age</label>
                <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($admin['age']); ?>"
                    required>

                <label for="employee_id">Employee ID</label>
                <input type="text" id="employee_id" name="employee_id"
                    value="<?php echo htmlspecialchars($admin['employee_id']); ?>" required>

                <input type="submit" value="Save Changes">
                <input type="button" value="Cancel" onclick="window.location.href='admin_profile.php';">
            </form>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>
<?php
ob_end_flush(); // End output buffering and flush the output
?>
