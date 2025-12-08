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

        .nav-container {
            background: var(--white);
            padding: 1rem 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-title {
            color: var(--secondary-color);
            margin-bottom: 2rem;
            font-size: 1.8rem;
        }

        .transactions {
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .transaction-item {
            padding: 1.5rem;
            border-bottom: 1px solid #eee;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr auto;
            align-items: center;
            gap: 1rem;
            transition: background-color 0.3s ease;
        }

        .transaction-item:hover {
            background-color: #f8f9fa;
        }

        .transaction-item:last-child {
            border-bottom: none;
        }

        .event-info h3 {
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .event-info p {
            color: #666;
            font-size: 0.9rem;
        }

        .transaction-details {
            color: var(--text-color);
        }

        .transaction-details p {
            margin-bottom: 0.3rem;
        }

        .transaction-details .label {
            color: #666;
            font-size: 0.9rem;
        }

        .status {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            text-align: center;
        }

        .status.pending {
            background-color: var(--warning-color);
            color: #fff;
        }

        .status.paid {
            background-color: var(--success-color);
            color: #fff;
        }

        .status.cancelled {
            background-color: var(--danger-color);
            color: #fff;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
        }

        .btn-detail {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-detail:hover {
            background: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.2);
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #666;
        }

        .empty-state i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 1rem;
        }

        .empty-state p {
            margin-bottom: 1rem;
        }

        .btn-primary {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.2);
        }

        @media (max-width: 768px) {
            .transaction-item {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .transaction-details {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <div class="nav-container">
        <a href="<?php echo base_url('dashboard'); ?>" class="nav-brand">QuickTix</a>
        <div class="nav-links">
            <a href="<?php echo base_url('dashboard'); ?>" class="nav-link">
                <i class="fas fa-home"></i>
                Dashboard
            </a>
            <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </div>
    </div>

    <div class="container">
        <h1 class="page-title">Riwayat Transaksi</h1>

        <div class="transactions">
            <?php if (empty($transactions)): ?>
                <div class="empty-state">
                    <i class="fas fa-receipt"></i>
                    <p>Belum ada transaksi</p>
                    <a href="<?php echo base_url('events/search'); ?>" class="btn btn-primary">
                        Cari Event
                    </a>
                </div>
            <?php else: ?>
                <?php foreach($transactions as $transaction): ?>
                    <div class="transaction-item">
                        <div class="event-info">
                            <h3><?php echo $transaction['event_name']; ?></h3>
                            <p><?php echo $transaction['event_type']; ?> • <?php echo date('d M Y H:i', strtotime($transaction['date'])); ?></p>
                        </div>
                        <div class="transaction-details">
                            <p><span class="label">Jumlah:</span> <?php echo $transaction['quantity']; ?> tiket</p>
                            <p><span class="label">Total:</span> Rp <?php echo number_format($transaction['total_price'], 0, ',', '.'); ?></p>
                        </div>
                        <div class="transaction-details">
                            <p><span class="label">Metode:</span> <?php echo ucfirst(str_replace('_', ' ', $transaction['payment_method'])); ?></p>
                            <p><span class="label">Tanggal:</span> <?php echo date('d M Y H:i', strtotime($transaction['created_at'])); ?></p>
                        </div>
                        <div class="status <?php echo $transaction['payment_status']; ?>">
                            <?php echo ucfirst($transaction['payment_status']); ?>
                        </div>
                        <a href="<?php echo base_url('transaction/detail/' . $transaction['id']); ?>" class="btn btn-detail">
                            Detail
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html> 