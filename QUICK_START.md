# Quick Start Guide - QuickTix

## 🚀 Deployment Cepat dalam 5 Menit

### Langkah 1: Upload ke GitHub
```bash
# Di folder project Anda
git init
git add .
git commit -m "Initial commit: QuickTix project"
git branch -M main
git remote add origin https://github.com/MHilmiRusydi/quicktix.git
git push -u origin main
```

### Langkah 2: Setup Database
1. Buat database MySQL dengan nama `quicktix`
2. Import file `database.sql` atau `quicktix.sql`
3. Copy `application/config/database.sample.php` ke `application/config/database.php`
4. Edit kredensial database di file `database.php`

### Langkah 3: Konfigurasi Aplikasi
Edit `application/config/config.php`:
```php
$config['base_url'] = 'http://yourdomain.com/';
$config['encryption_key'] = 'your-random-32-character-string';
```

### Langkah 4: Set Permissions
```bash
chmod 755 application/cache
chmod 755 application/logs
chmod 755 uploads
```

### Langkah 5: Test Aplikasi
- Buka `http://yourdomain.com/`
- Test fitur login/register
- Test pencarian event
- Test pembelian tiket

## 📋 Checklist Deployment

- [ ] Repository GitHub sudah dibuat
- [ ] File sudah diupload ke GitHub
- [ ] Database sudah dibuat dan diimport
- [ ] File `database.php` sudah dikonfigurasi
- [ ] File `config.php` sudah dikonfigurasi
- [ ] Permissions folder sudah diset
- [ ] Mod_rewrite Apache sudah aktif
- [ ] Aplikasi sudah ditest

## 🔧 Troubleshooting Cepat

### Error 404
- Pastikan mod_rewrite aktif
- Periksa file `.htaccess`

### Error Database
- Periksa kredensial di `database.php`
- Pastikan database sudah dibuat

### Error Permission
- Jalankan: `chmod 755 application/cache application/logs uploads`

## 📞 Support

Jika ada masalah, periksa:
1. Error log Apache
2. Error log PHP
3. File log CodeIgniter di `application/logs/`

---

**Selamat! Aplikasi QuickTix Anda sudah siap digunakan! 🎉** 