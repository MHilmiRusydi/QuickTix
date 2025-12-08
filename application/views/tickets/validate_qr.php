<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Validasi QR Tiket - QuickTix</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: #f5f6fa;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 420px;
            margin: 60px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(74,144,226,0.13);
            padding: 32px 28px 24px 28px;
        }
        h2 {
            color: #4A90E2;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        label {
            font-weight: 600;
            color: #2C3E50;
            margin-bottom: 0.5rem;
            display: block;
        }
        input[type="text"] {
            width: 100%;
            max-width: 382px;
            margin: 0 auto;
            padding: 0.8rem 1rem;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus {
            border-color: #4A90E2;
            outline: none;
        }
        .btn {
            width: 100%;
            background: #4A90E2;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.9rem 0;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 0.5rem;
        }
        .btn:hover {
            background: #357ABD;
        }
        .result-box {
            margin-top: 2rem;
            padding: 1.2rem 1rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(74,144,226,0.08);
            font-size: 1.05em;
        }
        .result-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #b7e4c7;
        }
        .result-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .result-box i {
            margin-right: 0.5rem;
        }
        .admin-warning {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 1.5rem;
            font-size: 0.98em;
            text-align: center;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-qrcode"></i> Validasi QR Tiket</h2>
        <div class="admin-warning">
            <i class="fas fa-user-shield"></i> Halaman ini hanya untuk admin & pengujian validasi tiket.<br>Masukkan data QR code (hasil scan atau manual).
        </div>
        <form id="qrForm" autocomplete="off">
            <div class="form-group">
                <label for="qr_data">Data QR Code</label>
                <input type="text" id="qr_data" name="qr_data" placeholder="TICKET-123|hash..." required autofocus>
            </div>
            <button type="submit" class="btn"><i class="fas fa-check-circle"></i> Cek Validasi</button>
        </form>
        <div id="resultBox" style="display:none;"></div>
    </div>
    <script>
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    document.getElementById('qrForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var qr = document.getElementById('qr_data').value.trim();
        var resultBox = document.getElementById('resultBox');
        resultBox.style.display = 'none';
        resultBox.innerHTML = '';
        if (!qr) return;
        fetch('<?php echo base_url('tickets/validate_qr'); ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'qr_data=' + encodeURIComponent(qr) + '&' + csrfName + '=' + csrfHash
        })
        .then(res => res.json())
        .then(data => {
            resultBox.style.display = 'block';
            if (data.status) {
                resultBox.className = 'result-box result-success';
                resultBox.innerHTML = '<i class="fas fa-check-circle"></i> ' + data.message + '<br><b>ID Transaksi:</b> ' + data.transaction_id + '<br><b>Event:</b> ' + (data.transaction ? data.transaction.event_name : '-') + '<br><b>Nama User:</b> ' + (data.transaction ? (data.transaction.full_name || '-') : '-');
            } else {
                resultBox.className = 'result-box result-error';
                resultBox.innerHTML = '<i class="fas fa-times-circle"></i> ' + data.message;
            }
        })
        .catch(() => {
            resultBox.style.display = 'block';
            resultBox.className = 'result-box result-error';
            resultBox.innerHTML = '<i class="fas fa-times-circle"></i> Gagal menghubungi server.';
        });
    });
    </script>
</body>
</html> 