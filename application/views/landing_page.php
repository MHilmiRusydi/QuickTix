<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4A90E2;
            --secondary-color: #2C3E50;
            --accent-color: #E74C3C;
            --text-color: #333333;
            --background-color: #F5F6FA;
            --white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--background-color);
        }
        
        .navbar {
            background-color: var(--white);
            padding: 1rem 5%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            gap: 2rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-login {
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-login:hover {
            background-color: var(--primary-color);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .btn-register {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .btn-register:hover {
            background-color: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .btn-search {
            background: var(--primary-color);
            color: var(--white);
            border: none;
            margin-right: 0.5rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s;
        }

        .btn-search i {
            margin-right: 0.3rem;
        }

        .btn-search:hover {
            background: #357ABD;
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74,144,226,0.18);
        }

        .hero {
            padding: 12rem 5% 4rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, #357ABD 100%);
            color: var(--white);
            text-align: center;
            /* Tambahan agar tidak tertutup navbar di mobile */
            box-sizing: border-box;
        }
        @media (max-width: 768px) {
            .hero {
                padding-top: 8rem;
                /* Tambahan agar tidak tertutup navbar */
                margin-top: 70px;
            }
        }
        @media (max-width: 480px) {
            .hero {
                padding-top: 7rem;
                margin-top: 60px;
            }
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .features {
            padding: 4rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .features h2 {
            text-align: center;
            margin-bottom: 3rem;
            color: var(--primary-color);
        }

        .features-carousel-container {
            overflow: hidden;
            position: relative;
            -webkit-mask-image: linear-gradient(to right, transparent, black 20%, black 80%, transparent);
            mask-image: linear-gradient(to right, transparent, black 20%, black 80%, transparent);
        }
        
        .features-grid {
            display: flex;
            gap: 2rem;
            padding-bottom: 1rem;
            animation: featureScroll 40s linear infinite;
        }

        .features-carousel-container:hover .features-grid {
            animation-play-state: paused;
        }
        
        .feature-card {
            width: 280px; 
            flex-shrink: 0;
            background: var(--white);
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        @keyframes featureScroll {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(-2184px); /* (280px width + 32px gap) * 7 cards */
            }
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .feature-icon i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .feature-card p {
            color: #666;
        }

        .events {
            padding: 4rem 5%;
            background-color: var(--white);
        }

        .events h2 {
            text-align: center;
            margin-bottom: 3rem;
            color: var(--primary-color);
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .event-card {
            background: var(--background-color);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
            min-width: 0;
            max-width: 100%;
            width: 100%;
            box-sizing: border-box;
        }
        .event-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: #f4f6fa;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            display: block;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .event-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex: 1 1 auto;
            height: 100%;
        }
        .event-content h3 {
            margin-bottom: 0.5rem;
            color: var(--text-color);
            min-height: 2.6em;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .event-content p {
            color: #666;
            margin-bottom: 1rem;
        }
        .event-price {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.2rem;
            margin-top: auto;
        }
        @media (max-width: 768px) {
            .events-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            .event-card {
                max-width: 100%;
                margin: 0 auto;
            }
        }
        @media (max-width: 480px) {
            .event-image {
                height: 150px;
            }
            .event-content {
                padding: 1rem;
            }
        }
        
        /* Modal untuk menampilkan gambar */
        .image-modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(5px);
        }
        
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 90%;
            max-height: 90%;
            text-align: center;
        }
        
        .modal-image {
            max-width: 100%;
            max-height: 80vh;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        
        .close-modal {
            position: absolute;
            top: 20px;
            right: 30px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .close-modal:hover {
            color: var(--primary-color);
        }
        
        .modal-controls {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 1rem;
        }
        
        .modal-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .modal-btn:hover {
            background: #357ABD;
            transform: translateY(-2px);
        }

        .event-action-center {
            text-align: center;
            margin-top: 2.5rem;
        }
        .btn-go-events {
            display: inline-block;
            background: var(--primary-color);
            color: var(--white);
            padding: 0.8rem 2.2rem;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(74,144,226,0.13);
            transition: all 0.3s;
            border: none;
        }
        .btn-go-events i {
            margin-right: 0.7rem;
        }
        .btn-go-events:hover {
            background: #357ABD;
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(74,144,226,0.18);
        }

        .footer {
            background-color: var(--text-color);
            color: var(--white);
            padding: 3rem 5%;
            text-align: center;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer p {
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            color: var(--white);
            text-decoration: none;
            font-size: 1.2rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.2s;
        }

        .social-links a:hover {
            color: var(--primary-color);
        }

        .social-links i {
            font-size: 1.3em;
        }

        /* DIPERBAIKI: Kode responsif yang lebih komprehensif */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 1rem;
                padding: 0.5rem 0;
            }
            
            .nav-buttons {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 0.5rem;
            }
            
            .btn {
                padding: 0.4rem 1rem;
                font-size: 0.9rem;
            }
            
            .hero {
                padding: 8rem 5% 3rem;
            }
            
            .hero h1 {
                font-size: 1.8rem;
                line-height: 1.2;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .features {
                padding: 3rem 5%;
            }
            
            .features h2 {
                font-size: 1.5rem;
                margin-bottom: 2rem;
            }
            
            .features-carousel-container {
                -webkit-mask-image: none;
                mask-image: none;
            }
            
            .features-grid {
                flex-direction: column;
                animation: none;
                gap: 1rem;
            }
            
            .feature-card {
                width: 100%;
                margin: 0 auto;
                max-width: 350px;
            }
            
            .events {
                padding: 3rem 5%;
            }
            
            .events h2 {
                font-size: 1.5rem;
                margin-bottom: 2rem;
            }
            
            .events-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .event-card {
                max-width: 400px;
                margin: 0 auto;
            }
            
            .btn-go-events {
                padding: 0.7rem 1.8rem;
                font-size: 1rem;
            }
            
            .footer {
                padding: 2rem 5%;
            }
            
            .social-links {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .social-links a {
                font-size: 1rem;
            }
        }
        
        /* Tablet breakpoint */
        @media (max-width: 1024px) and (min-width: 769px) {
            .nav-container {
                gap: 1rem;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .features-grid {
                gap: 1.5rem;
            }
            
            .feature-card {
                width: 250px;
            }
        }
        
        /* Small mobile devices */
        @media (max-width: 480px) {
            .hero {
                padding-top: 7rem;
                margin-top: 60px;
            }
            
            .hero h1 {
                font-size: 1.5rem;
            }
            
            .hero p {
                font-size: 0.9rem;
            }
            
            .features, .events {
                padding: 2rem 3%;
            }
            
            .feature-card {
                padding: 1.5rem;
            }
            
            .event-content {
                padding: 1rem;
            }
            
            .btn-go-events {
                padding: 0.6rem 1.5rem;
                font-size: 0.9rem;
            }
            
            /* Modal responsif untuk mobile */
            .modal-content {
                max-width: 95%;
                max-height: 95%;
            }
            
            .modal-image {
                max-height: 70vh;
            }
            
            .close-modal {
                top: 10px;
                right: 15px;
                font-size: 30px;
            }
            
            .modal-controls {
                bottom: 10px;
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .modal-btn {
                padding: 0.4rem 0.8rem;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="<?php echo base_url(); ?>" class="logo">QuickTix</a>
            <div class="nav-buttons">
                <a href="<?php echo base_url('events/search'); ?>" class="btn btn-search"><i class="fas fa-search"></i> Cari Event</a>
                <a href="<?php echo base_url('auth/login'); ?>" class="btn btn-login">Masuk</a>
                <a href="<?php echo base_url('auth/register'); ?>" class="btn btn-register">Daftar</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>Tiket Cepat, Tanpa Ribet!</h1>
            <p>Temukan dan beli tiket event favoritmu dengan mudah dan aman</p>
        </div>
    </section>

    <section class="features" id="features">
        <h2>Mengapa Memilih QuickTix?</h2>
        <div class="features-carousel-container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">⚡</div><h3>Pembelian Cepat</h3><p>Proses pembelian tiket yang cepat dan mudah dalam hitungan menit</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div><h3>Pembayaran Aman</h3><p>Transaksi aman dengan berbagai metode pembayaran terpercaya</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div><h3>E-Ticket</h3><p>Terima tiket digital langsung ke email atau smartphone Anda</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-map-marked-alt"></i></div><h3>Tiket di Berbagai Daerah</h3><p>Pilih event dan konser dari berbagai kota besar di Indonesia</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-tags"></i></div><h3>Banyak Promosi & Diskon</h3><p>Nikmati promo menarik dan diskon spesial setiap bulannya</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-headset"></i></div><h3>Dukungan 24 Jam</h3><p>Customer service siap membantu Anda kapan saja</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-undo-alt"></i></div><h3>Proses Refund Mudah</h3><p>Refund tiket mudah dan transparan jika event dibatalkan</p>
                </div>
            </div>
        </div>
    </section>

    <section class="events" id="events">
        <h2>Event Terbaru</h2>
        <div class="events-grid">
            <div class="event-card">
                <img src="uploads/java-jazz.jpg" alt="Event 1" class="event-image" onclick="openImageModal(this.src, 'Konser Musik Jazz')">
                <div class="event-content">
                    <h3>Konser Musik Jazz</h3><p>Sabtu, 23 Juni 2025 • 19:00 WIB</p><p>Venue: Jakarta Convention Center</p><p class="event-price">Rp 250.000</p>
                </div>
            </div>
            <div class="event-card">
                <img src="uploads/digital-marketing.jpg" alt="Event 2" class="event-image" onclick="openImageModal(this.src, 'Workshop Digital Marketing')">
                <div class="event-content">
                    <h3>Workshop Digital Marketing</h3><p>Minggu, 29 Juni 2025 • 09:00 WIB</p><p>Venue: Digital Hub Jakarta</p><p class="event-price">Rp 150.000</p>
                </div>
            </div>
            <div class="event-card">
                <img src="uploads/festival-kuliner-Bekasi2.jpg" alt="Event 3" class="event-image" onclick="openImageModal(this.src, 'Festival Kuliner')">
                <div class="event-content">
                    <h3>Festival Kuliner</h3><p>Sabtu, 5 Juli 2025 • 10:00 WIB</p><p>Venue: Central Park Mall</p><p class="event-price">Rp 100.000</p>
                </div>
            </div>
        </div>
        <div class="event-action-center">
            <a href="<?php echo base_url('events/search'); ?>" class="btn-go-events">
                <i class="fas fa-search"></i> Lihat Semua Event
            </a>
        </div>
    </section>

    <!-- Modal untuk menampilkan gambar -->
    <div id="imageModal" class="image-modal">
        <span class="close-modal" onclick="closeImageModal()">&times;</span>
        <div class="modal-content">
            <img id="modalImage" class="modal-image" src="" alt="Event Image">
            <div class="modal-controls">
                <button class="modal-btn" onclick="zoomIn()"><i class="fas fa-search-plus"></i> Zoom In</button>
                <button class="modal-btn" onclick="zoomOut()"><i class="fas fa-search-minus"></i> Zoom Out</button>
                <button class="modal-btn" onclick="resetZoom()"><i class="fas fa-undo"></i> Reset</button>
            </div>
        </div>
    </div>

    <footer class="footer" id="contact">
        <!-- DIPERBAIKI: Konten footer ditambahkan kembali -->
        <div class="footer-content">
            <p>© 2025 QuickTix. All rights reserved.</p>
            <p>Tiket Cepat, Tanpa Ribet!</p>
            <div class="social-links">
                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.querySelector('.features-grid');
            if (!track) return;

            const cards = Array.from(track.children);
            
            cards.forEach(card => {
                const clone = card.cloneNode(true);
                clone.setAttribute('aria-hidden', 'true'); 
                track.appendChild(clone);
            });
        });

        // Variabel untuk zoom
        let currentZoom = 1;
        const zoomStep = 0.2;
        const maxZoom = 3;
        const minZoom = 0.5;

        // Fungsi untuk membuka modal gambar
        function openImageModal(imageSrc, imageAlt) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            
            modalImage.src = imageSrc;
            modalImage.alt = imageAlt;
            currentZoom = 1;
            modalImage.style.transform = `scale(${currentZoom})`;
            
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden'; // Mencegah scroll
        }

        // Fungsi untuk menutup modal
        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto'; // Mengembalikan scroll
        }

        // Fungsi zoom in
        function zoomIn() {
            if (currentZoom < maxZoom) {
                currentZoom += zoomStep;
                updateZoom();
            }
        }

        // Fungsi zoom out
        function zoomOut() {
            if (currentZoom > minZoom) {
                currentZoom -= zoomStep;
                updateZoom();
            }
        }

        // Fungsi reset zoom
        function resetZoom() {
            currentZoom = 1;
            updateZoom();
        }

        // Fungsi update zoom
        function updateZoom() {
            const modalImage = document.getElementById('modalImage');
            modalImage.style.transform = `scale(${currentZoom})`;
        }

        // Menutup modal ketika klik di luar gambar
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('imageModal');
            if (modal.style.display === 'block') {
                switch(e.key) {
                    case 'Escape':
                        closeImageModal();
                        break;
                    case '+':
                    case '=':
                        e.preventDefault();
                        zoomIn();
                        break;
                    case '-':
                        e.preventDefault();
                        zoomOut();
                        break;
                    case '0':
                        resetZoom();
                        break;
                }
            }
        });
    </script>
</body>
</html>
