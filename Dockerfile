FROM php:8.2-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
  libzip-dev \
  unzip \
  git \
  libsqlite3-dev \
  && docker-php-ext-install pdo pdo_sqlite pdo_mysql zip \
  && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

# Set Apache DocumentRoot to /var/www/html/public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
  && sed -i 's|<Directory /var/www/>|<Directory /var/www/html/public/>|g' /etc/apache2/apache2.conf

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY . .

# **Install Composer dependencies**
RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html

COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80

CMD ["docker-entrypoint.sh"]
