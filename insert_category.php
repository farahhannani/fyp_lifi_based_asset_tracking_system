<?php
$name = $_POST['name'];

$conn = new mysqli('localhost', 'root', '', 'asset_tracking');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO categories (name) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $name);

if ($stmt->execute()) {
    echo "New category inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
<br><a href="add_category.php">Go Back</a>
<br><a href="index.php">Go to Asset Insertion</a>
