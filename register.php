<?php
session_start();
include("db.php");
if ($_SESSION['role'] != 'student') {
    header("Location: index.php");
    exit();
}
$username = $_SESSION['username'];
$course_id = $_GET['id'];

$check = $conn->query("SELECT COUNT(*) as cnt FROM registrations WHERE student='$username'");
$limit = 3; // max courses per student
if ($check->fetch_assoc()['cnt'] < $limit) {
    $conn->query("INSERT INTO registrations (student, course_id) VALUES ('$username', $course_id)");
}
header("Location: dashboard.php");
?>
