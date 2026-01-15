 // Navigation between Main Page and Admin Page
document.getElementById('adminBtn').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('mainPage').style.display = 'none';
    document.getElementById('adminPage').classList.add('active');
    window.scrollTo(0, 0);
});

document.getElementById('backBtn').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('mainPage').style.display = 'block';
    document.getElementById('adminPage').classList.remove('active');
    window.scrollTo(0, 0);
});

// Toggle Services Full Cards
document.getElementById('servicesToggleBtn').addEventListener('click', function() {
    const fullCards = document.getElementById('servicesFullCards');
    const toggleText = document.getElementById('servicesToggleText');

    if (fullCards.classList.contains('expanded')) {
        fullCards.classList.remove('expanded');
        toggleText.textContent = '📖 Lihat Semua Layanan';
    } else {
        fullCards.classList.add('expanded');
        toggleText.textContent = '📖 Sembunyikan Layanan';
    }
});

// Toggle Products Full Cards
document.getElementById('productsToggleBtn').addEventListener('click', function() {
    const fullCards = document.getElementById('productsFullCards');
    const toggleText = document.getElementById('productsToggleText');

    if (fullCards.classList.contains('expanded')) {
        fullCards.classList.remove('expanded');
        toggleText.textContent = '📖 Lihat Semua Produk';
    } else {
        fullCards.classList.add('expanded');
        toggleText.textContent = '📖 Sembunyikan Produk';
    }
});

// Order Button Functionality
document.querySelectorAll('.order-btn').forEach(button => {
    button.addEventListener('click', function() {
        const service = this.getAttribute('data-service');
        const product = this.getAttribute('data-product');

        const phoneNumber = '6285191163819';
        let message = '';

        if (service) {
            message = `Halo, saya tertarik dengan layanan *${service}*. Mohon informasi lebih lanjut.`;
        } else if (product) {
            message = `Halo, saya ingin memesan:\n\n*${product}*\n\nMohon informasi lebih lanjut.`;
        }

        if (message) {
            const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
            window.open(url, '_blank');
        }
    });
});

// Smooth Scrolling for Navigation Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href.startsWith('#') && href.length > 1) {
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    });
});

// Admin Button Functions
document.getElementById('kelolaPesananBtn').addEventListener('click', function() {
    showNotification('Fitur Kelola Pesanan', 'Fitur ini akan menampilkan daftar pesanan Anda');
});

document.getElementById('kelolaProdukBtn').addEventListener('click', function() {
    showNotification('Fitur Kelola Produk', 'Kelola produk dan layanan yang Anda tawarkan');
});

document.getElementById('kelolaHargaBtn').addEventListener('click', function() {
    showNotification('Fitur Kelola Harga', 'Atur dan perbarui harga produk dan layanan');
});

document.getElementById('laporanKeuanganBtn').addEventListener('click', function() {
    showNotification('Laporan Keuangan', 'Lihat laporan pendapatan dan pengeluaran');
});

document.getElementById('kelolaStaffBtn').addEventListener('click', function() {
    showNotification('Kelola Staff', 'Kelola data karyawan dan jadwal kerja');
});

document.getElementById('pengaturanBtn').addEventListener('click', function() {
    showNotification('Pengaturan', 'Atur preferensi dan konfigurasi sistem');
});

// Notification Function
function showNotification(title, message) {
    alert(`${title}\n\n${message}\n\nFitur ini akan segera dikembangkan.`);
}

// Active Link Highlighting
window.addEventListener('scroll', function() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-links a[href^="#"]');

    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (scrollY >= (sectionTop - 200)) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href').includes(current)) {
            link.classList.add('active');
        }
    });
});

// Prevent scrolling when modal is open
function lockScroll() {
    document.body.style.overflow = 'hidden';
}

function unlockScroll() {
    document.body.style.overflow = 'auto';
}

// Create WhatsApp Floating Button
function createWhatsAppButton() {
    const phoneNumber = '6285191163819';
    const whatsappLink = `https://wa.me/${phoneNumber}`;
    
    const whatsappButton = document.createElement('a');
    whatsappButton.href = whatsappLink;
    whatsappButton.target = '_blank';
    whatsappButton.rel = 'noopener noreferrer';
    whatsappButton.className = 'whatsapp-float';
    whatsappButton.innerHTML = '<span class="whatsapp-icon">💬</span>';
    whatsappButton.title = 'Chat dengan kami di WhatsApp';
    
    document.body.appendChild(whatsappButton);
}

// Page initialization
document.addEventListener('DOMContentLoaded', function() {
    console.log('Adiba Photocopy website loaded successfully');
    createWhatsAppButton();
});
