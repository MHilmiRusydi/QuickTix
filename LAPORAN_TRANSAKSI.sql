-- LAPORAN DETAIL TRANSAKSI QUICKTIX
-- Query untuk melihat semua transaksi dengan detail lengkap

SELECT 
    t.id AS Kode_Transaksi,
    u.full_name AS Nama_User,
    tk.event_name AS Event,
    t.quantity AS Jumlah_Ticket,
    CONCAT('Rp ', FORMAT(t.total_price, 0, 'id_ID')) AS Total_Harga,
    CASE 
        WHEN t.payment_status = 'paid' THEN 'Lunas'
        WHEN t.payment_status = 'pending' THEN 'Menunggu Pembayaran'
        WHEN t.payment_status = 'cancelled' THEN 'Dibatalkan'
        ELSE t.payment_status
    END AS Status_Pembayaran,
    CASE 
        WHEN t.is_used = 1 THEN 'Sudah Digunakan'
        WHEN t.is_used = 0 THEN 'Belum Digunakan'
        ELSE 'Tidak Diketahui'
    END AS Status_Penggunaan
FROM transactions t
JOIN users u ON t.user_id = u.id
JOIN tickets tk ON t.ticket_id = tk.id
ORDER BY t.created_at DESC;

-- Query untuk melihat ringkasan transaksi per status
SELECT 
    CASE 
        WHEN payment_status = 'paid' THEN 'Lunas'
        WHEN payment_status = 'pending' THEN 'Menunggu Pembayaran'
        WHEN payment_status = 'cancelled' THEN 'Dibatalkan'
        ELSE payment_status
    END AS Status_Pembayaran,
    COUNT(*) AS Jumlah_Transaksi,
    SUM(quantity) AS Total_Tiket,
    CONCAT('Rp ', FORMAT(SUM(total_price), 0, 'id_ID')) AS Total_Pendapatan
FROM transactions
GROUP BY payment_status
ORDER BY 
    CASE payment_status
        WHEN 'paid' THEN 1
        WHEN 'pending' THEN 2
        WHEN 'cancelled' THEN 3
        ELSE 4
    END;

-- Query untuk melihat transaksi yang sudah lunas dan belum digunakan
SELECT 
    t.id AS Kode_Transaksi,
    u.full_name AS Nama_User,
    tk.event_name AS Event,
    t.quantity AS Jumlah_Ticket,
    CONCAT('Rp ', FORMAT(t.total_price, 0, 'id_ID')) AS Total_Harga,
    t.created_at AS Tanggal_Pembelian,
    CASE 
        WHEN t.is_used = 1 THEN 'Sudah Digunakan'
        ELSE 'Belum Digunakan'
    END AS Status_Penggunaan
FROM transactions t
JOIN users u ON t.user_id = u.id
JOIN tickets tk ON t.ticket_id = tk.id
WHERE t.payment_status = 'paid'
ORDER BY t.created_at DESC;

-- Query untuk melihat transaksi per event
SELECT 
    tk.event_name AS Event,
    COUNT(t.id) AS Jumlah_Transaksi,
    SUM(t.quantity) AS Total_Tiket_Terjual,
    tk.available_tickets AS Tiket_Tersisa,
    CONCAT('Rp ', FORMAT(SUM(t.total_price), 0, 'id_ID')) AS Total_Pendapatan
FROM tickets tk
LEFT JOIN transactions t ON tk.id = t.ticket_id AND t.payment_status = 'paid'
GROUP BY tk.id, tk.event_name, tk.available_tickets
ORDER BY Total_Pendapatan DESC;

-- Query untuk melihat user dengan transaksi terbanyak
SELECT 
    u.full_name AS Nama_User,
    u.email AS Email,
    COUNT(t.id) AS Jumlah_Transaksi,
    SUM(t.quantity) AS Total_Tiket_Dibeli,
    CONCAT('Rp ', FORMAT(SUM(t.total_price), 0, 'id_ID')) AS Total_Pengeluaran
FROM users u
LEFT JOIN transactions t ON u.id = t.user_id AND t.payment_status = 'paid'
GROUP BY u.id, u.full_name, u.email
HAVING Jumlah_Transaksi > 0
ORDER BY Total_Pengeluaran DESC;

-- Query untuk melihat transaksi hari ini
SELECT 
    t.id AS Kode_Transaksi,
    u.full_name AS Nama_User,
    tk.event_name AS Event,
    t.quantity AS Jumlah_Ticket,
    CONCAT('Rp ', FORMAT(t.total_price, 0, 'id_ID')) AS Total_Harga,
    t.created_at AS Waktu_Transaksi,
    CASE 
        WHEN t.payment_status = 'paid' THEN 'Lunas'
        WHEN t.payment_status = 'pending' THEN 'Menunggu Pembayaran'
        WHEN t.payment_status = 'cancelled' THEN 'Dibatalkan'
        ELSE t.payment_status
    END AS Status_Pembayaran
FROM transactions t
JOIN users u ON t.user_id = u.id
JOIN tickets tk ON t.ticket_id = tk.id
WHERE DATE(t.created_at) = CURDATE()
ORDER BY t.created_at DESC; 