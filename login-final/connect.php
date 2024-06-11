<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Assuming your MySQL username is 'root'
$password = ""; // Assuming your MySQL password is empty
$dbname = "login1"; 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
