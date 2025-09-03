# Use official PHP image with Apache
FROM php:8.2-apache

# Set working directory inside container
WORKDIR /var/www/html

# Install required packages and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite pdo_mysql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy composer from official Composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy all project files to working directory
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions for storage / logs if needed
RUN chown -R www-data:www-data /var/www/html

# Run migrations and seeders
RUN composer schema:load && composer schema:fixtures

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
