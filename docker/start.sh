#!/bin/bash

# Railway injects $PORT, default to 8080 if not set
export PORT=${PORT:-8080}

echo "Starting container on port $PORT"

# Update Apache to listen on $PORT
sed -i "s/^Listen 80$/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# Link storage (ignore errors)
php artisan storage:link 2>/dev/null || echo "storage:link skipped"

# Run migrations (with retry in case DB is slow to start)
echo "Running migrations..."
for i in 1 2 3 4 5; do
    php artisan migrate --force && break
    echo "Migration attempt $i failed, retrying in 5s..."
    sleep 5
done

# Seed admin user
echo "Seeding admin..."
php artisan db:seed --class=AdminSeeder --force 2>/dev/null || echo "Seeder skipped (may already exist)"

echo "Starting Apache on port $PORT..."
exec apache2-foreground
