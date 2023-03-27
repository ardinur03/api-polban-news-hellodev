# Menggunakan image PHP 8.0 sebagai base image
FROM php:8.0

# Set working directory di dalam container
WORKDIR /var/www/html

# Menginstall extension yang dibutuhkan oleh Laravel
RUN docker-php-ext-install pdo pdo_mysql bcmath

# Menginstall Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Menginstall Node.js dan NPM
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - \
    && apt-get install -y nodejs

# Menyalin file composer.lock dan composer.json ke dalam container
COPY composer.lock composer.json /var/www/html/

# Install dependencies dari proyek Laravel
RUN composer install

# Menyalin seluruh file dari direktori proyek ke dalam container
COPY . /var/www/html/

# Menyalin file .env.example dan membuat file .env
RUN cp .env.example .env && php artisan key:generate

# Memberikan izin pada direktori storage dan bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

# Install dependencies dan membangun assets menggunakan NPM
RUN npm install && npm run build

# Expose port 80 ke host
EXPOSE 80

# Menjalankan perintah "php artisan serve" pada saat container dijalankan
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
