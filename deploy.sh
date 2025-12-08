#!/bin/bash

# QuickTix Deployment Script
# Script ini membantu deployment aplikasi QuickTix ke server

echo "=========================================="
echo "QuickTix Deployment Script"
echo "=========================================="

# Fungsi untuk menampilkan pesan error
error_exit() {
    echo "Error: $1" >&2
    exit 1
}

# Fungsi untuk menampilkan pesan sukses
success_msg() {
    echo "✅ $1"
}

# Fungsi untuk menampilkan pesan info
info_msg() {
    echo "ℹ️  $1"
}

# Cek apakah script dijalankan sebagai root
if [[ $EUID -eq 0 ]]; then
   error_exit "Script ini tidak boleh dijalankan sebagai root"
fi

# Cek apakah Git terinstall
if ! command -v git &> /dev/null; then
    error_exit "Git tidak terinstall. Silakan install Git terlebih dahulu."
fi

# Cek apakah PHP terinstall
if ! command -v php &> /dev/null; then
    error_exit "PHP tidak terinstall. Silakan install PHP terlebih dahulu."
fi

# Cek apakah MySQL terinstall
if ! command -v mysql &> /dev/null; then
    error_exit "MySQL tidak terinstall. Silakan install MySQL terlebih dahulu."
fi

info_msg "Memulai deployment QuickTix..."

# 1. Backup database (jika ada)
if [ -f "application/config/database.php" ]; then
    info_msg "Membuat backup database..."
    DB_NAME=$(grep -o "'database' => '[^']*'" application/config/database.php | cut -d"'" -f4)
    if [ ! -z "$DB_NAME" ]; then
        mysqldump -u root -p "$DB_NAME" > "backup_$(date +%Y%m%d_%H%M%S).sql"
        success_msg "Backup database berhasil dibuat"
    fi
fi

# 2. Pull latest changes dari Git
info_msg "Mengambil perubahan terbaru dari Git..."
git pull origin main || error_exit "Gagal mengambil perubahan dari Git"

# 3. Set permissions
info_msg "Mengatur permissions folder..."
chmod 755 application/cache 2>/dev/null || info_msg "Folder cache tidak ditemukan"
chmod 755 application/logs 2>/dev/null || info_msg "Folder logs tidak ditemukan"
chmod 755 uploads 2>/dev/null || info_msg "Folder uploads tidak ditemukan"

# 4. Cek apakah ada file config yang perlu diupdate
if [ ! -f "application/config/database.php" ]; then
    info_msg "File database.php tidak ditemukan. Silakan copy dari database.sample.php"
    if [ -f "application/config/database.sample.php" ]; then
        cp application/config/database.sample.php application/config/database.php
        success_msg "File database.php berhasil dibuat dari sample"
        info_msg "Silakan edit file application/config/database.php dengan kredensial database Anda"
    fi
fi

# 5. Cek apakah ada file .htaccess
if [ ! -f ".htaccess" ]; then
    info_msg "Membuat file .htaccess..."
    cat > .htaccess << 'EOF'
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
EOF
    success_msg "File .htaccess berhasil dibuat"
fi

# 6. Cek apakah ada file index.html di folder yang perlu dilindungi
info_msg "Membuat file index.html untuk keamanan..."
for dir in application system; do
    if [ -d "$dir" ] && [ ! -f "$dir/index.html" ]; then
        cat > "$dir/index.html" << 'EOF'
<!DOCTYPE html>
<html>
<head>
    <title>403 Forbidden</title>
</head>
<body>
<p>Directory access is forbidden.</p>
</body>
</html>
EOF
        success_msg "File index.html berhasil dibuat di folder $dir"
    fi
done

# 7. Cek apakah ada file composer.json dan jalankan composer install
if [ -f "composer.json" ]; then
    if command -v composer &> /dev/null; then
        info_msg "Menjalankan composer install..."
        composer install --no-dev --optimize-autoloader
        success_msg "Composer install berhasil"
    else
        info_msg "Composer tidak terinstall. Silakan install Composer jika diperlukan."
    fi
fi

# 8. Cek apakah ada file database.sql untuk import
if [ -f "database.sql" ]; then
    info_msg "File database.sql ditemukan."
    read -p "Apakah Anda ingin mengimport database? (y/n): " -n 1 -r
    echo
    if [[ $REPLY =~ ^[Yy]$ ]]; then
        read -p "Masukkan nama database: " DB_NAME
        read -p "Masukkan username MySQL: " DB_USER
        read -s -p "Masukkan password MySQL: " DB_PASS
        echo
        
        mysql -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" < database.sql
        if [ $? -eq 0 ]; then
            success_msg "Database berhasil diimport"
        else
            error_exit "Gagal mengimport database"
        fi
    fi
fi

# 9. Cek apakah ada file quicktix.sql untuk import
if [ -f "quicktix.sql" ]; then
    info_msg "File quicktix.sql ditemukan."
    read -p "Apakah Anda ingin mengimport database quicktix? (y/n): " -n 1 -r
    echo
    if [[ $REPLY =~ ^[Yy]$ ]]; then
        read -p "Masukkan nama database: " DB_NAME
        read -p "Masukkan username MySQL: " DB_USER
        read -s -p "Masukkan password MySQL: " DB_PASS
        echo
        
        mysql -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" < quicktix.sql
        if [ $? -eq 0 ]; then
            success_msg "Database quicktix berhasil diimport"
        else
            error_exit "Gagal mengimport database quicktix"
        fi
    fi
fi

# 10. Cek apakah Apache mod_rewrite aktif
if command -v apache2ctl &> /dev/null; then
    info_msg "Mengecek Apache mod_rewrite..."
    if apache2ctl -M 2>/dev/null | grep -q rewrite; then
        success_msg "Apache mod_rewrite sudah aktif"
    else
        info_msg "Apache mod_rewrite belum aktif. Silakan jalankan: sudo a2enmod rewrite && sudo systemctl restart apache2"
    fi
fi

# 11. Tampilkan informasi deployment
echo ""
echo "=========================================="
echo "Deployment Selesai!"
echo "=========================================="
success_msg "Aplikasi QuickTix berhasil di-deploy"
echo ""
info_msg "Langkah selanjutnya:"
echo "1. Edit file application/config/database.php dengan kredensial database Anda"
echo "2. Edit file application/config/config.php dan set base_url sesuai domain Anda"
echo "3. Pastikan folder application/cache, application/logs, dan uploads memiliki permission 755"
echo "4. Test aplikasi di browser"
echo ""
info_msg "Jika ada masalah, periksa:"
echo "- Error log Apache: /var/log/apache2/error.log"
echo "- Error log PHP: /var/log/php_errors.log"
echo "- File log CodeIgniter: application/logs/"
echo ""
success_msg "Terima kasih telah menggunakan QuickTix!"

exit 0 