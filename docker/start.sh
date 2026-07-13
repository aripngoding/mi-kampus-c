#!/bin/bash
set -e

# Railway injects $PORT, default to 8080 if not set
export PORT=${PORT:-8080}
export APACHE_PORT=${PORT}

# Update Apache to listen on $PORT
sed -i "s/^Listen 80$/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/^Listen 443$//" /etc/apache2/ports.conf 2>/dev/null || true

# Link storage
php artisan storage:link || true

# Run migrations
php artisan migrate --force

# Seed admin user (firstOrCreate, aman dijalankan berulang)
php artisan db:seed --class=AdminSeeder --force

# Start Apache in foreground
apache2-foreground
