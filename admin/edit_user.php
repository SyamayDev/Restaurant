<?php
session_start();  // Tambahkan session start di awal file
$host = "localhost";
$username = "root";
$password = "";
$database = "member_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "UPDATE member SET nama='$name', no_hp='$phone', email='$email' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Gunakan JavaScript untuk alert dan refresh halaman
        echo "<script>
                alert('Data Berhasil di Update');
                window.location.href = 'dashboard_admin.php';
              </script>";
    } else {
        $_SESSION['error'] = "Error updating member: " . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM member WHERE id='$id'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    echo json_encode($user);
}

$conn->close();
?>
