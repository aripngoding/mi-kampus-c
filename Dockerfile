FROM php:8.4-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        intl \
        opcache \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Fix Apache MPM conflict - remove ALL mpm symlinks then enable only prefork
RUN cd /etc/apache2/mods-enabled \
    && rm -f mpm_event.conf mpm_event.load mpm_worker.conf mpm_worker.load mpm_prefork.conf mpm_prefork.load \
    && ln -s /etc/apache2/mods-available/mpm_prefork.conf mpm_prefork.conf \
    && ln -s /etc/apache2/mods-available/mpm_prefork.load mpm_prefork.load \
    && a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files first (for layer caching)
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-scripts --no-interaction --no-dev

# Copy the rest of the application
COPY . .

# Install Node dependencies and build assets
RUN npm ci && npm run build && rm -rf node_modules

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Apache config - listen on port 8080 directly (Railway default PORT)
RUN sed -i 's/^Listen 80$/Listen 8080/' /etc/apache2/ports.conf

# Apache vhost
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Cache Laravel config
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Copy start script
COPY docker/start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 8080

CMD ["/start.sh"]
