<?php
session_start();
include("db.php");
if ($_SESSION['role'] != 'student') {
    header("Location: index.php");
    exit();
}
$username = $_SESSION['username'];
$courses = $conn->query("SELECT * FROM courses");

$registered = $conn->query("SELECT course_id FROM registrations WHERE student='$username'");
$registered_ids = [];
while ($row = $registered->fetch_assoc()) {
    $registered_ids[] = $row['course_id'];
}
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
<h2>Welcome, <?php echo $username; ?> | <a href="logout.php">Logout</a></h2>
<h3>Available Courses</h3>
<table border="1">
    <tr><th>ID</th><th>Course</th><th>Seats</th><th>Action</th></tr>
    <?php while ($row = $courses->fetch_assoc()) {
        $course_id = $row['id'];
        $count = $conn->query("SELECT COUNT(*) as cnt FROM registrations WHERE course_id=$course_id")->fetch_assoc()['cnt'];
        $seats_left = $row['max_seats'] - $count;
        echo "<tr>
            <td>{$row['id']}</td><td>{$row['name']}</td><td>$seats_left</td>
            <td>";
        if (in_array($course_id, $registered_ids)) {
            echo "Registered";
        } else if ($seats_left > 0) {
            echo "<a href='register.php?id={$course_id}'>Register</a>";
        } else {
            echo "Full";
        }
        echo "</td></tr>";
    } ?>
</table>
</body>
</html>
