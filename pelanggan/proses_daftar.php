<?php
// Mulai session
session_start();

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'member_db');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];

// Cek apakah no_hp sudah ada
$check_sql = "SELECT * FROM member WHERE no_hp = '$no_hp'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    // Jika no_hp sudah terdaftar, tampilkan pesan error
    $_SESSION['error_message'] = "Nomor HP sudah terdaftar.";
    header("Location: daftar_member.php");
    exit;
} else {
    // Masukkan data member baru
    $sql = "INSERT INTO member (nama, no_hp) VALUES ('$nama', '$no_hp')";
    if ($conn->query($sql) === TRUE) {
        // Simpan session bahwa pendaftaran berhasil
        $_SESSION['registration_success'] = true;

        // Redirect ke halaman member_terdaftar.php
        header("Location: member_terdaftar.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
