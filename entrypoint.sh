#!/bin/bash
set -e

cd /var/www/html

# --- BAGIAN 1: CLEANUP ---
echo "🧹 Clearing all caches..."
php artisan optimize:clear || true

# --- BAGIAN 2: DATABASE ---
echo "⌛ Running Migration & Seeding..."
# Kita jalankan migrasi
php artisan migrate --force
# Jalankan seeder (Pastikan DatabaseSeeder sudah pakai Hash::make)
php artisan db:seed --force

# --- BAGIAN 3: FIX SESSION & PERMISSIONS ---
echo "🔒 Fixing permissions..."
# Pastikan folder session dan cache bisa ditulis oleh web server (www-data)
mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# --- BAGIAN 4: FORCE HTTPS ---
echo "🚀 Setting Environment..."
export APP_ENV=production
export APP_URL=https://berbaginow.azurewebsites.net
export ASSET_URL=https://berbaginow.azurewebsites.net

# Rebuild Cache
php artisan config:cache
php artisan route:cache

echo "✅ Ready! Starting Apache..."
exec apache2-foreground
