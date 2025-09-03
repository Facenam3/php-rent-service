#!/bin/bash
set -e

# Run migrations and seed data
composer schema:load
composer schema:fixtures

# Start Apache
apache2-foreground
