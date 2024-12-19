FROM php:8.2-apache

# Installation des dépendances nécessaires et de l'extension PDO PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Activation du module rewrite d'Apache
RUN a2enmod rewrite

# Copie des fichiers de l'application
COPY ./frontend/ /var/www/html/
COPY ./backend/ /var/www/html/backend/

# Configuration des permissions
RUN chown -R www-data:www-data /var/www/html 