#!/bin/bash
set -e

# Export env vars from .env if present
if [ -f .env ]; then
    export $(grep -v '^#' .env | xargs)
fi

# Ensure database folder exists
mkdir -p database

# Run migrations + fixtures only if SQLite file doesn't exist
if [ ! -f "./database/rent.sqlite" ]; then
    echo "Running migrations..."
    composer schema:load
    echo "Seeding database..."
    composer schema:fixtures
fi

# Ensure upload folders exist
mkdir -p public/uploads/vehicle
chown -R www-data:www-data public/uploads

# Start Apache in foreground
apache2-foreground
