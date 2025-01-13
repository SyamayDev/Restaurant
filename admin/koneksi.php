<?php
$host = "localhost";   // Nama host, biasanya 'localhost'
$username = "root";    // Username MySQL Anda, biasanya 'root' di server lokal
$password = "";        // Password MySQL Anda, kosong jika di server lokal
$database = "member_db"; // Nama database yang ingin Anda hubungkan

// Membuat koneksi ke database
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Jika berhasil terkoneksi
// echo "Koneksi berhasil";
?>
