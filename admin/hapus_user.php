<?php
session_start();
include('koneksi.php'); // Pastikan file ini memiliki koneksi $koneksi yang benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];  // Mengambil ID dari form dengan metode POST

        // Query untuk menghapus member
        $query = "DELETE FROM member WHERE id='$id'";
        if (mysqli_query($koneksi, $query)) {
            // Set session message untuk berhasil
            $_SESSION['success'] = 'Member has been deleted successfully';
        } else {
            // Set session message untuk error
            $_SESSION['error'] = 'Failed to delete member: ' . mysqli_error($koneksi);
        }

        // Redirect ke dashboard_admin.php
        header('Location: dashboard_admin.php');
        exit();
    } else {
        // Jika ID tidak ditemukan di POST
        $_SESSION['error'] = 'ID member not found';
        header('Location: dashboard_admin.php');
        exit();
    }
}
?>
