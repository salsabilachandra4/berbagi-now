#!/bin/bash
set -e

cd /var/www/html

# --- BAGIAN 1: CLEANUP & PREPARATION ---
echo "🧹 Clearing all caches..."
php artisan optimize:clear || true

# Pastikan folder-folder penting ada
mkdir -p storage/app/public storage/framework/sessions storage/framework/views storage/framework/cache storage/logs bootstrap/cache

# --- BAGIAN 2: DATABASE ---
echo "⌛ Running Migration & Seeding..."
php artisan migrate --force
php artisan db:seed --force || echo "⚠️ Seeder skipped/failed"

# --- BAGIAN 3: STORAGE LINK (PENTING UNTUK GAMBAR) ---
echo "🔗 Linking storage to public..."
# Hapus link lama jika ada agar tidak terjadi "file exists" error
rm -rf public/storage
# Buat symlink baru
php artisan storage:link

# --- BAGIAN 4: PERMISSIONS ---
echo "🔒 Fixing permissions..."
# Berikan izin ke seluruh folder storage dan bootstrap agar bisa menulis file/gambar
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
# Pastikan folder publik bisa dibaca oleh browser
chmod -R 775 storage/app/public

# --- BAGIAN 5: FORCE HTTPS & OPTIMIZE ---
echo "🚀 Setting Production Environment..."
export APP_ENV=production
export APP_URL=https://berbaginow.azurewebsites.net
export ASSET_URL=https://berbaginow.azurewebsites.net

# Rebuild Cache untuk performa
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Ready! Starting Apache..."
exec apache2-foreground
