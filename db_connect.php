<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_management"; // Ensure this matches your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
