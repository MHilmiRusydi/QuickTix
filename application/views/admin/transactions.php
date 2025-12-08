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

        .transactions-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .transactions-header {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            text-align: center;
        }

        .transactions-header h1 {
            color: var(--primary-color);
            margin: 0;
        }

        .transactions-table {
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .table-header {
            background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
            color: var(--white);
            padding: 1.5rem 2rem;
        }

        .table-header h3 {
            margin: 0;
            font-size: 1.3rem;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem 1.5rem;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }

        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: var(--text-color);
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        .status-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
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

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #357ABD;
            transform: translateY(-2px);
        }

        .btn-success {
            background: var(--success-color);
            color: var(--white);
        }

        .btn-success:hover {
            background: #218838;
            transform: translateY(-2px);
        }

        .btn-warning {
            background: var(--warning-color);
            color: var(--text-color);
        }

        .btn-warning:hover {
            background: #e0a800;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: var(--danger-color);
            color: var(--white);
        }

        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #666;
        }

        .empty-state i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            margin-bottom: 1.5rem;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 1000;
        }

        .modal-content {
            background: var(--white);
            width: 90%;
            max-width: 500px;
            margin: 50px auto;
            padding: 2rem;
            border-radius: 15px;
            position: relative;
        }

        .close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-color);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 500;
        }

        .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 1rem;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
        }

        .btn-secondary {
            background: #6c757d;
            color: var(--white);
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                gap: 0.5rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            th, td {
                padding: 0.8rem;
                font-size: 0.9rem;
            }
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
    </style>
</head>
<body>
    <!-- Navigation -->
    <div class="nav-container">
        <a href="<?php echo base_url('admin'); ?>" class="nav-brand">QuickTix Admin</a>
        <div class="nav-links">
            <a href="<?php echo base_url('admin'); ?>" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            <a href="<?php echo base_url('admin/events'); ?>" class="nav-link">
                <i class="fas fa-calendar-alt"></i>
                Event
            </a>
            <a href="<?php echo base_url('admin/transactions'); ?>" class="nav-link active">
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

    <div class="transactions-container">
        <div class="transactions-header">
            <h1><i class="fas fa-receipt"></i> Manajemen Transaksi</h1>
        </div>

        <?php if($this->session->flashdata('success')): ?>
            <div style="background: var(--success-color); color: var(--white); padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
                <i class="fas fa-check-circle"></i>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
            <div style="background: var(--danger-color); color: var(--white); padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="transactions-table">
            <div class="table-header">
                <h3><i class="fas fa-list"></i> Daftar Transaksi</h3>
            </div>
            
            <?php if(empty($transactions)): ?>
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h3>Belum Ada Transaksi</h3>
                    <p>Transaksi akan muncul di sini setelah user melakukan pembelian tiket.</p>
                </div>
            <?php else: ?>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Event</th>
                                <th>User</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Metode Pembayaran</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($transactions as $transaction): ?>
                                <tr>
                                    <td>#<?php echo $transaction['id']; ?></td>
                                    <td>
                                        <strong><?php echo $transaction['event_name']; ?></strong>
                                    </td>
                                    <td>
                                        <?php echo $transaction['full_name']; ?><br>
                                        <small style="color: #666;">@<?php echo $transaction['username']; ?></small>
                                    </td>
                                    <td><?php echo $transaction['quantity']; ?> tiket</td>
                                    <td>Rp <?php echo number_format($transaction['total_price'], 0, ',', '.'); ?></td>
                                    <td><?php echo ucfirst(str_replace('_', ' ', $transaction['payment_method'])); ?></td>
                                    <td>
                                        <span class="status-badge status-<?php echo $transaction['payment_status']; ?>">
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
                                        </span>
                                    </td>
                                    <td><?php echo date('d M Y H:i', strtotime($transaction['created_at'])); ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-primary" onclick="showStatusModal(<?php echo $transaction['id']; ?>, '<?php echo $transaction['payment_status']; ?>')">
                                                <i class="fas fa-edit"></i> Update Status
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal Update Status -->
    <div id="statusModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeStatusModal()">&times;</span>
            <h2>Update Status Transaksi</h2>
            <form id="statusForm" method="POST">
                <div class="form-group">
                    <label for="status">Status Pembayaran</label>
                    <select id="status" name="status" required>
                        <option value="pending">Menunggu Pembayaran</option>
                        <option value="paid">Lunas</option>
                        <option value="cancelled">Dibatalkan</option>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeStatusModal()">Batal</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
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
        function showStatusModal(transactionId, currentStatus) {
            document.getElementById('statusModal').style.display = 'block';
            document.getElementById('status').value = currentStatus;
            document.getElementById('statusForm').action = '<?php echo base_url('admin/update_transaction_status/'); ?>' + transactionId;
        }

        function closeStatusModal() {
            document.getElementById('statusModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            var modal = document.getElementById('statusModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
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