# Stage 1: Build PHP dependencies
FROM composer:2 AS vendor
WORKDIR /var/www/html
COPY . .
RUN composer install --optimize-autoloader --no-interaction

# Stage 2: Build frontend
FROM node:22 AS frontend
WORKDIR /var/www/html
COPY package*.json ./
RUN npm ci
# Copy the rest of the app (including vendor from previous stage)
COPY --from=vendor /var/www/html ./
RUN npm run build

# Stage 3: Final image
FROM php:8.4-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

WORKDIR /var/www/html

COPY --from=vendor /var/www/html/vendor ./vendor
COPY --from=frontend /var/www/html/public ./public
COPY . .
COPY ./.env.example ./.env

# Cache config for performance
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache
RUN php artisan key:generate
RUN php artisan migrate

EXPOSE 9000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=9000"]
