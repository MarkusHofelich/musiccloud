<?php
$servername = "127.0.0.1";
$username = "markus-testbase";
$password = "1";
$db = "markus-testbase";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>


