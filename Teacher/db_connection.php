<?php
// Database configuration
$host = 'localhost'; // e.g., 'localhost'
$dbname = 'university';
$username = 'root';
$password = '';

// Attempt to connect to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
