<?php
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
    $admin_pass = password_hash($_POST['admin_pass'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (username, password) VALUES ('$admin_user', '$admin_pass')";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman login_admin.php setelah sukses
        header("Location: login_admin.php");
        exit(); // Penting untuk memastikan bahwa tidak ada kode lain yang dieksekusi
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
