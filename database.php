<?php
$servername = "sql303.infinityfree.com";
$username = "if0_36799426";
$password = "G0ldseatad";
$dbname = "if0_36799426_jeux_olympique";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
