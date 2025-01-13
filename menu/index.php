<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/sidebar.css">

        <title>Bagian Menu</title>
    </head>
    <body>
    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="../index.php" class="nav__logo">Rilstaurant</a>
            <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
        </nav>
    </header>

    <!--========== MENU ==========-->
    <section class="menu section bd-container" id="menu">
        <span class="section-subtitle">Spesial</span>
        <h2 class="section-title">Menu Lezat Dari Kami</h2>

        <div class="menu__container bd-grid">
            <div class="menu__content">
                <img src="../img/plate1.png" alt="" class="menu__img">
                <h3 class="menu__name">Salad Barbecue</h3>
                <span class="menu__detail">Hidangan lezat</span>
                <span class="menu__preci">Rp330.000</span>
                <a href="#" class="button menu__button" data-name="Salad Barbecue" data-price="330000"><i class='bx bx-cart-alt'></i></a>
            </div>

            <div class="menu__content">
                <img src="../img/plate2.png" alt="" class="menu__img">
                <h3 class="menu__name">Salad dengan Ikan</h3>
                <span class="menu__detail">Hidangan lezat</span>
                <span class="menu__preci">Rp180.000</span>
                <a href="#" class="button menu__button" data-name="Salad dengan Ikan" data-price="180000"><i class='bx bx-cart-alt'></i></a>
            </div>
            
            <div class="menu__content">
                <img src="../img/plate3.png" alt="" class="menu__img">
                <h3 class="menu__name">Salad Bayam</h3>
                <span class="menu__detail">Hidangan lezat</span>
                <span class="menu__preci">Rp142.500</span>
                <a href="#" class="button menu__button" data-name="Salad Bayam" data-price="142500"><i class='bx bx-cart-alt'></i></a>
            </div>
        </div>
    </section>
    

    <!--========== SIDEBAR ==========-->
    <div id="sidebar" class="sidebar">
        <h3>Pesanan Anda</h3>
        <div id="order-list" class="order-list">
            <!-- Pesanan akan ditambahkan di sini -->
        </div>
        <div class="sidebar-total">
            <p>Total: <span id="total-price">Rp0</span></p>
        </div>
        <button class="button" id="order-now">Pesan Sekarang</button>
    </div>

    <!-- Overlay untuk mendeteksi klik di luar sidebar -->
    <div id="overlay" class="overlay"></div>

    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- tes -->
</body>

</html>
