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
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --info-color: #17a2b8;
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

        /* Navigation Styles */
        .nav-container {
            background: var(--white);
            padding: 1rem 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 1400px;
            margin: 0 auto;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            color: var(--primary-color);
            font-size: 1.5rem;
            font-weight: 600;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
        }

        .nav-link {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .nav-link:hover {
            color: var(--primary-color);
            background-color: rgba(74, 144, 226, 0.1);
        }

        .nav-link.active {
            color: var(--primary-color);
            background-color: rgba(74, 144, 226, 0.1);
            font-weight: 600;
        }

        .nav-link i {
            font-size: 1.1rem;
        }

        .admin-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: var(--white);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 0.5rem;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .dashboard-header {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            text-align: center;
        }

        .dashboard-header h1 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-size: 2rem;
        }

        .dashboard-header p {
            color: var(--text-color);
            opacity: 0.8;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .stat-card.events .stat-icon {
            color: var(--primary-color);
        }

        .stat-card.transactions .stat-icon {
            color: var(--success-color);
        }

        .stat-card.users .stat-icon {
            color: var(--info-color);
        }

        .stat-card.revenue .stat-icon {
            color: var(--warning-color);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .stat-label {
            color: var(--text-color);
            opacity: 0.8;
            font-weight: 500;
        }

        .recent-transactions {
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .recent-header {
            background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
            color: var(--white);
            padding: 1.5rem 2rem;
        }

        .recent-header h3 {
            margin: 0;
            font-size: 1.3rem;
        }

        .transaction-list {
            padding: 0;
        }

        .transaction-item {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .transaction-item:last-child {
            border-bottom: none;
        }

        .transaction-info h4 {
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .transaction-info p {
            color: #666;
            font-size: 0.9rem;
        }

        .transaction-status {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .status-paid {
            background: var(--success-color);
            color: var(--white);
        }

        .status-pending {
            background: var(--warning-color);
            color: var(--text-color);
        }

        .status-cancelled {
            background: var(--danger-color);
            color: var(--white);
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        .action-btn {
            background: var(--white);
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            padding: 1rem;
            border-radius: 10px;
            text-decoration: none;
            text-align: center;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .action-btn:hover {
            background: var(--primary-color);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .action-btn i {
            font-size: 1.5rem;
        }

        .btn-back-to-search {
            display: inline-block;
            background: #fff;
            color: #4A90E2;
            border: 2px solid #4A90E2;
            border-radius: 8px;
            padding: 10px 22px;
            font-size: 1.08em;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(74,144,226,0.10);
            transition: all 0.2s;
            margin-left: 1rem;
        }
        .btn-back-to-search i {
            margin-right: 0.5rem;
        }
        .btn-back-to-search:hover {
            background: #4A90E2;
            color: #fff;
            box-shadow: 0 4px 15px rgba(74,144,226,0.18);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                gap: 0.5rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .transaction-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <div class="nav-container">
        <a href="<?php echo base_url('admin'); ?>" class="nav-brand">QuickTix Admin</a>
        <div class="nav-links">
            <a href="<?php echo base_url('admin'); ?>" class="nav-link active">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            <a href="<?php echo base_url('admin/events'); ?>" class="nav-link">
                <i class="fas fa-calendar-alt"></i>
                Event
            </a>
            <a href="<?php echo base_url('admin/transactions'); ?>" class="nav-link">
                <i class="fas fa-receipt"></i>
                Transaksi
            </a>
            <a href="<?php echo base_url('admin/users'); ?>" class="nav-link">
                <i class="fas fa-users"></i>
                User
            </a>
            <a href="<?php echo base_url('admin/validate_qr'); ?>" class="nav-link">
                <i class="fas fa-qrcode"></i>
                Validasi QR
            </a>
            <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link" id="logoutLink">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
            <a href="<?php echo base_url('events/search'); ?>" class="btn-back-to-search">
                <i class="fas fa-arrow-left"></i> Kembali ke Cari Event
            </a>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1><i class="fas fa-tachometer-alt"></i> Dashboard Admin</h1>
            <p>Selamat datang di panel admin QuickTix</p>
        </div>

        <!-- Statistik -->
        <div class="stats-grid">
            <div class="stat-card events">
                <div class="stat-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-number"><?php echo $total_events; ?></div>
                <div class="stat-label">Total Event</div>
            </div>
            
            <div class="stat-card transactions">
                <div class="stat-icon">
                    <i class="fas fa-receipt"></i>
                </div>
                <div class="stat-number"><?php echo $total_transactions; ?></div>
                <div class="stat-label">Total Transaksi</div>
            </div>
            
            <div class="stat-card users">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number"><?php echo $total_users; ?></div>
                <div class="stat-label">Total User</div>
            </div>
            
            <div class="stat-card revenue">
                <div class="stat-icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="stat-number">Rp <?php echo number_format($total_revenue, 0, ',', '.'); ?></div>
                <div class="stat-label">Total Pendapatan</div>
            </div>
        </div>

        <!-- Transaksi Terbaru -->
        <div class="recent-transactions">
            <div class="recent-header">
                <h3><i class="fas fa-clock"></i> Transaksi Terbaru</h3>
            </div>
            <div class="transaction-list">
                <?php if(empty($recent_transactions)): ?>
                    <div style="padding: 2rem; text-align: center; color: #666;">
                        <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                        <p>Belum ada transaksi</p>
                    </div>
                <?php else: ?>
                    <?php foreach($recent_transactions as $transaction): ?>
                        <div class="transaction-item">
                            <div class="transaction-info">
                                <h4><?php echo $transaction['event_name']; ?></h4>
                                <p>
                                    <i class="fas fa-user"></i> <?php echo $transaction['username']; ?> • 
                                    <i class="fas fa-ticket-alt"></i> <?php echo $transaction['quantity']; ?> tiket • 
                                    <i class="fas fa-calendar"></i> <?php echo date('d M Y H:i', strtotime($transaction['created_at'])); ?>
                                </p>
                            </div>
                            <div class="transaction-status status-<?php echo $transaction['payment_status']; ?>">
                                <?php 
                                switch($transaction['payment_status']) {
                                    case 'pending':
                                        echo 'Menunggu';
                                        break;
                                    case 'paid':
                                        echo 'Lunas';
                                        break;
                                    case 'cancelled':
                                        echo 'Dibatalkan';
                                        break;
                                }
                                ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <a href="<?php echo base_url('admin/events'); ?>" class="action-btn">
                <i class="fas fa-calendar-plus"></i>
                Kelola Event
            </a>
            <a href="<?php echo base_url('admin/transactions'); ?>" class="action-btn">
                <i class="fas fa-list-alt"></i>
                Lihat Transaksi
            </a>
            <a href="<?php echo base_url('admin/users'); ?>" class="action-btn">
                <i class="fas fa-user-cog"></i>
                Kelola User
            </a>
            <a href="<?php echo base_url('admin/validate_qr'); ?>" class="action-btn">
                <i class="fas fa-qrcode"></i>
                Validasi QR
            </a>
        </div>
    </div>
    <!-- Modal Konfirmasi Logout (Admin) -->
    <div id="logoutModal" class="modal-logout" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(44,62,80,0.18);align-items:center;justify-content:center;">
        <div class="modal-logout-content" style="background:#fff;padding:2rem 1.5rem;border-radius:14px;box-shadow:0 8px 32px rgba(102,126,234,0.18);max-width:340px;width:90%;text-align:center;position:relative;animation:modalFadeIn 0.2s;">
            <i class="fas fa-sign-out-alt" style="font-size:2.2rem;color:#764ba2;margin-bottom:0.7rem;"></i>
            <h3 style="color:#2C3E50;margin-bottom:0.7rem;">Konfirmasi Logout</h3>
            <p style="color:#555;margin-bottom:1.5rem;">Apakah Anda yakin ingin logout dari panel admin?</p>
            <div style="display:flex;gap:1rem;justify-content:center;">
                <button id="cancelLogoutBtn" style="padding:0.6rem 1.2rem;border:none;border-radius:6px;background:#eee;color:#333;font-weight:500;cursor:pointer;transition:background 0.2s;">Batal</button>
                <button id="confirmLogoutBtn" style="padding:0.6rem 1.2rem;border:none;border-radius:6px;background:#764ba2;color:#fff;font-weight:500;cursor:pointer;box-shadow:0 2px 8px rgba(102,126,234,0.10);transition:background 0.2s;">Ya, Logout</button>
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
    });
    </script>
</body>
</html> 