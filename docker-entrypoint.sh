#!/bin/bash
set -e

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
chmod -R 775 public/uploads

# Start Apache in foreground
apache2-foreground
