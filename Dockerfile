# Stage 1: Composer Dependencies
FROM composer:2 AS composer
WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-progress --no-interaction --prefer-dist

# Stage 2: Node Dependencies (Vite)
FROM node:18-alpine AS node_modules
WORKDIR /app

COPY package.json package-lock.json ./
RUN npm install

# Stage 3: Application Setup
FROM php:8.2-fpm-alpine

# Install required PHP extensions and system packages
RUN apk add --no-cache \
    bash \
    git \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    unzip \
    nginx \
    supervisor

RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Install Composer and Node.js
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY --from=node_modules /app/node_modules ./node_modules

# Copy the application code
WORKDIR /var/www/html
COPY . .

# Copy the built assets from Vite
RUN npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Start PHP-FPM and Nginx
COPY ./docker/supervisord.conf /etc/supervisord.conf

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
