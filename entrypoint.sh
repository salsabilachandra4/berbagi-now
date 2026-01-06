#!/bin/bash
set -e

# --- BAGIAN 1: PERSIAPAN FOLDER & ENV ---
cd /var/www/html
mkdir -p storage/app/public storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache

export APP_URL="https://berbaginow.azurewebsites.net"
export ASSET_URL="https://berbaginow.azurewebsites.net"
export APP_ENV=production
export SCHEME=https

# --- BAGIAN 2: OPTIMASI CACHE ---
echo "🧹 Clearing and rebuilding cache..."
# Kita clear dulu agar tidak ada sisa config lama yang nyangkut
php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# --- BAGIAN 3: DATABASE MIGRATION & SEEDER ---
echo "⌛ Running Migration..."
# Menjalankan migrasi struktur tabel
php artisan migrate --force || echo "⚠️ Migration skipped/failed"

echo "🌱 Running Seeder..."
# AKTIFKAN KEMBALI SEEDER
# Gunakan --force agar jalan di produksi. 
# Jika seeder Anda menggunakan updateOrCreate(), ini aman dijalankan berkali-kali.
php artisan db:seed --force || echo "⚠️ Seeder failed (mungkin data sudah ada)"

# --- BAGIAN 4: PERMISSION & START ---
# Pastikan link storage ada agar gambar/asset muncul
php artisan storage:link || true

echo "🔒 Fixing permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "✅ Starting Apache..."
# SSH diperlukan jika Anda ingin masuk ke terminal Azure via Browser
service ssh start || true
exec apache2-foreground
