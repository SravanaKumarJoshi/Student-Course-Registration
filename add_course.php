<?php
include("db.php");
$name = $_POST['name'];
$seats = $_POST['seats'];
$conn->query("INSERT INTO courses (name, max_seats) VALUES ('$name', $seats)");
header("Location: admin.php");
?>
