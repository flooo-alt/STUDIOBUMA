<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Bumi Matyam</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Main Page -->
    <div id="mainPage">
        <!-- Header -->
        <header>
            <nav>
                <div class="logo">Bumi Maryam</div>
                <ul class="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#services">Layanan & Produk</a></li>
                    <li><a href="#visit">Lokasi</a></li>
                    <li><a href="#adminPage" class="admin-btn" id="adminBtn"> Admin</a></li>
                </ul>
            </nav>
        </header>

        <!-- Hero Section -->
        <section id="home" class="hero">
            <div class="hero-content">
                <h1>Selamat Datang</h1>
                <h1>Di Studio BUMA</h1>
                <p>Abadikan moment dengan sempurna</p>
                <div class="hero-buttons">
                    <a href="#services" class="btn btn-primary">Lihat Layanan/Produk kami</a>
                    <a href="https://www.whatsapp.com/channel/0029Vape3XAFHWq0f5AeNK16" target="_blank" class="btn btn-secondary">Channel WA Sahabat Bumi</a>
                </div>
            </div>
            <div class="hero-bg"></div>
        </section>

        <!-- Combined Services & Products Section -->
        <section id="services" class="services-products-section">
            <h2 class="section-main-title">✨ Layanan & Produk Kami</h2>
            
            <div class="combined-container">
                <!-- LAYANAN (KIRI) -->
                <div class="section-box">
                    <div class="section-header">
                        <h2>📸 Photo Group</h2>
                        <p>Setiap package hanya 5 orang</p>
                        <p>Tambahan biaya 15k/orang</p>
                    </div>

                    <!-- Preview Cards -->
                    <div class="preview-cards">
                        <div class="card-compact">
                            <h3>Package Leaf</h3>
                            <span class="price-tag">Rp 125K</span>
                            <br></br>
                            <p>25 Menit/Sesi</p>
                            <p>1 Background & 1 Tema</p>
                            <p>All File Original</p>
                            <p>3 foto print UK 10R</p>
                            <p>Maks 5 orang</p>
                        </div>

                        <div class="card-compact">
                            <h3>Package Breeze</h3>
                            <span class="price-tag">Rp 175K</span>
                            <br></br>
                            <p>45 Menit/Sesi</p>
                            <p>2 Background & 2 Tema</p>
                            <p>All File Original</p>
                            <p>5 foto print UK 10R</p>
                            <p>Maks 5 orang</p>
                        </div>
                        <div class="card-compact">
                            <h3>Package DAWN</h3>
                            <span class="price-tag">Rp 225K</span>
                            <br></br>
                            <p>60 Menit/Sesi</p>
                            <p>2 Background & 2 Tema</p>
                            <p>All File Original</p>
                            <p>5 foto print UK 10R</p>
                            <p>Maks 5 orang</p>
                            </div>>
                        </div>
                    </div>

                <!-- PRODUK (KANAN) -->
                <div class="section-box">
                    <div class="section-header">
                        <h2>📸 Photo Family</h2>
                        <p>Setiap package hanya 3 orang</p>
                        <p>Tambahan biaya 15k/orang</p>
                    </div>

                    <!-- Preview Cards -->
                    <div class="preview-cards">
                        <div class="card-compact">
                            <h3>Package Excited</h3>
                            <span class="price-tag">Rp 125K</span>
                            <br></br>
                            <p>25 Menit/Sesi</p>
                            <p>1 Background & 1 Tema</p>
                            <p>All File Original</p>
                            <p>3 foto edit</p>
                            <p>1 foto print UK A4</p>
                        </div>
                        <div class="card-compact">
                            <h3>Package Delighted</h3>
                            <span class="price-tag">Rp 175K</span>
                            <br></br>
                            <p>45 Menit/Sesi</p>
                            <p>2 Background & 2 Tema</p>
                            <p>All File Original</p>
                            <p>5 foto edit</p>
                            <p>1 foto print UK A4</p>
                        </div>
                        <div class="card-compact">
                            <h3>Package Excited</h3>
                            <span class="price-tag">Rp 225K</span>
                            <br></br>
                            <p>60 Menit/Sesi</p>
                            <p>2 Background & 2 Tema</p>
                            <p>All File Original</p>
                            <p>7 foto edit</p>
                            <p>1 foto print UK A4</p>                       </div>
                    </div>
                </div>
            </div>
        </section>
       <section class="cta-section">
    <div class="cta-container">

        <!-- KIRI -->
        <div class="cta-left">
            <h1>What are you<br>Waiting for?</h1>
<br>
<br>
<br>
            <div class="image-grid-left">
                <img src="image/GPA.jpeg" alt="">
                <img src="image/FMA.jpeg" alt="">
            </div>
        </div>

        <!-- KANAN -->
        <div class="cta-right">
            <p>
                Mengabadikan momen lewat foto adalah cara sederhana untuk
                menyimpan rasa, cerita, dan kebahagiaan yang tak terulang.
                Karena momen berlalu cepat, tapi foto membuatnya tinggal
                lebih lama di hati.
            </p>

            <a href="#" class="cta-btn">BOOK NOW</a>
<br>
<br>
            <div class="image-grid-right">
                <img src="image/FMB.jpeg" alt="">
            </div>
        </div>

    </div>
