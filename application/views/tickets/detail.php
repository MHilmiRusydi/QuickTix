<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/tickets.png'); ?>">
    <style>
        :root {
            --primary-color: #4A90E2;
            --secondary-color: #2C3E50;
            --accent-color: #E74C3C;
            --text-color: #333333;
            --background-color: #F5F6FA;
            --white: #FFFFFF;
            --success-color: #28a745;
            --danger-color: #dc3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--background-color);
            padding: 2rem;
        }

        /* --- NAVIGATION MODERN --- */
        .nav-container {
            position: sticky;
            top: 0;
            z-index: 100;
            background: var(--white);
            padding: 1.1rem 2.2rem;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(74,144,226,0.13), 0 1.5px 6px rgba(44,62,80,0.07);
            max-width: 1200px;
            margin: 0 auto 2.2rem auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: box-shadow 0.3s, background 0.3s;
        }
        .nav-container:hover {
            box-shadow: 0 8px 32px rgba(74,144,226,0.18), 0 2px 8px rgba(44,62,80,0.09);
            background: #fafdff;
        }
        .nav-brand {
            color: var(--primary-color);
            font-size: 2rem;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 1px;
            transition: color 0.2s, transform 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .nav-brand:hover {
            color: var(--accent-color);
            transform: scale(1.04) rotate(-2deg);
            text-shadow: 0 2px 8px rgba(74,144,226,0.08);
        }
        .nav-links {
            display: flex;
            gap: 1.7rem;
            align-items: center;
        }
        .nav-link {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.25s, background 0.25s, box-shadow 0.25s, transform 0.18s;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            position: relative;
            border-radius: 8px;
            padding: 0.55rem 1.1rem;
        }
        .nav-link:hover, .nav-link:focus {
            color: var(--primary-color);
            background: rgba(74,144,226,0.08);
            box-shadow: 0 2px 8px rgba(74,144,226,0.08);
            outline: none;
            transform: translateY(-2px) scale(1.04);
        }
        .nav-link:active {
            color: var(--accent-color);
            background: rgba(231,76,60,0.08);
            transform: scale(0.98);
        }
        .nav-link i {
            font-size: 1.15rem;
        }
        .nav-link.active {
            color: var(--primary-color);
            font-weight: 700;
            background: rgba(74,144,226,0.13);
            box-shadow: 0 2px 8px rgba(74,144,226,0.10);
        }
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 7px;
            left: 18%;
            width: 64%;
            height: 2.5px;
            background-color: var(--primary-color);
            border-radius: 2px;
            opacity: 0.7;
        }
        .nav-link.btn-login, .nav-link.btn-register {
            font-weight: 600;
            border: none;
            border-radius: 8px;
            padding: 0.55rem 1.3rem;
            box-shadow: 0 2px 8px rgba(74,144,226,0.10);
            transition: background 0.25s, color 0.25s, box-shadow 0.25s, transform 0.18s;
        }
        .nav-link.btn-login {
            color: var(--primary-color);
            background: linear-gradient(90deg, #fff 60%, #e3f0ff 100%);
            border: 2px solid var(--primary-color);
        }
        .nav-link.btn-login:hover, .nav-link.btn-login:focus {
            background: var(--primary-color);
            color: var(--white);
            box-shadow: 0 4px 15px rgba(74,144,226,0.18);
            transform: translateY(-2px) scale(1.05);
        }
        .nav-link.btn-register {
            background: linear-gradient(90deg, #4A90E2 60%, #E74C3C 100%);
            color: var(--white);
            border: 2px solid var(--primary-color);
        }
        .nav-link.btn-register:hover, .nav-link.btn-register:focus {
            background: linear-gradient(90deg, #E74C3C 0%, #4A90E2 100%);
            color: var(--white);
            box-shadow: 0 4px 15px rgba(231,76,60,0.18);
            transform: translateY(-2px) scale(1.05);
        }
        @media (max-width: 1024px) {
            .nav-container {
                padding: 0.8rem 1.2rem;
                border-radius: 12px;
            }
            .nav-brand {
                font-size: 1.4rem;
            }
            .nav-links {
                gap: 1.1rem;
            }
        }
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                align-items: stretch;
                gap: 0.5rem;
                padding: 0.7rem 0.7rem;
                border-radius: 10px;
            }
            .nav-toggle {
                display: block !important;
                background: none;
                border: none;
                font-size: 2rem;
                color: var(--primary-color);
                cursor: pointer;
                margin-left: auto;
                transition: color 0.2s, transform 0.2s;
                z-index: 110;
            }
            .nav-toggle.active {
                color: var(--accent-color);
                transform: rotate(90deg) scale(1.1);
            }
            .nav-links {
                display: none;
                flex-direction: column;
                gap: 0.5rem;
                width: 100%;
                align-items: stretch;
                background: var(--white);
                border-radius: 10px;
                box-shadow: 0 4px 24px rgba(74,144,226,0.13);
                margin-top: 0.5rem;
                padding: 0.5rem 0;
                animation: navSlideDown 0.3s;
            }
            .nav-links.show {
                display: flex;
            }
            .nav-link {
                justify-content: flex-start;
                padding: 0.7rem 1rem;
                font-size: 1rem;
            }
            .nav-link.active::after {
                left: 18%;
                width: 50%;
                height: 3px;
                bottom: 6px;
            }
        }
        @keyframes navSlideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @media (max-width: 480px) {
            .nav-container {
                padding: 0.6rem 0.3rem;
                border-radius: 8px;
            }
            .nav-brand {
                font-size: 2rem;
            }
            .nav-link {
                font-size: 1.15rem;
                padding: 1rem 1.2rem;
            }
            .nav-link.active::after {
                left: 22%;
                width: 40%;
                height: 3.5px;
                bottom: 4px;
            }
        }

        .detail-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .detail-card {
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .detail-card:hover {
            transform: translateY(-5px);
        }

        .detail-header {
            background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .detail-header h1 {
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }

        .detail-header p {
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .detail-content {
            padding: 2rem;
        }

        .info-section {
            margin-bottom: 2rem;
        }

        .info-section h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.3rem;
        }

        .info-section h3 i {
            color: var(--primary-color);
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #6c757d;
            font-weight: 500;
            flex: 0 0 200px;
        }

        .info-value {
            color: var(--text-color);
            font-weight: 600;
            text-align: right;
            flex: 1;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-paid {
            background-color: #d4edda;
            color: #155724;
        }

        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            justify-content: center;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .btn-success {
            background: var(--success-color);
            color: var(--white);
        }

        .btn-success:hover {
            background: #218838;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .btn-danger {
            background: var(--danger-color);
            color: var(--white);
        }

        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert-warning {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @media (max-width: 768px) {
            .info-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .info-label {
                flex: none;
            }

            .info-value {
                text-align: left;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
        @media (max-width: 768px) {
            body { padding: 1rem; }
        }
        @media (max-width: 480px) {
            body { padding: 0.5rem; }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <div class="nav-container">
        <a href="<?php echo base_url(); ?>" class="nav-brand">QuickTix</a>
        <button class="nav-toggle" id="navToggle" aria-label="Toggle Navigation" style="display:none;">
            <i class="fas fa-bars"></i>
        </button>
        <div class="nav-links" id="navLinks">
            <?php if($this->session->userdata('logged_in')): ?>
                <a href="<?php echo base_url('events/search'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'events' ? 'active' : ''; ?>">
                    <i class="fas fa-search"></i>
                    Cari Event
                </a>
                <a href="<?php echo base_url('tickets'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'tickets' ? 'active' : ''; ?>">
                    <i class="fas fa-ticket-alt"></i>
                    Tiket Saya
                </a>
                <?php if($this->session->userdata('role') == 'admin'): ?>
                    <a href="<?php echo base_url('admin'); ?>" class="nav-link" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                        <i class="fas fa-crown"></i>
                        Admin Panel
                    </a>
                <?php endif; ?>
                <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link" id="logoutLink">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            <?php else: ?>
                <a href="<?php echo base_url('events/search'); ?>" class="nav-link active">
                    <i class="fas fa-search"></i>
                    Cari Event
                </a>
                <a href="<?php echo base_url('auth/login'); ?>" class="nav-link btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Masuk
                </a>
                <a href="<?php echo base_url('auth/register'); ?>" class="nav-link btn-register">
                    <i class="fas fa-user-plus"></i>
                    Daftar
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="detail-container">
        <div class="detail-card">
            <div class="detail-header">
                <h1><i class="fas fa-ticket-alt"></i> Detail Tiket</h1>
                <p>Informasi lengkap tiket Anda</p>
            </div>
            
            <div class="detail-content">
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <div class="info-section">
                    <h3><i class="fas fa-info-circle"></i> Informasi Event</h3>
                    <div class="info-item">
                        <div class="info-label">Nama Event</div>
                        <div class="info-value"><?php echo $transaction['event_name']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tipe Event</div>
                        <div class="info-value"><?php echo $transaction['event_type']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Lokasi</div>
                        <div class="info-value"><?php echo $transaction['location']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tanggal Event</div>
                        <div class="info-value"><?php echo date('d F Y H:i', strtotime($transaction['date'])); ?></div>
                    </div>
                </div>

                <div class="info-section">
                    <h3><i class="fas fa-shopping-cart"></i> Detail Pembelian</h3>
                    <div class="info-item">
                        <div class="info-label">ID Transaksi</div>
                        <div class="info-value">#<?php echo $transaction['id']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Jumlah Tiket</div>
                        <div class="info-value"><?php echo $transaction['quantity']; ?> tiket</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Total Harga</div>
                        <div class="info-value">Rp <?php echo number_format($transaction['total_price'], 0, ',', '.'); ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Metode Pembayaran</div>
                        <div class="info-value"><?php echo ucfirst(str_replace('_', ' ', $transaction['payment_method'])); ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Status</div>
                        <div class="info-value">
                            <span class="status-badge <?php echo 'status-' . $transaction['payment_status']; ?>">
                                <i class="fas <?php echo $transaction['payment_status'] == 'pending' ? 'fa-clock' : ($transaction['payment_status'] == 'paid' ? 'fa-check-circle' : 'fa-times-circle'); ?>"></i>
                                <?php 
                                switch($transaction['payment_status']) {
                                    case 'pending':
                                        echo 'Menunggu Pembayaran';
                                        break;
                                    case 'paid':
                                        echo 'Pembayaran Berhasil';
                                        break;
                                    case 'cancelled':
                                        echo 'Dibatalkan';
                                        break;
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>

                <?php if($transaction['payment_status'] == 'pending'): ?>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        <div>
                            <strong>Pembayaran Belum Dilakukan</strong><br>
                            Silakan lakukan pembayaran sesuai dengan metode yang dipilih. Setelah pembayaran berhasil, status akan diperbarui secara otomatis.
                        </div>
                    </div>
                <?php endif; ?>

                <div class="action-buttons">
                    <a href="<?php echo base_url('tickets'); ?>" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Tiket Saya
                    </a>
                    
                    <?php if($transaction['payment_status'] == 'paid'): ?>
                        <a href="<?php echo base_url('tickets/print/' . $transaction['id']); ?>" target="_blank" class="btn btn-success">
                            <i class="fas fa-print"></i> Cetak Tiket
                        </a>
                    <?php endif; ?>
                    
                    <?php if($transaction['payment_status'] == 'pending'): ?>
                        <a href="<?php echo base_url('transaction/cancel/' . $transaction['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin membatalkan transaksi ini?')">
                            <i class="fas fa-times"></i> Batalkan Transaksi
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Konfirmasi Logout (User) -->
    <div id="logoutModal" class="modal-logout" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(44,62,80,0.18);align-items:center;justify-content:center;">
        <div class="modal-logout-content" style="background:#fff;padding:2rem 1.5rem;border-radius:14px;box-shadow:0 8px 32px rgba(74,144,226,0.18);max-width:340px;width:90%;text-align:center;position:relative;animation:modalFadeIn 0.2s;">
            <i class="fas fa-sign-out-alt" style="font-size:2.2rem;color:#4A90E2;margin-bottom:0.7rem;"></i>
            <h3 style="color:#2C3E50;margin-bottom:0.7rem;">Konfirmasi Logout</h3>
            <p style="color:#555;margin-bottom:1.5rem;">Apakah Anda yakin ingin logout?</p>
            <div style="display:flex;gap:1rem;justify-content:center;">
                <button id="cancelLogoutBtn" style="padding:0.6rem 1.2rem;border:none;border-radius:6px;background:#eee;color:#333;font-weight:500;cursor:pointer;transition:background 0.2s;">Batal</button>
                <button id="confirmLogoutBtn" style="padding:0.6rem 1.2rem;border:none;border-radius:6px;background:#4A90E2;color:#fff;font-weight:500;cursor:pointer;box-shadow:0 2px 8px rgba(74,144,226,0.10);transition:background 0.2s;">Ya, Logout</button>
            </div>
        </div>
    </div>
    <style>
    @keyframes modalFadeIn { from { opacity:0; transform:translateY(20px);} to { opacity:1; transform:translateY(0);} }
    .modal-logout.show { display:flex !important; }
    .modal-logout .modal-logout-content { animation: modalFadeIn 0.2s; }
    .modal-logout button:hover { filter:brightness(0.95); }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const logoutLink = document.getElementById('logoutLink');
        const logoutModal = document.getElementById('logoutModal');
        const cancelLogoutBtn = document.getElementById('cancelLogoutBtn');
        const confirmLogoutBtn = document.getElementById('confirmLogoutBtn');
        if (logoutLink && logoutModal) {
            logoutLink.addEventListener('click', function(e) {
                e.preventDefault();
                logoutModal.classList.add('show');
            });
        }
        if (cancelLogoutBtn && logoutModal) {
            cancelLogoutBtn.onclick = function() {
                logoutModal.classList.remove('show');
            };
        }
        if (confirmLogoutBtn && logoutLink) {
            confirmLogoutBtn.onclick = function() {
                window.location.href = logoutLink.href;
            };
        }
        // Tutup modal jika klik di luar konten
        logoutModal.addEventListener('click', function(e) {
            if (e.target === logoutModal) logoutModal.classList.remove('show');
        });

        // Hamburger menu logic
        const navToggle = document.getElementById('navToggle');
        const navLinks = document.getElementById('navLinks');
        let navOpen = false;
        function toggleNav() {
            navOpen = !navOpen;
            navLinks.classList.toggle('show', navOpen);
            navToggle.classList.toggle('active', navOpen);
            navToggle.innerHTML = navOpen ? '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        }
        if (navToggle && navLinks) {
            navToggle.style.display = window.innerWidth <= 768 ? 'block' : 'none';
            navLinks.classList.remove('show');
            navToggle.addEventListener('click', toggleNav);
            window.addEventListener('resize', function() {
                navToggle.style.display = window.innerWidth <= 768 ? 'block' : 'none';
                if (window.innerWidth > 768) {
                    navLinks.classList.remove('show');
                    navToggle.classList.remove('active');
                    navToggle.innerHTML = '<i class="fas fa-bars"></i>';
                    navOpen = false;
                }
            });
        }
    });
    </script>
</body>
</html> 