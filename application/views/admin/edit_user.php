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

        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .form-header {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-header h1 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: var(--text-color);
            opacity: 0.8;
        }

        .form-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .user-info {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            border-left: 4px solid var(--primary-color);
        }

        .user-info h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .user-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-weight: 600;
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

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #f0f0f0;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
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

        .btn-secondary {
            background: #6c757d;
            color: var(--white);
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .error-message {
            color: var(--danger-color);
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        .help-text {
            color: #666;
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        .password-section {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .password-section h4 {
            color: #856404;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .password-section p {
            color: #856404;
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                gap: 0.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }

            .user-info-grid {
                grid-template-columns: 1fr;
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
            <span class="admin-badge">ADMIN</span>
        </div>
    </div>

    <div class="form-container">
        <div class="form-header">
            <h1><i class="fas fa-user-edit"></i> Edit User</h1>
            <p>Perbarui informasi user yang dipilih</p>
        </div>

        <div class="form-card">
            <!-- Info User Saat Ini -->
            <div class="user-info">
                <h3><i class="fas fa-info-circle"></i> Informasi User Saat Ini</h3>
                <div class="user-info-grid">
                    <div class="info-item">
                        <span class="info-label">Username</span>
                        <span class="info-value"><?php echo $user['username']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Nama Lengkap</span>
                        <span class="info-value"><?php echo $user['full_name']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value"><?php echo $user['email']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Telepon</span>
                        <span class="info-value"><?php echo $user['phone']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Role</span>
                        <span class="info-value"><?php echo ucfirst($user['role']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Status</span>
                        <span class="info-value"><?php echo ucfirst($user['status']); ?></span>
                    </div>
                </div>
            </div>

            <?php echo form_open('admin/edit_user/' . $user['id']); ?>
                <div class="form-row">
                    <div class="form-group">
                        <label for="username">Username *</label>
                        <input type="text" id="username" name="username" value="<?php echo set_value('username', $user['username']); ?>" required>
                        <?php echo form_error('username', '<div class="error-message">', '</div>'); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="full_name">Nama Lengkap *</label>
                        <input type="text" id="full_name" name="full_name" value="<?php echo set_value('full_name', $user['full_name']); ?>" required>
                        <?php echo form_error('full_name', '<div class="error-message">', '</div>'); ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" value="<?php echo set_value('email', $user['email']); ?>" required>
                        <?php echo form_error('email', '<div class="error-message">', '</div>'); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Telepon *</label>
                        <input type="text" id="phone" name="phone" value="<?php echo set_value('phone', $user['phone']); ?>" required>
                        <?php echo form_error('phone', '<div class="error-message">', '</div>'); ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="role">Role *</label>
                        <select id="role" name="role" required>
                            <option value="user" <?php echo set_select('role', 'user', $user['role'] == 'user'); ?>>User</option>
                            <option value="admin" <?php echo set_select('role', 'admin', $user['role'] == 'admin'); ?>>Admin</option>
                        </select>
                        <?php echo form_error('role', '<div class="error-message">', '</div>'); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Status *</label>
                        <select id="status" name="status" required>
                            <option value="active" <?php echo set_select('status', 'active', $user['status'] == 'active'); ?>>Aktif</option>
                            <option value="inactive" <?php echo set_select('status', 'inactive', $user['status'] == 'inactive'); ?>>Tidak Aktif</option>
                        </select>
                        <?php echo form_error('status', '<div class="error-message">', '</div>'); ?>
                    </div>
                </div>

                <!-- Password Section -->
                <div class="password-section">
                    <h4><i class="fas fa-key"></i> Password</h4>
                    <p>Kosongkan field password jika tidak ingin mengubah password user.</p>
                </div>

                <div class="form-group">
                    <label for="password">Password Baru (Opsional)</label>
                    <input type="password" id="password" name="password" minlength="6">
                    <div class="help-text">Minimal 6 karakter. Kosongkan jika tidak ingin mengubah password.</div>
                </div>

                <div class="form-actions">
                    <a href="<?php echo base_url('admin/users'); ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan Perubahan
                    </button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tambahkan konfirmasi logout
        const logoutLink = document.getElementById('logoutLink');
        if (logoutLink) {
            logoutLink.addEventListener('click', function(e) {
                if (!confirm('Apakah Anda yakin ingin logout?')) {
                    e.preventDefault();
                }
            });
        }
    });
    </script>
</body>
</html> 