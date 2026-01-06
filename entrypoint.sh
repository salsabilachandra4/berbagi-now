#!/bin/bash
set -e

# Masuk ke direktori root aplikasi
cd /var/www/html

# --- BAGIAN 1: CLEANUP & PREPARATION ---
echo "🧹 Clearing all caches..."
# Membersihkan cache lama agar tidak ada konfigurasi nyangkut
php artisan optimize:clear || true

# Memastikan folder-folder sistem Laravel tersedia
mkdir -p storage/app/public storage/framework/sessions storage/framework/views storage/framework/cache storage/logs bootstrap/cache

# --- BAGIAN 2: DATABASE ---
echo "⌛ Running Migration & Seeding..."
# Update struktur tabel tanpa menghapus data
php artisan migrate --force
# Input data awal (admin/volunteer) ke database
php artisan db:seed --force || echo "⚠️ Seeder skipped/failed"

# --- BAGIAN 3: STORAGE LINK & PERMISSIONS (SOLUSI GAMBAR) ---
echo "🔗 Configuring Storage & Symlinks..."
# Hapus link lama yang mungkin rusak/invalid
rm -rf public/storage

# Buat jembatan (link) agar folder storage bisa diakses publik lewat browser
php artisan storage:link

# Berikan izin tulis/baca ke folder storage agar upload tidak gagal
# Dan agar gambar yang sudah diupload bisa ditampilkan
chown -R www-data:www-data storage bootstrap/cache public/storage
chmod -R 775 storage bootstrap/cache

# Khusus folder publik tempat gambar berada
chmod -R 775 storage/app/public
chown -R www-data:www-data storage/app/public

# --- BAGIAN 4: PRODUCTION OPTIMIZATION ---
echo "🚀 Setting Production Environment..."
# Memastikan URL aset menggunakan HTTPS agar tidak 'Not Secure'
export APP_ENV=production
export APP_URL=https://berbaginow.azurewebsites.net
export ASSET_URL=https://berbaginow.azurewebsites.net

# Membangun cache baru untuk kecepatan maksimal di Azure
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Ready! Starting Apache..."
# Jalankan web server Apache
exec apache2-foreground
