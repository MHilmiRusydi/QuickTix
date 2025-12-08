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
            --success-color: #2ECC71;
            --warning-color: #F1C40F;
            --danger-color: #E74C3C;
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

        .tickets-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .tickets-header {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .tickets-header h1 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .tickets-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .ticket-card {
            background: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .ticket-card:hover {
            transform: translateY(-5px);
        }

        .ticket-header {
            padding: 1.5rem;
            background: var(--primary-color);
            color: var(--white);
        }

        .ticket-header h3 {
            margin-bottom: 0.5rem;
        }

        .ticket-type {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .ticket-content {
            padding: 1.5rem;
        }

        .ticket-details {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
        }

        .ticket-detail {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-color);
        }

        .ticket-detail i {
            color: var(--primary-color);
            width: 20px;
        }

        .ticket-status {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .status-pending {
            background: var(--warning-color);
            color: var(--text-color);
        }

        .status-paid {
            background: var(--success-color);
            color: var(--white);
        }

        .status-cancelled {
            background: var(--danger-color);
            color: var(--white);
        }

        .status-used {
            background: #6c757d;
            color: var(--white);
        }

        .status-unused {
            background: var(--success-color);
            color: var(--white);
        }

        .ticket-actions {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            text-decoration: none;
            text-align: center;
        }

        .btn-detail {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-cancel {
            background: var(--danger-color);
            color: var(--white);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .no-tickets {
            text-align: center;
            padding: 3rem;
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .no-tickets i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .no-tickets h2 {
            color: var(--text-color);
            margin-bottom: 1rem;
        }

        .no-tickets p {
            color: #666;
            margin-bottom: 1.5rem;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.show {
            opacity: 1;
        }

        .modal-content {
            background: var(--white);
            width: 90%;
            max-width: 500px;
            margin: 50px auto;
            padding: 2rem;
            border-radius: 15px;
            position: relative;
            transform: translateY(-20px);
            transition: transform 0.3s ease;
            box-shadow: 0 5px 30px rgba(0,0,0,0.3);
        }

        .modal.show .modal-content {
            transform: translateY(0);
        }

        .modal-content h2 {
            color: var(--danger-color);
            margin-bottom: 1rem;
        }

        .modal-content p {
            margin-bottom: 1rem;
        }

        .modal-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-danger {
            background: var(--danger-color);
            color: var(--white);
        }

        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
        }

        .btn-secondary {
            background: #6c757d;
            color: var(--white);
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.2);
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

    <div class="tickets-container">
        <div class="tickets-header">
            <h1>Tiket Saya</h1>
            <p>Kelola dan lihat status tiket Anda</p>
            <div style="margin-top: 1rem; padding: 1rem; background: #f8f9fa; border-radius: 8px; border-left: 4px solid var(--primary-color);">
                <h4 style="margin-bottom: 0.5rem; color: var(--primary-color);">
                    <i class="fas fa-info-circle"></i> Informasi Status Tiket
                </h4>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap; font-size: 0.9rem;">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <span class="ticket-status status-unused" style="padding: 0.2rem 0.5rem; font-size: 0.8rem;">Belum Digunakan</span>
                        <span>Tiket siap untuk event</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <span class="ticket-status status-used" style="padding: 0.2rem 0.5rem; font-size: 0.8rem;">Sudah Digunakan</span>
                        <span>Tiket sudah digunakan untuk masuk event</span>
                    </div>
                </div>
            </div>
        </div>

        <?php if(empty($transactions)): ?>
        <div class="no-tickets">
            <i class="fas fa-ticket-alt"></i>
            <h2>Belum Ada Tiket</h2>
            <p>Anda belum memiliki tiket event apapun.</p>
            <a href="<?php echo base_url('events/search'); ?>" class="btn btn-detail">Cari Event</a>
        </div>
        <?php else: ?>
        <div class="tickets-grid">
            <?php foreach($transactions as $transaction): ?>
            <div class="ticket-card">
                <div class="ticket-header">
                    <h3><?php echo $transaction['event_name']; ?></h3>
                    <div class="ticket-type"><?php echo $transaction['event_type']; ?></div>
                </div>
                <div class="ticket-content">
                    <div class="ticket-details">
                        <div class="ticket-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <?php echo $transaction['location']; ?>
                        </div>
                        <div class="ticket-detail">
                            <i class="fas fa-calendar"></i>
                            <?php echo date('d M Y H:i', strtotime($transaction['date'])); ?>
                        </div>
                        <div class="ticket-detail">
                            <i class="fas fa-ticket-alt"></i>
                            <?php echo $transaction['quantity']; ?> tiket
                        </div>
                        <div class="ticket-detail">
                            <i class="fas fa-money-bill-wave"></i>
                            Total: Rp <?php echo number_format($transaction['total_price'], 0, ',', '.'); ?>
                        </div>
                        <?php if($transaction['payment_status'] == 'paid'): ?>
                        <div class="ticket-detail">
                            <i class="fas <?php echo $transaction['is_used'] ? 'fa-check-circle' : 'fa-clock'; ?>"></i>
                            Status Tiket: <?php echo $transaction['is_used'] ? 'Sudah Digunakan' : 'Belum Digunakan'; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="ticket-status status-<?php echo strtolower($transaction['payment_status']); ?>">
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
                    </div>
                    
                    <?php if($transaction['payment_status'] == 'paid'): ?>
                    <div class="ticket-status status-<?php echo $transaction['is_used'] ? 'used' : 'unused'; ?>" style="margin-top: 0.5rem;" title="<?php echo $transaction['is_used'] ? 'Tiket sudah digunakan untuk masuk event' : 'Tiket belum digunakan, siap untuk event'; ?>">
                        <i class="fas <?php echo $transaction['is_used'] ? 'fa-check-circle' : 'fa-clock'; ?>"></i>
                        <?php echo $transaction['is_used'] ? 'Sudah Digunakan' : 'Belum Digunakan'; ?>
                    </div>
                    <?php endif; ?>
                    <div class="ticket-actions">
                        <a href="<?php echo base_url('tickets/detail/' . $transaction['id']); ?>" class="btn btn-detail">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                        <?php if($transaction['payment_status'] == 'paid'): ?>
                        <a href="<?php echo base_url('tickets/print/' . $transaction['id']); ?>" target="_blank" class="btn btn-detail" style="background: var(--success-color);">
                            <i class="fas fa-print"></i> Cetak Tiket
                        </a>
                        <?php endif; ?>
                        <?php if($transaction['payment_status'] == 'pending'): ?>
                        <button onclick="confirmCancel(<?php echo $transaction['id']; ?>)" class="btn btn-cancel">
                            <i class="fas fa-times"></i> Batalkan
                        </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

    <!-- Modal Konfirmasi Pembatalan -->
    <div id="cancelModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeCancelModal()">&times;</span>
            <h2>Konfirmasi Pembatalan</h2>
            <p>Apakah Anda yakin ingin membatalkan transaksi ini?</p>
            <p class="text-muted">Tindakan ini tidak dapat dibatalkan.</p>
            <div class="modal-buttons">
                <button onclick="closeCancelModal()" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button onclick="proceedCancel()" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Ya, Batalkan
                </button>
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
    let transactionToCancel = null;

    function confirmCancel(transactionId) {
        transactionToCancel = transactionId;
        const modal = document.getElementById('cancelModal');
        modal.style.display = 'block';
        setTimeout(() => modal.classList.add('show'), 10);
    }

    function closeCancelModal() {
        const modal = document.getElementById('cancelModal');
        modal.classList.remove('show');
        setTimeout(() => {
            modal.style.display = 'none';
            transactionToCancel = null;
        }, 300);
    }

    function proceedCancel() {
        if (transactionToCancel) {
            window.location.href = `<?php echo base_url('transaction/cancel/'); ?>${transactionToCancel}`;
        }
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('cancelModal');
        if (event.target == modal) {
            closeCancelModal();
        }
    }

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