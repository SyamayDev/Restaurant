document.addEventListener('DOMContentLoaded', function () {
    const cartButtons = document.querySelectorAll('.menu__button');
    const sidebar = document.getElementById('sidebar');
    const orderList = document.getElementById('order-list');
    const totalPriceElement = document.getElementById('total-price');
    const overlay = document.getElementById('overlay');
    let totalPrice = 0;

    // Menangani penambahan item ke sidebar ketika tombol ditambahkan ke keranjang diklik
    cartButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            // Ambil data dari tombol
            const itemName = this.getAttribute('data-name');
            const itemPrice = parseInt(this.getAttribute('data-price'));

            // Buat elemen pesanan baru
            const orderItem = document.createElement('div');
            orderItem.classList.add('order-item');
            orderItem.innerHTML = `<p>${itemName} - Rp${itemPrice.toLocaleString()}</p>`;

            // Tambahkan ke daftar pesanan
            orderList.appendChild(orderItem);

            // Tambah harga total
            totalPrice += itemPrice;
            totalPriceElement.innerText = `Rp${totalPrice.toLocaleString()}`;

            // Tampilkan sidebar dan overlay
            sidebar.classList.add('active');
            overlay.style.display = 'block';
        });
    });

    // Tombol "Pesan Sekarang"
    document.getElementById('order-now').addEventListener('click', function () {
        // Tampilkan alert input untuk nomor handphone menggunakan SweetAlert
        Swal.fire({
            title: "Masukkan nomor handphone Anda",
            input: "text",
            html: `<p>Belum punya member? <a href="../pelanggan/daftar_member.php" style="color: blue;">Daftar di sini!</a></p>`,
            inputAttributes: {
                autocapitalize: "off",
                placeholder: "Nomor handphone"
            },
            showCancelButton: true,
            confirmButtonText: "Verifikasi",
            showLoaderOnConfirm: true,
            preConfirm: async (phone) => {
                try {
                    // Kirim permintaan ke server untuk verifikasi nomor handphone
                    const response = await fetch(`../pelanggan/verifikasi_no_hp.php?phone=${phone}`);
                    const result = await response.json();

                    // Jika tidak valid, tampilkan pesan error
                    if (!response.ok || !result.valid) {
                        return Swal.showValidationMessage(`Nomor handphone tidak valid.`);
                    }

                    // Jika valid, lanjutkan
                    return phone;
                } catch (error) {
                    Swal.showValidationMessage(`Request failed: ${error}`);
                }
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                // Simpan pesanan ke localStorage jika verifikasi berhasil
                const orderItems = [];
                document.querySelectorAll('.order-item').forEach(item => {
                    const name = item.querySelector('p').innerText.split(' - ')[0];
                    const price = parseInt(item.querySelector('p').innerText.split('Rp')[1].replace('.', ''));
                    orderItems.push({ name, price, quantity: 1 });
                });

                // Simpan ke localStorage
                localStorage.setItem('orders', JSON.stringify(orderItems));

                // Jika verifikasi berhasil, arahkan ke halaman pesanan
                window.location.href = "../pesanan/index.php";
            }
        });
    });

    // Event listener untuk menutup sidebar saat klik di luar area sidebar (overlay)
    overlay.addEventListener('click', function () {
        sidebar.classList.remove('active');
        overlay.style.display = 'none';
    });

    // Tema dark/light mode
    const themeButton = document.getElementById('theme-button');
    const body = document.body;

    const darkTheme = 'dark-theme';
    const iconTheme = 'bx-sun';

    const selectedTheme = localStorage.getItem('selected-theme');
    const selectedIcon = localStorage.getItem('selected-icon');

    if (selectedTheme) {
        body.classList.toggle(darkTheme, selectedTheme === 'dark');
        themeButton.classList.toggle(iconTheme, selectedIcon === 'bx bx-sun');
    }

    const getCurrentTheme = () => body.classList.contains(darkTheme) ? 'dark' : 'light';
    const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'bx bx-sun' : 'bx bx-moon';

    themeButton.addEventListener('click', () => {
        body.classList.toggle(darkTheme);
        themeButton.classList.toggle(iconTheme);
        localStorage.setItem('selected-theme', getCurrentTheme());
        localStorage.setItem('selected-icon', getCurrentIcon());
    });
});
