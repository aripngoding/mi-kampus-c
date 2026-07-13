#!/bin/bash
set -e

# Link storage
php artisan storage:link || true

# Run migrations
php artisan migrate --force

# Seed admin user (firstOrCreate, aman dijalankan berulang)
php artisan db:seed --class=AdminSeeder --force

# Start Apache
apache2-foreground
