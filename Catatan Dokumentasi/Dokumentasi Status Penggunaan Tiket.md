# Dokumentasi Status Penggunaan Tiket QuickTix

## Deskripsi Fitur
Fitur ini menampilkan informasi apakah tiket sudah digunakan atau belum untuk masuk event. Status ini penting untuk:
- Memantau tiket yang sudah digunakan
- Mencegah penggunaan ganda
- Memberikan informasi jelas kepada user

## Struktur Database

### Tabel `transactions`
Field yang digunakan:
```sql
`is_used` tinyint(1) NOT NULL DEFAULT 0
```
- `0` = Tiket belum digunakan
- `1` = Tiket sudah digunakan

## Implementasi

### 1. Tampilan Status di Halaman "Tiket Saya"
**File**: `application/views/tickets/index.php`

#### Status Badge
- **Belum Digunakan**: Badge hijau dengan ikon jam
- **Sudah Digunakan**: Badge abu-abu dengan ikon centang

#### Informasi Detail
- Status ditampilkan di bagian detail tiket
- Hanya muncul untuk tiket dengan status pembayaran 'paid'
- Dilengkapi dengan tooltip untuk penjelasan

### 2. Logika Validasi QR Code
**File**: `application/controllers/Tickets.php`

#### Proses Validasi
1. Scan QR code tiket
2. Cek apakah `is_used = 0`
3. Jika belum digunakan, update `is_used = 1`
4. Jika sudah digunakan, tampilkan pesan error

#### Kode Validasi
```php
if (!empty($transaction['is_used'])) {
    return $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode([
            'status' => false, 
            'message' => 'Tiket sudah pernah digunakan.'
        ]));
}

// Tandai tiket sebagai sudah digunakan
$this->db->where('id', $transaction_id);
$this->db->update('transactions', [
    'is_used' => 1, 
    'updated_at' => date('Y-m-d H:i:s')
]);
```

### 3. Tampilan di Admin Panel
**File**: `application/views/admin/validate_qr.php`

#### Status di Hasil Validasi
- Menampilkan status "Sudah Digunakan" setelah tiket divalidasi
- Memberikan feedback visual kepada admin

## Status Visual

### Warna dan Ikon
- **Belum Digunakan**: 
  - Warna: Hijau (#2ECC71)
  - Ikon: `fa-clock`
  - Teks: "Belum Digunakan"

- **Sudah Digunakan**:
  - Warna: Abu-abu (#6c757d)
  - Ikon: `fa-check-circle`
  - Teks: "Sudah Digunakan"

### CSS Classes
```css
.status-unused {
    background: var(--success-color);
    color: var(--white);
}

.status-used {
    background: #6c757d;
    color: var(--white);
}
```

## Alur Kerja

### 1. Pembelian Tiket
1. User membeli tiket
2. Status `is_used` otomatis `0` (default)
3. Tiket siap digunakan

### 2. Penggunaan Tiket
1. User datang ke event
2. Admin scan QR code tiket
3. Sistem cek `is_used`
4. Jika `0`, update menjadi `1`
5. Jika `1`, tampilkan pesan error

### 3. Monitoring
1. User bisa lihat status tiket di halaman "Tiket Saya"
2. Admin bisa monitor tiket yang sudah digunakan
3. Mencegah penggunaan ganda

## Keamanan

### Validasi
- QR code memiliki hash untuk mencegah manipulasi
- Status `is_used` hanya bisa diupdate melalui sistem validasi
- Tidak bisa diubah manual oleh user

### Backup
- Status tersimpan di database dengan timestamp
- Bisa dilacak kapan tiket digunakan
- Data tidak bisa dihapus untuk audit trail

## Testing

### Test Cases
1. **Tiket Baru**: Status harus "Belum Digunakan"
2. **Setelah Validasi**: Status berubah menjadi "Sudah Digunakan"
3. **Validasi Ganda**: Harus menolak dan tampilkan pesan error
4. **Tampilan UI**: Status harus terlihat jelas di semua device

### Data Testing
```sql
-- Cek tiket yang belum digunakan
SELECT * FROM transactions WHERE payment_status = 'paid' AND is_used = 0;

-- Cek tiket yang sudah digunakan
SELECT * FROM transactions WHERE payment_status = 'paid' AND is_used = 1;
```

## Maintenance

### Monitoring
- Periksa log validasi QR code
- Monitor tiket yang tidak digunakan setelah event
- Backup data transaksi secara berkala

### Troubleshooting
- Jika tiket tidak bisa divalidasi, cek field `is_used`
- Jika status tidak update, cek koneksi database
- Jika QR code error, cek hash dan secret key

## Kesimpulan

Fitur status penggunaan tiket memberikan:
- ✅ Transparansi status tiket kepada user
- ✅ Mencegah penggunaan ganda
- ✅ Monitoring yang mudah untuk admin
- ✅ Keamanan sistem tiket
- ✅ Audit trail yang lengkap 