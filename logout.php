<?php
// Start session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the homepage after logout
header("Location: homepage.html");
exit();
?>
