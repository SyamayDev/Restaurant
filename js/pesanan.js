let orders = JSON.parse(localStorage.getItem('orders')) || [];
const orderList = document.getElementById('order-list');
const totalPriceElement = document.getElementById('total-price');
let totalPrice = 0;

// Fungsi untuk menghitung total harga
function calculateTotal() {
    totalPrice = orders.reduce((total, item) => total + (item.price * item.quantity * 1000), 0); // Mengalikan harga dengan 1000
    totalPriceElement.innerText = `Rp${totalPrice.toLocaleString()}`;
}

// Fungsi untuk render pesanan
function renderOrders() {
    orderList.innerHTML = '';
    orders.forEach((order, index) => {
        const orderItem = document.createElement('div');
        orderItem.classList.add('order-item');
        orderItem.innerHTML = `
            <p>${order.name} - Rp${(order.price * 1000).toLocaleString()}</p>  <!-- Mengalikan harga dengan 1000 -->
            <div>
                <button class="minus" data-index="${index}">-</button>
                <span>${order.quantity}</span>
                <button class="plus" data-index="${index}">+</button>
                <button class="remove" data-index="${index}">Hapus</button>
            </div>
        `;
        orderList.appendChild(orderItem);
    });
    calculateTotal();
}

// Tambah jumlah pesanan
orderList.addEventListener('click', function(e) {
    if (e.target.classList.contains('plus')) {
        const index = e.target.getAttribute('data-index');
        orders[index].quantity++;
        renderOrders();
    }

    // Kurangi jumlah pesanan
    if (e.target.classList.contains('minus')) {
        const index = e.target.getAttribute('data-index');
        if (orders[index].quantity > 1) {
            orders[index].quantity--;
        } else {
            orders.splice(index, 1);
        }
        renderOrders();
    }

    // Hapus pesanan
    if (e.target.classList.contains('remove')) {
        const index = e.target.getAttribute('data-index');
        orders.splice(index, 1);
        renderOrders();
    }

    // Update localStorage
    localStorage.setItem('orders', JSON.stringify(orders));
});

// Render pesanan saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    renderOrders();
});

// Tombol checkout
document.getElementById('checkout').addEventListener('click', function() {
    if (orders.length === 0) {
        alert('Tidak ada pesanan untuk di-checkout.');
    } else {
        alert(`Total pesanan Anda adalah Rp${totalPrice.toLocaleString()}`);
    }
});

// Mengirim struk pesanan ke WhatsApp
const orderButton = document.getElementById('order-button');

function sendOrderToWhatsApp() {
    if (orders.length === 0) {
        alert('Tidak ada pesanan untuk dikirim.');
        return;
    }

    let orderDetails = 'Struk Pesanan:\n';
    orderDetails += ' ___________________________________________________________\n';
    orderDetails += '|                         STRUK PESANAN                     |\n';
    orderDetails += '|___________________________________________________________|\n';
    orderDetails += '|          Nama           |       Harga        |  Jumlah  |\n';
    orderDetails += '|-------------------------|--------------------|----------|\n';

    orders.forEach(order => {
        orderDetails += `| ${order.name.padEnd(23)} | Rp ${(order.price * 1000).toLocaleString().padStart(16)} |   ${order.quantity.toString().padStart(6)}   |\n`; // Mengalikan harga dengan 1000
    });

    orderDetails += '|-------------------------|--------------------|----------|\n';
    orderDetails += `| Total: Rp ${totalPrice.toLocaleString().padStart(18)} |\n`;
    orderDetails += ' ----------------------------------------------------------- \n';

    // Ganti dengan nomor WhatsApp Anda
    const phoneNumber = '6282267403010'; // Nomor WA Anda
    const message = encodeURIComponent(orderDetails);
    const whatsappURL = `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${message}`;

    window.open(whatsappURL, '_blank');
}

// Event listener untuk tombol Pesan
orderButton.addEventListener('click', sendOrderToWhatsApp);
