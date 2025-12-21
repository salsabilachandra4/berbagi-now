# Tahap 1: Menggunakan image PHP resmi dengan FPM
FROM php:8.2-fpm

# Menetapkan folder kerja di dalam kontainer
WORKDIR /var/www

# Instal dependensi sistem yang diperlukan oleh Laravel
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    libonig-dev

# Bersihkan cache sistem untuk mengurangi ukuran image
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instal ekstensi PHP yang dibutuhkan (MySQL, GD, mbstring, zip)
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Instal Composer secara otomatis dari image resmi Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Salin seluruh kodingan aplikasi ke dalam kontainer
COPY . /var/www

# Jalankan perintah composer install untuk menginstal vendor
# (Opsional: tambahkan --no-dev untuk produksi)
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Berikan izin akses (permissions) agar Laravel bisa menulis log dan cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Port yang digunakan oleh PHP-FPM (default 9000)
# Namun jika untuk Azure Web App, kita biasanya menggunakan port 80/8080
EXPOSE 8080

# Jalankan server bawaan PHP untuk testing (atau ganti dengan perintah Nginx di produksi)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
