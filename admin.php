<?php
session_start();
include("db.php");
if ($_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}
$courses = $conn->query("SELECT * FROM courses");
?>

<!DOCTYPE html>
<html>
<head><title>Admin Panel</title></head>
<body>
<h2>Admin Panel | <a href="logout.php">Logout</a></h2>
<h3>Courses</h3>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Max Seats</th><th>Action</th></tr>
<?php while ($row = $courses->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['max_seats']}</td>
        <td><a href='delete_course.php?id={$row['id']}'>Delete</a></td>
    </tr>";
} ?>
</table>

<h3>Add New Course</h3>
<form action="add_course.php" method="post">
    Course Name: <input type="text" name="name" required>
    Max Seats: <input type="number" name="seats" required>
    <button type="submit">Add</button>
</form>
</body>
</html>