</section>
 

        <!-- Visit Section -->
        <section id="visit" class="visit-section">
            <h2 class="visit-title">📍 Kunjungi Kami</h2>

            <div class="visit-container">
                <div class="visit-info">
                    <div class="visit-card">
                        <h3>📌 Alamat</h3>
                        <p>
                            Jl. Andir No.15,<br>
                            Cariang, Kec. Andir,<br>
                            Bandung Wetan 40183
                        </p>
                    </div>

                    <div class="visit-card">
                        <h3>📞 Kontak</h3>
                        <p><a href="tel:08569003407">0856-9003-407</a></p>
                    </div>

                    <div class="visit-card">
                        <h3>⏰ Jam Operasional</h3>
                        <p>
                            Senin – Minggu: 07.00 – 21.00<br>
                        </p>
                    </div>

                    <a href="https://maps.app.goo.gl/4x39SkMkhizdzzFx7" target="_blank" class="maps-btn">
                        🗺️ Buka di Google Maps
                    </a>
                </div>

                <div class="visit-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3147.5486532991467!2d107.58498668342962!3d-6.917499818810736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7f842889af1%3A0xd54200906144425e!2sBumi%20Maryam!5e1!3m2!1sid!2sid!4v1769037957111!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>   
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="footer-content">
                <h3>📋 BUMA STUDIO</h3>
                <p>Jl. Andir No.15, Cariang, Kec. Andir, Bandung Wetan 40183</p>
                <p>Buka: Senin – Minggu: 07.00 – 21.00</p>
                <div class="social-links">
                    <a href="https://wa.me/628569003407" target="_blank">📱 WhatsApp</a>
                    <a href="tel:08569003407">📞 Telepon</a>
                    <a href="https://maps.app.goo.gl/4x39SkMkhizdzzFx7" target="_blank">🗺️ Maps</a>
                </div>
                <p style="margin-top: 2rem; color: #95a5a6;">&copy; 2026 BUMA STUDIO. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Admin Page -->
    <div id="adminPage" class="admin-page">
        <header>
            <nav>
                <div class="logo">🔐 Admin Panel</div>
                <ul class="nav-links">
                    <li><a href="#" id="backBtn" class="admin-btn">← Kembali</a></li>
                </ul>
            </nav>
        </header>

        <div class="admin-container">
            <div class="dashboard-header">
                <h1>Dashboard Admin</h1>
                <p>Kelola daftar layanan BUMA</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-content">
                        <span class="stat-icon">📋</span>
                        <div class="stat-label">Pesanan Hari Ini</div>
                        <div class="stat-number">156</div>
                        <div class="stat-change">↑ 12% dari kemarin</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-content">
                        <span class="stat-icon">✅</span>
                        <div class="stat-label">Pesanan Selesai</div>
                        <div class="stat-number">142</div>
                        <div class="stat-change">91% completion</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-content">
                        <span class="stat-icon">⏳</span>
                        <div class="stat-label">Sedang Diproses</div>
                        <div class="stat-number">14</div>
                        <div class="stat-change">Butuh perhatian</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-content">
                        <span class="stat-icon">💰</span>
                        <div class="stat-label">Pendapatan Hari Ini</div>
                        <div class="stat-number">Rp 2.5jt</div>
                        <div class="stat-change">↑ 8% dari rata-rata</div>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2 class="section-title">⚙️ Menu Administrasi</h2>
                <div class="action-grid">
                    <button class="action-btn" id="kelolaPesananBtn">
                        <span class="action-icon">📦</span>
                        <span class="action-text">Kelola Pesanan</span>
                    </button>
                    <button class="action-btn" id="kelolaProdukBtn">
                        <span class="action-icon">📋</span>
                        <span class="action-text">Kelola Produk</span>
                    </button>
                    <button class="action-btn" id="kelolaHargaBtn">
                        <span class="action-icon">💵</span>
                        <span class="action-text">Kelola Harga</span>
                    </button>
                    <button class="action-btn" id="laporanKeuanganBtn">
                        <span class="action-icon">📊</span>
                        <span class="action-text">Laporan Keuangan</span>
                    </button>
                    <button class="action-btn" id="kelolaStaffBtn">
                        <span class="action-icon">👥</span>
                        <span class="action-text">Kelola Staff</span>
                    </button>
                    <button class="action-btn" id="pengaturanBtn">
                        <span class="action-icon">⚙️</span>
                        <span class="action-text">Pengaturan</span>
                    </button>
                </div>
            </div>

            <div class="section">
                <h2 class="section-title">📊 Aktivitas Terbaru</h2>
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-text">
                            <div class="activity-title">Pesanan baru dari Budi</div>
                            <div class="activity-time">5 menit yang lalu</div>
                        </div>
                        <span class="activity-badge">Baru</span>
                    </li>
                    <li class="activity-item">
                        <div class="activity-text">
                            <div class="activity-title">Pesanan Siti telah selesai</div>
                            <div class="activity-time">15 menit yang lalu</div>
                        </div>
                        <span class="activity-badge">Selesai</span>
                    </li>
                    <li class="activity-item">
                        <div class="activity-text">
                            <div class="activity-title">Stock kertas HVS berkurang</div>
                            <div class="activity-time">1 jam yang lalu</div>
                        </div>
                        <span class="activity-badge">Perhatian</span>
                    </li>
                </ul>
            </div>
        </div>

        <footer>
            <p>&copy; 2025 Adiba Photocopy Admin. All rights reserved.</p>
        </footer>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>