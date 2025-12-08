# Panduan Validasi QR Tiket - QuickTix

## Overview
Sistem QuickTix memiliki dua halaman validasi QR yang berbeda:
1. **Halaman Admin** (`/admin/validate_qr`) - Khusus untuk admin
2. **Halaman User** (`/tickets/validate_qr_page`) - Untuk pengujian dan admin

## Cara Kerja Validasi QR

### 1. Format QR Code
QR code tiket menggunakan format: `TICKET-{ID}|{HASH}`
- **TICKET-{ID}**: ID transaksi tiket
- **{HASH}**: Hash SHA256 untuk keamanan

### 2. Proses Validasi
1. **Parsing QR Code**: Memisahkan ID transaksi dan hash
2. **Verifikasi Hash**: Memvalidasi hash menggunakan secret key
3. **Cek Database**: Memverifikasi transaksi di database
4. **Update Status**: Menandai tiket sebagai sudah digunakan

### 3. Endpoint API
Kedua halaman menggunakan endpoint yang sama: `/tickets/validate_qr`

## Perbedaan Halaman Admin vs User

### Halaman Admin (`/admin/validate_qr`)
- **Akses**: Hanya untuk user dengan role admin
- **Tampilan**: Interface admin yang lebih lengkap
- **Fitur**: 
  - Informasi detail transaksi
  - Status penggunaan tiket
  - Tampilan yang lebih profesional
- **Keamanan**: Menggunakan CSRF token

### Halaman User (`/tickets/validate_qr_page`)
- **Akses**: Terbuka untuk semua user
- **Tampilan**: Interface sederhana
- **Fitur**: 
  - Validasi dasar
  - Informasi minimal
- **Keamanan**: Menggunakan CSRF token

## Troubleshooting

### Masalah Umum

#### 1. "QR code tidak ditemukan"
- **Penyebab**: QR code kosong atau tidak valid
- **Solusi**: Pastikan QR code diisi dengan benar

#### 2. "Format QR code tidak valid"
- **Penyebab**: Format QR code tidak sesuai standar
- **Solusi**: Pastikan format: `TICKET-{ID}|{HASH}`

#### 3. "QR code tidak valid (hash mismatch)"
- **Penyebab**: Hash tidak sesuai dengan secret key
- **Solusi**: Periksa secret key di `application/config/config.php`

#### 4. "Transaksi tidak ditemukan"
- **Penyebab**: ID transaksi tidak ada di database
- **Solusi**: Periksa apakah transaksi masih ada

#### 5. "Tiket belum dibayar"
- **Penyebab**: Status pembayaran bukan 'paid'
- **Solusi**: Pastikan pembayaran sudah lunas

#### 6. "Tiket sudah pernah digunakan"
- **Penyebab**: Tiket sudah divalidasi sebelumnya
- **Solusi**: Tiket tidak bisa digunakan ulang

### Debug Mode

Untuk debugging, periksa:
1. **Console Browser**: Lihat error JavaScript
2. **Network Tab**: Periksa request/response API
3. **Log CodeIgniter**: Cek file log di `application/logs/`

## Konfigurasi

### Secret Key QR
Secret key untuk validasi QR ada di `application/config/config.php`:
```php
$config['qr_secret_key'] = '0813Shadowmole321';
```

### CSRF Protection
CSRF protection aktif di `application/config/config.php`:
```php
$config['csrf_protection'] = TRUE;
$config['csrf_token_name'] = 'csrf_token';
```

## Contoh Penggunaan

### 1. Validasi Tiket Baru
```
Input: TICKET-123|abc123hash
Output: Tiket valid dan berhasil digunakan
```

### 2. Validasi Tiket Sudah Digunakan
```
Input: TICKET-123|abc123hash
Output: Tiket sudah pernah digunakan
```

### 3. Validasi QR Tidak Valid
```
Input: INVALID-FORMAT
Output: Format QR code tidak valid
```

## Keamanan

1. **Hash Verification**: Setiap QR code memiliki hash unik
2. **CSRF Protection**: Mencegah serangan CSRF
3. **One-time Use**: Tiket hanya bisa digunakan sekali
4. **Admin Access Control**: Halaman admin hanya untuk admin

## Maintenance

### Backup Database
Lakukan backup database secara berkala untuk data transaksi.

### Monitoring
Monitor log untuk aktivitas mencurigakan.

### Update Secret Key
Ganti secret key secara berkala untuk keamanan tambahan. 