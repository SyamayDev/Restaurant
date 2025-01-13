<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pesanan.css">
    <link href='https://unpkg.com/boxicons@latest/css/boxicons.min.css' rel='stylesheet'> <!-- Menambahkan link Boxicons -->
    <title>Pesanan Anda</title>
</head>

<body class="light-theme">
    <div class="container">
        <header>
            <h2>Pesanan Anda</h2>
        </header>
        
        <form id="order-form">
            <div class="order-list" id="order-list">
                <!-- Pesanan akan muncul di sini -->
            </div>
            <div class="order-total">
                Total:  <span id="total-price">Rp0</span>
                <button type="button" class="button" id="checkout">Checkout</button>
                <button type="button" class="button" id="order-button">Pesan</button> <!-- Tombol Pesan -->
            </div>
        </form>
    </div>
    <script src="../js/pesanan.js"></script>

</body>
</html>
