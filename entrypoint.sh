#!/bin/bash
set -e

# Masuk ke direktori aplikasi
cd /var/www/html

# --- BAGIAN 1: CLEANUP ---
echo "🧹 Clearing all caches..."
# Membersihkan semua cache (config, route, view, app)
php artisan optimize:clear || true

# --- BAGIAN 2: DATABASE ---
echo "⌛ Running Migration..."
# --force wajib untuk environment produksi di Azure
php artisan migrate --force

echo "🌱 Running Seeder..."
# Menjalankan seeder. 
# Pastikan DatabaseSeeder.php sudah menggunakan Hash::make('password123')
php artisan db:seed --force || echo "⚠️ Seeder skipped (mungkin data sudah ada)"

# --- BAGIAN 3: OPTIMASI FINAL ---
echo "🚀 Rebuilding Cache for Production..."
# Set URL secara eksplisit agar Laravel tidak bingung antara HTTP/HTTPS
export APP_URL="https://berbaginow.azurewebsites.net"

php artisan config:cache
php artisan route:cache
php artisan view:cache

# --- BAGIAN 4: PERMISSIONS ---
echo "🔒 Fixing permissions for storage..."
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "✅ Ready! Starting Apache..."
# Menjalankan Apache di foreground agar container tetap hidup
exec apache2-foreground
