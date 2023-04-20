FROM php:8.1.5-fpm-alpine

RUN apk add --no-cache libzip-dev && docker-php-ext-install zip

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependencies for PHP
RUN docker-php-ext-install pdo_mysql

# Install dependencies for Node.js
RUN apk add --update nodejs npm

# Set working directory
WORKDIR /var/www/polbannews.site

# Copy source code aplikasi ke dalam container
COPY . /var/www/polbannews.site/

# Install dependency aplikasi menggunakan composer install --no-dev --prefer-dist --optimize-autoloader
RUN composer update

# Install dependency aplikasi menggunakan npm
RUN npm install && npm run build

# Set permission untuk folder storage
RUN chown -R www-data:www-data /var/www/polbannews.site
