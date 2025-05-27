<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $role = $_POST['role'];

    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

    if ($role == "admin") {
        header("Location: admin.php");
    } else {
        header("Location: dashboard.php");
    }
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title><link rel="stylesheet" href="style.css"></head>
<body>
<h2>Login</h2>
<form method="post">
    Username: <input type="text" name="username" required><br><br>
    Role:
    <select name="role">
        <option value="student">Student</option>
        <option value="admin">Admin</option>
    </select><br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>
