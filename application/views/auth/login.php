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
            --error-color: #E74C3C;
            --success-color: #2ECC71;
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
        }

        .login-container {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 1rem;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            color: var(--primary-color);
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .login-header p {
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
            padding: 0.8rem;
            border: 2px solid #E1E1E1;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .form-group .input-icon {
            position: relative;
        }

        .form-group .input-icon i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .form-group .input-icon input {
            padding-left: 2.5rem;
        }

        .btn-login {
            width: 100%;
            padding: 0.8rem;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #357ABD;
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .register-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .alert-error {
            background-color: #FDE8E8;
            color: var(--error-color);
            border: 1px solid #FBD5D5;
        }

        .alert-success {
            background-color: #DEF7EC;
            color: var(--success-color);
            border: 1px solid #BCF0DA;
        }

        @media (max-width: 480px) {
            .login-container {
                margin: 1rem;
                padding: 1.5rem;
            }

            .login-header h1 {
                font-size: 1.75rem;
            }
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
    <div class="login-container">
        <div class="login-header">
            <h1>QuickTix</h1>
            <p>Masuk ke akun Anda</p>
        </div>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-error">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php echo form_open('auth/login'); ?>
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
                </div>
                <?php echo form_error('email', '<small style="color: var(--error-color);">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <?php echo form_error('password', '<small style="color: var(--error-color);">', '</small>'); ?>
            </div>

            <button type="submit" class="btn-login">Masuk</button>
        <?php echo form_close(); ?>

        <div class="register-link">
            Belum punya akun? <a href="<?php echo base_url('auth/register'); ?>">Daftar di sini</a>
        </div>
        <div class="back-home-link" style="text-align:center; margin-top:1rem;">
            <a href="<?php echo base_url('home'); ?>" class="btn-back-home">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html> 