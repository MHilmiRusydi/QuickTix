# 🚀 QuickTix Deployment Guide

## 📋 **Repository Information**
- **Repository**: https://github.com/MHilmiRusydi/quicktix
- **Status**: Public (Recommended for UAS Project)
- **Alternative**: Private repository dengan deployment key

### **Jika Repository Private:**
```bash
# Setup SSH Key untuk deployment
ssh-keygen -t rsa -b 4096 -C "deployment@yourdomain.com"

# Tambahkan public key ke GitHub:
# 1. Buka repository Settings
# 2. Deploy keys → Add deploy key
# 3. Paste public key content
# 4. Allow write access (jika diperlukan)
```

## 📋 **Panduan Deployment QuickTix**

## Daftar Isi
1. [Persiapan Repository GitHub](#persiapan-repository-github)
2. [Setup Local Development](#setup-local-development)
3. [Deployment ke Shared Hosting](#deployment-ke-shared-hosting)
4. [Deployment ke VPS/Dedicated Server](#deployment-ke-vpsdedicated-server)
5. [Troubleshooting](#troubleshooting)

## Persiapan Repository GitHub

### 1. Buat Repository di GitHub
1. Buka [GitHub.com](https://github.com)
2. Klik "New repository"
3. Isi nama repository: `quicktix`
4. Pilih "Public" atau "Private"
5. Jangan centang "Initialize this repository with a README"
6. Klik "Create repository"

### 2. Inisialisasi Git di Project Local
```bash
# Buka terminal/command prompt di folder project
cd /path/to/Project-UAS

# Inisialisasi Git
git init

# Tambahkan remote repository
git remote add origin https://github.com/username/quicktix.git

# Tambahkan semua file ke staging
git add .

# Commit pertama
git commit -m "Initial commit: QuickTix project"

# Push ke GitHub
git push -u origin main
```

### 3. Verifikasi Upload
- Buka repository GitHub Anda
- Pastikan semua file sudah terupload
- Periksa file `.gitignore` sudah berfungsi dengan baik

## Setup Local Development

### 1. Clone Repository
```bash
git clone https://github.com/username/quicktix.git
cd quicktix
```

### 2. Setup Database
1. Buat database MySQL baru dengan nama `quicktix`
2. Import file `database.sql` atau `quicktix.sql`
3. Copy `application/config/database.sample.php` ke `application/config/database.php`
4. Edit file `database.php` dengan kredensial database Anda

### 3. Konfigurasi Aplikasi
1. Edit `application/config/config.php`
2. Set `base_url` sesuai dengan URL local Anda:
   ```php
   $config['base_url'] = 'http://localhost/quicktix/';
   ```
3. Set `encryption_key` untuk keamanan:
   ```php
   $config['encryption_key'] = 'your-random-32-character-string';
   ```

### 4. Setup Web Server
- **XAMPP**: Letakkan folder project di `htdocs/`
- **WAMP**: Letakkan folder project di `www/`
- **LAMP**: Letakkan folder project di `/var/www/html/`

### 5. Set Permissions (Linux/Mac)
```bash
chmod 755 application/cache
chmod 755 application/logs
chmod 755 uploads
```

## Deployment ke Shared Hosting

### 1. Persiapan File
1. **Backup database** dari local development
2. **Export database** ke file SQL
3. **Compress project** (zip) tanpa folder `.git`

### 2. Upload ke Hosting
1. Login ke cPanel hosting
2. Buka File Manager
3. Navigasi ke folder `public_html`
4. Upload file zip project
5. Extract file zip

### 3. Setup Database di Hosting
1. Buka phpMyAdmin di cPanel
2. Buat database baru
3. Import file SQL yang sudah di-backup
4. Catat nama database, username, dan password

### 4. Konfigurasi Aplikasi
1. Edit `application/config/database.php`:
   ```php
   $db['default'] = array(
       'hostname' => 'localhost',
       'username' => 'hosting_username',
       'password' => 'hosting_password',
       'database' => 'hosting_database_name',
       'dbdriver' => 'mysqli',
       // ... konfigurasi lainnya
   );
   ```

2. Edit `application/config/config.php`:
   ```php
   $config['base_url'] = 'https://yourdomain.com/';
   ```

### 5. Set Permissions
Di File Manager, set permissions:
- `application/cache` → 755
- `application/logs` → 755
- `uploads` → 755

### 6. Test Aplikasi
- Buka `https://yourdomain.com/`
- Test semua fitur utama
- Periksa error log jika ada masalah

## Deployment ke VPS/Dedicated Server

### 1. Persiapan Server
```bash
# Update sistem
sudo apt update && sudo apt upgrade -y

# Install LAMP stack
sudo apt install apache2 mysql-server php php-mysql php-curl php-gd php-mbstring php-xml php-zip -y

# Install Git
sudo apt install git -y
```

### 2. Setup Apache
```bash
# Aktifkan mod_rewrite
sudo a2enmod rewrite
sudo systemctl restart apache2

# Set document root (opsional)
sudo nano /etc/apache2/sites-available/000-default.conf
```

### 3. Setup MySQL
```bash
# Secure MySQL installation
sudo mysql_secure_installation

# Buat database dan user
sudo mysql -u root -p
```

```sql
CREATE DATABASE quicktix;
CREATE USER 'quicktix_user'@'localhost' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON quicktix.* TO 'quicktix_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 4. Clone dan Setup Project
```bash
# Clone repository
cd /var/www/html
sudo git clone https://github.com/username/quicktix.git
sudo chown -R www-data:www-data quicktix
cd quicktix

# Set permissions
sudo chmod 755 application/cache
sudo chmod 755 application/logs
sudo chmod 755 uploads
```

### 5. Konfigurasi Aplikasi
```bash
# Copy dan edit database config
sudo cp application/config/database.sample.php application/config/database.php
sudo nano application/config/database.php
```

```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'quicktix_user',
    'password' => 'your_password',
    'database' => 'quicktix',
    'dbdriver' => 'mysqli',
    // ... konfigurasi lainnya
);
```

```bash
# Edit config.php
sudo nano application/config/config.php
```

```php
$config['base_url'] = 'https://yourdomain.com/';
$config['encryption_key'] = 'your-random-32-character-string';
```

### 6. Import Database
```bash
# Import database
mysql -u quicktix_user -p quicktix < database.sql
```

### 7. Setup SSL (Opsional)
```bash
# Install Certbot
sudo apt install certbot python3-certbot-apache -y

# Setup SSL certificate
sudo certbot --apache -d yourdomain.com
```

### 8. Test Aplikasi
- Buka `https://yourdomain.com/`
- Test semua fitur
- Periksa error log: `sudo tail -f /var/log/apache2/error.log`

## Troubleshooting

### Error 404 - Page Not Found
**Penyebab**: Mod_rewrite tidak aktif atau .htaccess tidak ada
**Solusi**:
```bash
# Aktifkan mod_rewrite
sudo a2enmod rewrite
sudo systemctl restart apache2

# Pastikan .htaccess ada di root folder
```

### Error Database Connection
**Penyebab**: Konfigurasi database salah
**Solusi**:
1. Periksa kredensial database
2. Pastikan database sudah dibuat
3. Periksa file `application/config/database.php`

### Error Permission Denied
**Penyebab**: Folder tidak memiliki permission yang tepat
**Solusi**:
```bash
sudo chown -R www-data:www-data /var/www/html/quicktix
sudo chmod 755 application/cache application/logs uploads
```

### Error Base URL
**Penyebab**: Base URL tidak sesuai dengan domain
**Solusi**:
1. Edit `application/config/config.php`
2. Set `base_url` sesuai dengan domain Anda
3. Pastikan tidak ada trailing slash yang salah

### Error Upload File
**Penyebab**: Folder uploads tidak writable
**Solusi**:
```bash
sudo chmod 777 uploads
# Atau lebih aman:
sudo chown www-data:www-data uploads
sudo chmod 755 uploads
```

## Tips Keamanan

### 1. Backup Regular
```bash
# Backup database
mysqldump -u username -p quicktix > backup_$(date +%Y%m%d).sql

# Backup files
tar -czf backup_$(date +%Y%m%d).tar.gz /var/www/html/quicktix
```

### 2. Update Regular
```bash
# Update sistem
sudo apt update && sudo apt upgrade -y

# Update aplikasi
cd /var/www/html/quicktix
git pull origin main
```

### 3. Monitoring
```bash
# Monitor error log
sudo tail -f /var/log/apache2/error.log

# Monitor access log
sudo tail -f /var/log/apache2/access.log
```

## Support

Jika mengalami masalah, silakan:
1. Periksa error log
2. Pastikan semua langkah sudah diikuti
3. Periksa dokumentasi CodeIgniter
4. Buat issue di GitHub repository

---

**Catatan**: Pastikan untuk mengganti `username`, `yourdomain.com`, dan kredensial database sesuai dengan konfigurasi Anda. 