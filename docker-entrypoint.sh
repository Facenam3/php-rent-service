#!/bin/bash
set -e

# Run migrations and fixtures
composer schema:load
composer schema:fixtures

# Start Apache in foreground
apache2-foreground