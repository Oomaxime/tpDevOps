FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

RUN a2enmod rewrite

# Copy the entire application
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Move .htaccess to the correct location
RUN mv /var/www/html/frontend/.htaccess /var/www/html/.htaccess

EXPOSE 80