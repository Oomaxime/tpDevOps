FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

RUN a2enmod rewrite


COPY ./frontend/ /var/www/html/frontend
COPY ./backend/ /var/www/html/backend

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html


EXPOSE 80