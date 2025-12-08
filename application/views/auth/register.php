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
            --error-color: #E74C3C;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--background-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .register-container {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-header h1 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .register-header p {
            color: var(--text-color);
            opacity: 0.8;
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

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #eee;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        }

        .btn {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
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

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: var(--error-color);
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: var(--white);
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            position: relative;
            animation: modalFadeIn 0.3s ease-out;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-cancel {
            background-color: #ccc;
            color: var(--text-color);
        }

        .btn-confirm {
            background-color: var(--success-color);
            color: var(--white);
        }

        .btn-cancel:hover,
        .btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .btn-back-home {
            display: inline-block;
            margin-top: 0.5rem;
            color: var(--primary-color);
            background: var(--white);
            border: 2px solid var(--primary-color);
            border-radius: 5px;
            padding: 0.5rem 1.2rem;
            font-weight: 500;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(74,144,226,0.08);
            transition: all 0.3s ease;
        }
        .btn-back-home i {
            margin-right: 0.5rem;
        }
        .btn-back-home:hover {
            background: var(--primary-color);
            color: var(--white);
            box-shadow: 0 4px 15px rgba(74,144,226,0.18);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1>Daftar Akun</h1>
            <p>Buat akun baru untuk mulai menggunakan QuickTix</p>
        </div>

        <?php if($this->session->flashdata('error')): ?>
            <div class="error-message">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php echo form_open('auth/register', ['id' => 'registerForm']); ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="Masukkan Username" required>
                <?php echo form_error('username', '<div class="error-message">', '</div>'); ?>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Masukkan Email" required>
                <?php echo form_error('email', '<div class="error-message">', '</div>'); ?>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                <?php echo form_error('password', '<div class="error-message">', '</div>'); ?>
            </div>

            <div class="form-group">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password" required>
                <?php echo form_error('confirm_password', '<div class="error-message">', '</div>'); ?>
            </div>

            <div class="form-group">
                <label for="full_name">Nama Lengkap</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo set_value('full_name'); ?>" placeholder="Masukkan Nama Lengkap" required>
                <?php echo form_error('full_name', '<div class="error-message">', '</div>'); ?>
            </div>

            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="tel" id="phone" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Masukkan Nomor Telepon" required>
                <?php echo form_error('phone', '<div class="error-message">', '</div>'); ?>
            </div>

            <button type="button" class="btn btn-register" onclick="showConfirmationModal()">Daftar</button>
        <?php echo form_close(); ?>

        <div class="login-link">
            Sudah punya akun? <a href="<?php echo base_url('auth/login'); ?>">Masuk di sini</a>
        </div>
        <div class="back-home-link" style="text-align:center; margin-top:1rem;">
            <a href="<?php echo base_url('home'); ?>" class="btn-back-home">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <h2>Konfirmasi Pendaftaran</h2>
            <p>Apakah data yang Anda masukkan sudah benar?</p>
            <div class="modal-buttons">
                <button type="button" class="btn btn-cancel" onclick="closeConfirmationModal()">Periksa Kembali</button>
                <button type="button" class="btn btn-confirm" onclick="submitForm()">Ya, Daftar Sekarang</button>
            </div>
        </div>
    </div>

    <script>
        function showConfirmationModal() {
            document.getElementById('confirmationModal').style.display = 'block';
        }

        function closeConfirmationModal() {
            document.getElementById('confirmationModal').style.display = 'none';
        }

        function submitForm() {
            document.getElementById('registerForm').submit();
        }

        // Menutup modal jika user mengklik di luar modal
        window.onclick = function(event) {
            var modal = document.getElementById('confirmationModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html> 