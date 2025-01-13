<?php
// Sambungan ke database
$host = "localhost"; // Sesuaikan dengan konfigurasi database Anda
$username = "root";  // Sesuaikan dengan konfigurasi database Anda
$password = "";      // Sesuaikan dengan konfigurasi database Anda
$database = "member_db"; // Nama database sesuai dengan yang Anda gunakan

$conn = new mysqli($host, $username, $password, $database);

// Periksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Dapatkan nomor handphone dari query string
$phone = $_GET['phone'];

// Query untuk mencari nomor handphone di kolom no_hp
$sql = "SELECT * FROM member WHERE no_hp = '$phone'";
$result = $conn->query($sql);

// Cek apakah nomor handphone ditemukan
if ($result->num_rows > 0) {
    echo json_encode(['valid' => true]);
} else {
    echo json_encode(['valid' => false]);
}

$conn->close();
?>
