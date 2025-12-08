# Sistem Admin QuickTix

## Overview
Sistem admin QuickTix adalah panel kontrol yang memungkinkan administrator untuk mengelola seluruh aspek aplikasi tiket event secara terpusat.

## Fitur Utama

### 1. Dashboard Admin
- **Statistik Real-time**: Total event, transaksi, user, dan pendapatan
- **Transaksi Terbaru**: Daftar 5 transaksi terbaru dengan detail
- **Quick Actions**: Link cepat ke fitur-fitur utama

### 2. Manajemen Event
- **Daftar Event**: Tampilan semua event dalam format tabel
- **Tambah Event**: Form untuk menambah event baru
- **Edit Event**: Modal popup untuk mengedit event (Fitur Baru!)
- **Hapus Event**: Penghapusan event (dengan validasi transaksi)
- **Status Event**: Aktif/nonaktif

#### Fitur Edit Modal Event
- **Modal Popup**: Edit event tanpa meninggalkan halaman
- **Form Lengkap**: Semua field event dapat diedit
- **CSRF Protection**: Keamanan form dengan token CSRF
- **Validasi Real-time**: Validasi form sebelum submit
- **Loading State**: Indikator loading saat menyimpan
- **Keyboard Support**: Escape key untuk tutup modal
- **Click Outside**: Tutup modal dengan klik di luar

#### Keamanan CSRF
- **CSRF Token**: Setiap form dilengkapi token keamanan
- **Auto-regenerate**: Token diperbarui otomatis
- **Library Security**: Menggunakan CodeIgniter Security Library
- **Form Validation**: Validasi server-side yang ketat

### 3. Manajemen Transaksi
- **Daftar Transaksi**: Semua transaksi dengan detail lengkap
- **Update Status**: Mengubah status pembayaran (pending/paid/cancelled)
- **Validasi Tiket**: Sistem validasi tiket otomatis
- **Refund Handling**: Penanganan pembatalan dan pengembalian tiket

### 4. Manajemen User
- **Daftar User**: Semua user terdaftar dengan informasi lengkap
- **Edit User**: Modifikasi data user (nama, email, role, status)
- **Toggle Status**: Aktifkan/nonaktifkan user
- **Delete User**: Penghapusan user (dengan validasi transaksi)
- **Role Management**: Pengelolaan role user dan admin
- **Search & Filter**: Pencarian dan filter user berdasarkan kriteria

### 5. Validasi QR Tiket
- **QR Scanner**: Interface untuk scan QR code tiket
- **Real-time Validation**: Validasi tiket secara real-time
- **Status Update**: Update status penggunaan tiket
- **Audit Trail**: Log aktivitas validasi tiket

## Keamanan

### CSRF Protection
- **Enabled**: CSRF protection diaktifkan secara global
- **Token Name**: `csrf_token`
- **Cookie Name**: `csrf_cookie`
- **Expire Time**: 7200 detik (2 jam)
- **Auto Regenerate**: Token diperbarui setiap submit
- **Library**: Security library di-autoload

### Role-Based Access Control
- **Admin Only**: Hanya user dengan role 'admin' yang dapat akses
- **Session Validation**: Validasi session di setiap method
- **Redirect Protection**: Redirect ke login jika tidak authorized
- **Flash Messages**: Pesan error untuk unauthorized access

### Form Security
- **Input Validation**: Validasi input menggunakan CodeIgniter Form Validation
- **XSS Protection**: Protection terhadap Cross-Site Scripting
- **SQL Injection**: Protection menggunakan Query Builder
- **File Upload**: Validasi file upload yang aman

## Teknologi yang Digunakan

### Backend
- **Framework**: CodeIgniter 3
- **Database**: MySQL
- **Session**: CodeIgniter Session Library
- **Security**: CodeIgniter Security Library
- **Validation**: CodeIgniter Form Validation Library

### Frontend
- **CSS**: Custom CSS dengan CSS Variables
- **JavaScript**: Vanilla JavaScript untuk modal dan interaksi
- **Icons**: Font Awesome 6.0
- **Fonts**: Google Fonts (Poppins)
- **Responsive**: Mobile-first responsive design

### Database
- **Tables**: users, tickets, transactions
- **Relations**: Foreign key relationships
- **Indexes**: Optimized database indexes
- **Constraints**: Data integrity constraints

## Cara Penggunaan

### Akses Admin Panel
1. Login dengan akun yang memiliki role 'admin'
2. Klik link "Admin Panel" di navbar
3. Atau akses langsung ke `/admin`

### Edit Event via Modal
1. Buka halaman `/admin/events`
2. Klik tombol "Edit" pada event yang ingin diedit
3. Modal akan muncul dengan data event yang sudah terisi
4. Edit data sesuai kebutuhan
5. Klik "Simpan Perubahan"
6. Modal akan menutup dan halaman akan refresh

### Manajemen User
1. Buka halaman `/admin/users`
2. Gunakan search dan filter untuk menemukan user
3. Klik tombol edit untuk mengubah data user
4. Gunakan toggle status untuk aktifkan/nonaktifkan user
5. Hapus user jika diperlukan (dengan validasi)

### Validasi QR Tiket
1. Buka halaman `/admin/validate_qr`
2. Scan QR code tiket menggunakan scanner
3. Sistem akan memvalidasi tiket secara real-time
4. Status tiket akan diperbarui otomatis

## Troubleshooting

### Error CSRF Protection
Jika muncul error "The action you have requested is not allowed":
1. Pastikan library 'security' sudah di-autoload
2. Pastikan CSRF token ada di form
3. Pastikan token tidak expired
4. Refresh halaman untuk mendapatkan token baru

### Modal Tidak Muncul
1. Cek console browser untuk error JavaScript
2. Pastikan Font Awesome sudah ter-load
3. Pastikan tidak ada konflik CSS
4. Coba refresh halaman

### Database Error
1. Cek koneksi database
2. Pastikan tabel sudah dibuat dengan benar
3. Cek log error di `application/logs/`
4. Pastikan foreign key constraints tidak dilanggar

## Maintenance

### Backup Database
- Backup database secara berkala
- Simpan backup di lokasi yang aman
- Test restore procedure secara berkala

### Log Monitoring
- Monitor log error di `application/logs/`
- Monitor aktivitas admin
- Monitor transaksi mencurigakan

### Security Updates
- Update CodeIgniter ke versi terbaru
- Update dependencies secara berkala
- Monitor security advisories

## Deployment

### Production Setup
1. Set `$config['base_url']` ke domain production
2. Disable error reporting di production
3. Set `$config['csrf_regenerate'] = FALSE` untuk performance
4. Enable caching untuk performance
5. Setup SSL certificate

### Environment Variables
- Database credentials
- API keys (jika ada)
- Email settings
- File upload settings

## Support

### Dokumentasi
- Dokumentasi lengkap tersedia di folder `Catatan Dokumentasi/`
- README.md untuk quick start
- DEPLOYMENT.md untuk panduan deployment

### Contact
- Developer: [Nama Developer]
- Email: [Email Developer]
- Repository: [URL Repository]

---

**Versi**: 1.0.0  
**Update Terakhir**: [Tanggal Update]  
**Status**: Production Ready