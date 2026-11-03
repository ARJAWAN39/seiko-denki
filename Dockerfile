FROM php:8.3-cli-alpine

# Install system dependencies & libraries
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite-dev \
    oniguruma-dev \
    linux-headers

# Install PHP extensions required by Laravel
RUN docker-php-ext-install pdo pdo_sqlite pcntl bcmath mbstring opcache

# Copy latest Composer binary
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install PHP production dependencies with optimized autoloader
RUN composer install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs

# Prepare writable storage & database
RUN mkdir -p storage/framework/sessions \
             storage/framework/views \
             storage/framework/cache \
             storage/logs \
             bootstrap/cache \
             database && \
    touch database/database.sqlite && \
    chmod -R 777 storage bootstrap/cache database

# Environment configuration
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV PORT=10000

EXPOSE 10000

# Start Laravel production server binding dynamically to Render's $PORT
CMD sh -c "php artisan key:generate --force && php artisan config:clear && php artisan view:clear && php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"
