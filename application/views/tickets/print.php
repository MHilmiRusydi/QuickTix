<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/tickets.png'); ?>">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f8fb;
            margin: 0;
            padding: 0;
        }
        .ticket-box {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(74,144,226,0.15);
            border: 2px dashed #4A90E2;
            padding: 36px 32px 24px 32px;
            max-width: 420px;
            margin: 40px auto;
            position: relative;
        }
        .ticket-title {
            font-size: 2.2em;
            color: #4A90E2;
            font-weight: bold;
            margin-bottom: 18px;
            letter-spacing: 1px;
            text-align: center;
        }
        .ticket-info {
            margin-bottom: 12px;
            font-size: 1.08em;
        }
        .ticket-info strong {
            color: #333;
            min-width: 110px;
            display: inline-block;
        }
        .ticket-id {
            background: #e3f0fc;
            color: #2176bd;
            padding: 7px 0;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            margin-top: 18px;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }
        .qr-section {
            text-align: center;
            margin: 18px 0 10px 0;
        }
        .print-btn {
            display: block;
            width: 100%;
            background: #4A90E2;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 0;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            margin-top: 18px;
            transition: background 0.2s;
        }
        .print-btn:hover {
            background: #357ab8;
        }
        @media print {
            .print-btn { display: none; }
            body { background: #fff; }
            .ticket-box { box-shadow: none; border: 2px solid #4A90E2; }
        }
        .ticket-table td {
            padding: 4px 8px 4px 0;
            vertical-align: top;
        }
        .ticket-table tr td:first-child {
            color: #333;
            font-weight: 600;
            min-width: 90px;
        }
        .ticket-table tr td:nth-child(2) {
            width: 10px;
            color: #888;
        }
        .ticket-table tr td:last-child {
            color: #222;
            font-weight: 500;
        }
        .qr-warning {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
            border-radius: 8px;
            padding: 10px 14px;
            margin-top: 12px;
            font-size: 0.98em;
            text-align: center;
            box-shadow: 0 2px 8px rgba(255,193,7,0.08);
            font-weight: 500;
        }
        .qr-warning i {
            color: #e6a100;
            margin-right: 6px;
        }
        .btn-back-tickets {
            display: block;
            width: 100%;
            background: #fff;
            color: #4A90E2;
            border: 2px solid #4A90E2;
            border-radius: 8px;
            padding: 12px 0;
            font-size: 1.1em;
            font-weight: bold;
            text-align: center;
            margin-top: 12px;
            text-decoration: none;
            transition: all 0.2s;
            box-shadow: 0 2px 8px rgba(74,144,226,0.08);
        }
        .btn-back-tickets i {
            margin-right: 0.5rem;
        }
        .btn-back-tickets:hover {
            background: #4A90E2;
            color: #fff;
            box-shadow: 0 4px 15px rgba(74,144,226,0.18);
            transform: translateY(-2px);
        }
        @media print {
            .print-btn, .btn-back-tickets { display: none; }
        }
    </style>
</head>
<body>
    <?php
    $id = $transaction['id'];
    $CI =& get_instance();
    $CI->load->config('config');
    $secret = $CI->config->item('qr_secret_key');
    $data = "TICKET-$id";
    $hash = hash('sha256', $data . $secret);
    $qr_data = "$data|$hash";
    ?>
    <div class="ticket-box">
        <div class="ticket-title">E-Ticket</div>
        <div class="ticket-id">ID Transaksi: #<?php echo $transaction['id']; ?></div>
        <table class="ticket-table" style="width:100%;margin-bottom:18px;font-size:1.08em;">
            <tr><td><strong>Event</strong></td><td>:</td><td><?php echo $transaction['event_name']; ?></td></tr>
            <tr><td><strong>Tipe</strong></td><td>:</td><td><?php echo $transaction['event_type']; ?></td></tr>
            <tr><td><strong>Lokasi</strong></td><td>:</td><td><?php echo $transaction['location']; ?></td></tr>
            <tr><td><strong>Tanggal</strong></td><td>:</td><td><?php echo date('d F Y', strtotime($transaction['date'])); ?></td></tr>
            <tr><td><strong>Jumlah Tiket</strong></td><td>:</td><td><?php echo $transaction['quantity']; ?></td></tr>
        </table>
        <div class="qr-section">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=<?php echo urlencode(
                $qr_data
            ); ?>" alt="QR Code Tiket">
            <div style="font-size:0.9em;color:#888;margin-top:4px;">Tunjukkan QR ini saat masuk</div>
            <div class="qr-warning">
                <i class="fas fa-exclamation-triangle"></i> <b>Jangan pernah membagikan QR code tiket ini ke siapapun!</b><br>
                QR code hanya untuk keperluan masuk event. Jika QR code tersebar, tiket Anda bisa digunakan orang lain.
            </div>
        </div>
        <button class="print-btn" onclick="window.print()">
            <i class="fas fa-print"></i> Cetak Tiket
        </button>
        <a href="<?php echo base_url('tickets'); ?>" class="btn-back-tickets">
            <i class="fas fa-arrow-left"></i> Kembali ke Tiket Saya
        </a>
    </div>
</body>
</html>