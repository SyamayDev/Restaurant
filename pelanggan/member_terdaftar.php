<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../css/member_terdaftar.css"> <!-- Pastikan path CSS benar -->
    <!-- SweetAlert Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<!-- Konten halaman -->

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Cek apakah ada session registration_success
    <?php if (isset($_SESSION['registration_success']) && $_SESSION['registration_success'] === true): ?>
        Swal.fire({
            position: 'center', // Mengatur posisi ke tengah
            icon: 'success',
            title: 'Member Terdaftar, Selesaikan Kembali Pesanan Kamu',
            showConfirmButton: true,
            confirmButtonText: 'Lanjutkan',
            allowOutsideClick: false, // Tidak bisa menutup dengan klik luar
            preConfirm: () => {
                window.location.href = '../menu/index.php'; // Arahkan ke menu.php saat tombol "Lanjutkan" diklik
            }
        });
        // Hapus session setelah alert ditampilkan
        <?php unset($_SESSION['registration_success']); ?>
    <?php endif; ?>
});
</script>

</body>
</html>
