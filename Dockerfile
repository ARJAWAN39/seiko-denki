FROM php:8.2-cli-alpine

# Install system dependencies & PHP extensions
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite-dev

RUN docker-php-ext-install pdo pdo_sqlite pcntl bcmath

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Working directory
WORKDIR /var/www/html

# Copy codebase
COPY . .

# Install PHP production dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissions for storage & bootstrap cache
RUN mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache database && \
    touch database/database.sqlite && \
    chmod -R 777 storage bootstrap/cache database

# Environment variables
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV PORT=8080

EXPOSE 8080

# Start Laravel production server binding to dynamic $PORT
CMD sh -c "php artisan key:generate --force && php artisan config:clear && php artisan view:clear && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"
