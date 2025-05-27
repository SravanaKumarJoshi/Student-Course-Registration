<?php
$servername = "localhost";
$username = "root";
$password = "root"; // most XAMPP setups use no password by default
$dbname = "course_db";
$port = 3307; // this is required due to your config

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>
