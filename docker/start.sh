#!/bin/bash
set -e

export PORT=${PORT:-8080}

echo "Starting container on port $PORT..."

# Link storage
php artisan storage:link 2>/dev/null || true

# Run migrations with retry
echo "Running migrations..."
for i in 1 2 3 4 5; do
    php artisan migrate --force && break
    echo "Attempt $i failed, retrying in 5s..."
    sleep 5
done

# Seed admin
echo "Seeding admin..."
php artisan db:seed --class=AdminSeeder --force 2>/dev/null || true

echo "Starting PHP server on port $PORT..."
exec php -S 0.0.0.0:$PORT -t public
