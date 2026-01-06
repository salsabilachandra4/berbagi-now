#!/bin/bash
set -e

cd /var/www/html

# Bersihkan cache total untuk membuang link HTTP lama
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Paksa environment ke HTTPS
export APP_URL="https://berbaginow.azurewebsites.net"
export ASSET_URL="https://berbaginow.azurewebsites.net"

# Jalankan migrasi dan seeder
echo "⌛ Running Migration & Seeding..."
php artisan migrate --force
php artisan db:seed --force || echo "⚠️ Seeder failed/already exists"

# Rebuild Cache dengan HTTPS yang baru
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Starting Apache..."
exec apache2-foreground
