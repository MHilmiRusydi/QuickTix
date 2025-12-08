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

        .users-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .users-header {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            text-align: center;
        }

        .users-header h1 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .users-header p {
            color: var(--text-color);
            opacity: 0.8;
        }

        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .stat-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .stat-card.total .stat-icon {
            color: var(--primary-color);
        }

        .stat-card.active .stat-icon {
            color: var(--success-color);
        }

        .stat-card.admin .stat-icon {
            color: var(--warning-color);
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            color: var(--text-color);
        }

        .stat-label {
            color: var(--text-color);
            opacity: 0.8;
            font-size: 0.9rem;
        }

        .users-table {
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

        .status-active {
            background: var(--success-color);
            color: var(--white);
        }

        .status-inactive {
            background: var(--danger-color);
            color: var(--white);
        }

        .role-badge {
            padding: 0.3rem 0.6rem;
            border-radius: 10px;
            font-size: 0.7rem;
            font-weight: 500;
        }

        .role-admin {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: var(--white);
        }

        .role-user {
            background: var(--info-color);
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

        .btn-edit {
            background: var(--warning-color);
            color: var(--text-color);
        }

        .btn-edit:hover {
            background: #e0a800;
            transform: translateY(-2px);
        }

        .btn-delete {
            background: var(--danger-color);
            color: var(--white);
        }

        .btn-delete:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        .btn-toggle-status {
            background: var(--info-color);
            color: var(--white);
        }

        .btn-toggle-status:hover {
            background: #138496;
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

        .search-filter {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .search-filter h3 {
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .filter-controls {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-controls input,
        .filter-controls select {
            padding: 0.5rem;
            border: 2px solid #e1e1e1;
            border-radius: 5px;
            font-size: 0.9rem;
        }

        .filter-controls input:focus,
        .filter-controls select:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .btn-filter {
            background: var(--primary-color);
            color: var(--white);
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
        }

        .btn-filter:hover {
            background: #357ABD;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
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

            .stats-cards {
                grid-template-columns: 1fr;
            }

            .filter-controls {
                flex-direction: column;
                align-items: stretch;
            }

            .action-buttons {
                flex-direction: column;
            }

            th, td {
                padding: 0.8rem;
                font-size: 0.9rem;
            }
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
            <a href="<?php echo base_url('admin/transactions'); ?>" class="nav-link">
                <i class="fas fa-receipt"></i>
                Transaksi
            </a>
            <a href="<?php echo base_url('admin/users'); ?>" class="nav-link active">
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

    <div class="users-container">
        <div class="users-header">
            <h1><i class="fas fa-users"></i> Manajemen User</h1>
            <p>Kelola data pengguna yang terdaftar di sistem QuickTix</p>
        </div>

        <!-- Statistik User -->
        <div class="stats-cards">
            <div class="stat-card total">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number"><?php echo count($users); ?></div>
                <div class="stat-label">Total User</div>
            </div>
            <div class="stat-card active">
                <div class="stat-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-number"><?php echo count(array_filter($users, function($user) { return $user['status'] == 'active'; })); ?></div>
                <div class="stat-label">User Aktif</div>
            </div>
            <div class="stat-card admin">
                <div class="stat-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="stat-number"><?php echo count(array_filter($users, function($user) { return $user['role'] == 'admin'; })); ?></div>
                <div class="stat-label">Admin</div>
            </div>
        </div>

        <!-- Search dan Filter -->
        <div class="search-filter">
            <h3><i class="fas fa-search"></i> Cari & Filter User</h3>
            <form method="GET" action="">
                <div class="filter-controls">
                    <input type="text" name="search" placeholder="Cari nama/email/username..." 
                           value="<?php echo $this->input->get('search'); ?>" style="flex: 1;">
                    <select name="role">
                        <option value="">Semua Role</option>
                        <option value="user" <?php echo $this->input->get('role') == 'user' ? 'selected' : ''; ?>>User</option>
                        <option value="admin" <?php echo $this->input->get('role') == 'admin' ? 'selected' : ''; ?>>Admin</option>
                    </select>
                    <select name="status">
                        <option value="">Semua Status</option>
                        <option value="active" <?php echo $this->input->get('status') == 'active' ? 'selected' : ''; ?>>Aktif</option>
                        <option value="inactive" <?php echo $this->input->get('status') == 'inactive' ? 'selected' : ''; ?>>Tidak Aktif</option>
                    </select>
                    <button type="submit" class="btn-filter">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </form>
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

        <div class="users-table">
            <div class="table-header">
                <h3><i class="fas fa-list"></i> Daftar User</h3>
            </div>
            
            <?php if(empty($users)): ?>
                <div class="empty-state">
                    <i class="fas fa-user-slash"></i>
                    <h3>Belum Ada User</h3>
                    <p>User akan muncul di sini setelah melakukan registrasi.</p>
                </div>
            <?php else: ?>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Tanggal Registrasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td>
                                        <div class="user-avatar">
                                            <?php echo strtoupper(substr($user['username'], 0, 1)); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <strong><?php echo $user['username']; ?></strong>
                                    </td>
                                    <td><?php echo $user['full_name']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['phone']; ?></td>
                                    <td>
                                        <span class="role-badge role-<?php echo $user['role']; ?>">
                                            <?php echo ucfirst($user['role']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status-badge <?php echo $user['status'] == 'active' ? 'status-active' : 'status-inactive'; ?>">
                                            <?php echo ucfirst($user['status']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo date('d M Y H:i', strtotime($user['created_at'])); ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?php echo base_url('admin/edit_user/' . $user['id']); ?>" class="btn btn-edit" title="Edit User">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <?php if($user['id'] != $this->session->userdata('user_id')): ?>
                                                <a href="<?php echo base_url('admin/toggle_user_status/' . $user['id']); ?>" 
                                                   class="btn btn-toggle-status" 
                                                   onclick="return confirm('Apakah Anda yakin ingin mengubah status user ini?')"
                                                   title="<?php echo $user['status'] == 'active' ? 'Nonaktifkan' : 'Aktifkan'; ?> User">
                                                    <i class="fas fa-<?php echo $user['status'] == 'active' ? 'ban' : 'check'; ?>"></i>
                                                </a>
                                                <a href="<?php echo base_url('admin/delete_user/' . $user['id']); ?>" 
                                                   class="btn btn-delete" 
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus user ini? Tindakan ini tidak dapat dibatalkan!')"
                                                   title="Hapus User">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            <?php else: ?>
                                                <span style="color: #999; font-size: 0.8rem;">Current User</span>
                                            <?php endif; ?>
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