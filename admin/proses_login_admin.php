<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "member_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_user = $_POST['admin_user'];
    $admin_pass = $_POST['admin_pass'];

    $sql = "SELECT * FROM admin WHERE username = '$admin_user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (password_verify($admin_pass, $admin['password'])) {
            $_SESSION['admin'] = $admin_user;
            header("Location: dashboard_admin.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No admin found.";
    }
}

$conn->close();
?>
