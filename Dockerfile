FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    supervisor \
    nginx \
    curl \
    git \
    jq

WORKDIR /var/www/html


# Copy project code
COPY . .

RUN composer install --prefer-dist --no-dev

# Install Node.js and npm (if not using a separate container for Vite)
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get update && apt-get install -y nodejs

WORKDIR /var/www/html/public

RUN npm install

# Build front-end assets (adjust command if using a custom Vite build script)
RUN npm run build

EXPOSE 80

COPY nginx.conf /etc/nginx/conf.d/default.conf

CMD ["supervisord", "-n"]