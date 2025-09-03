#!/bin/bash
set -e

# Optional: export environment variables from .env (if needed)
if [ -f .env ]; then
    export $(grep -v '^#' .env | xargs)
fi

# Create database folder if it doesn't exist
mkdir -p database

# Run migrations and fixtures only if SQLite file doesn't exist
if [ ! -f "./database/rent.sqlite" ]; then
    echo "Running migrations..."
    composer schema:load
    echo "Seeding database..."
    composer schema:fixtures
fi

# Set permissions for uploads (optional)
mkdir -p public/uploads/vehicle
chown -R www-data:www-data public/uploads

# Start Apache in foreground
apache2-foreground
