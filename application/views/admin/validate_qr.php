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

        .qr-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .qr-header {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            text-align: center;
        }

        .qr-header h1 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .qr-header p {
            color: var(--text-color);
            opacity: 0.8;
        }

        .qr-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .qr-input-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .qr-input {
            width: 100%;
            max-width: 400px;
            padding: 1rem;
            border: 2px solid #e1e1e1;
            border-radius: 10px;
            font-size: 1rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .qr-input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        }

        .btn-validate {
            background: var(--primary-color);
            color: var(--white);
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-validate:hover {
            background: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .result-section {
            margin-top: 2rem;
            padding: 2rem;
            border-radius: 10px;
            display: none;
        }

        .result-success {
            background: var(--success-color);
            color: var(--white);
        }

        .result-error {
            background: var(--danger-color);
            color: var(--white);
        }

        .result-info {
            background: var(--info-color);
            color: var(--white);
        }

        .result-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .result-icon {
            font-size: 2rem;
        }

        .result-title {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .result-details {
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .detail-label {
            font-weight: 500;
        }

        .detail-value {
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                gap: 0.5rem;
            }

            .detail-row {
                flex-direction: column;
                gap: 0.25rem;
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
            <a href="<?php echo base_url('admin/transactions'); ?>" class="nav-link">
                <i class="fas fa-receipt"></i>
                Transaksi
            </a>
            <a href="<?php echo base_url('admin/users'); ?>" class="nav-link">
                <i class="fas fa-users"></i>
                User
            </a>
            <a href="<?php echo base_url('admin/validate_qr'); ?>" class="nav-link active">
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

    <div class="qr-container">
        <div class="qr-header">
            <h1><i class="fas fa-qrcode"></i> Validasi QR Tiket</h1>
            <p>Scan atau masukkan kode QR tiket untuk validasi</p>
        </div>

        <div class="qr-card">
            <div class="qr-input-section">
                <input type="text" id="qrInput" class="qr-input" placeholder="Masukkan kode QR tiket..." autocomplete="off">
                <button onclick="validateQR()" class="btn-validate">
                    <i class="fas fa-search"></i> Validasi Tiket
                </button>
            </div>

            <div id="resultSection" class="result-section">
                <div class="result-header">
                    <i id="resultIcon" class="result-icon"></i>
                    <div class="result-title" id="resultTitle"></div>
                </div>
                <div id="resultMessage"></div>
                <div id="resultDetails" class="result-details" style="display: none;">
                    <div class="detail-row">
                        <span class="detail-label">ID Transaksi:</span>
                        <span class="detail-value" id="transactionId"></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Event:</span>
                        <span class="detail-value" id="eventName"></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Pemilik:</span>
                        <span class="detail-value" id="ownerName"></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Jumlah Tiket:</span>
                        <span class="detail-value" id="quantity"></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Status:</span>
                        <span class="detail-value" id="status"></span>
                    </div>
                </div>
            </div>
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
        function getCookie(name) {
            let value = "; " + document.cookie;
            let parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(';').shift();
        }
        function validateQR() {
            const qrCode = document.getElementById('qrInput').value.trim();
            if (!qrCode) {
                alert('Masukkan kode QR terlebih dahulu!');
                return;
            }
            // Show loading
            document.getElementById('resultSection').style.display = 'block';
            document.getElementById('resultSection').className = 'result-section result-info';
            document.getElementById('resultIcon').className = 'result-icon fas fa-spinner fa-spin';
            document.getElementById('resultTitle').textContent = 'Memvalidasi...';
            document.getElementById('resultMessage').textContent = 'Sedang memproses validasi tiket...';
            document.getElementById('resultDetails').style.display = 'none';
            // Ambil token CSRF dari cookie
            const csrfToken = getCookie('csrf_cookie');
            // Send request to validate QR
            fetch('<?php echo base_url('tickets/validate_qr'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'qr_data=' + encodeURIComponent(qrCode) + '&csrf_token=' + encodeURIComponent(csrfToken)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    // Success
                    document.getElementById('resultSection').className = 'result-section result-success';
                    document.getElementById('resultIcon').className = 'result-icon fas fa-check-circle';
                    document.getElementById('resultTitle').textContent = 'Tiket Valid!';
                    document.getElementById('resultMessage').textContent = data.message;
                    // Show details
                    document.getElementById('resultDetails').style.display = 'block';
                    document.getElementById('transactionId').textContent = '#' + data.transaction_id;
                    document.getElementById('eventName').textContent = data.transaction.event_name || '-';
                    document.getElementById('ownerName').textContent = data.transaction.full_name || '-';
                    document.getElementById('quantity').textContent = data.transaction.quantity + ' tiket';
                    document.getElementById('status').textContent = 'Sudah Digunakan';
                } else {
                    // Error
                    document.getElementById('resultSection').className = 'result-section result-error';
                    document.getElementById('resultIcon').className = 'result-icon fas fa-times-circle';
                    document.getElementById('resultTitle').textContent = 'Tiket Tidak Valid!';
                    document.getElementById('resultMessage').textContent = data.message;
                    document.getElementById('resultDetails').style.display = 'none';
                }
            })
            .catch(error => {
                // Network error
                document.getElementById('resultSection').className = 'result-section result-error';
                document.getElementById('resultIcon').className = 'result-icon fas fa-exclamation-triangle';
                document.getElementById('resultTitle').textContent = 'Error!';
                document.getElementById('resultMessage').textContent = 'Terjadi kesalahan saat memvalidasi tiket.';
                document.getElementById('resultDetails').style.display = 'none';
            });
        }

        // Allow Enter key to submit
        document.getElementById('qrInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                validateQR();
            }
        });

        // Focus on input when page loads
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('qrInput').focus();
            // Tambahkan konfirmasi logout
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
            if (logoutModal) {
                logoutModal.addEventListener('click', function(e) {
                    if (e.target === logoutModal) logoutModal.classList.remove('show');
                });
            }
        });
    </script>
</body>
</html> 