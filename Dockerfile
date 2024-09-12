# Use an official PHP runtime as a parent image
FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    libonig-dev \
    libxml2-dev \
    pkg-config \
    libssl-dev \
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip bcmath opcache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set memory limit to prevent Composer memory errors
ENV COMPOSER_MEMORY_LIMIT=-1

# Clear Composer cache (optional)
RUN composer clear-cache

# Copy the Laravel application files
COPY . .

# Install PHP dependencies without optimizing the autoloader
RUN composer install --no-dev --no-interaction --prefer-dist --no-scripts --verbose

# Install Node.js dependencies and build assets
RUN npm install && npm run build

# Set correct file permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 9000 and start PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
