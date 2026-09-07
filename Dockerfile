FROM php:8.3-apache

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libsqlite3-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_sqlite zip \
    && a2enmod rewrite

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Configure Apache to use Laravel's public folder
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf \
    /etc/apache2/apache2.conf

# Create SQLite database
RUN touch database/database.sqlite

# Set Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache database

# Laravel production cache
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

EXPOSE 80

CMD ["apache2-foreground"]
