# Utiliser PHP 8.3 avec Apache
FROM php:8.3-apache

# Installer les extensions PHP nécessaires
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    zip \
    unzip \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Activer le module mod_rewrite d'Apache
RUN a2enmod rewrite

# Installer Composer globalement
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier uniquement les fichiers nécessaires pour installer les dépendances
COPY composer.json composer.lock ./

# Installer les dépendances
RUN composer install --no-scripts --prefer-dist --optimize-autoloader --no-dev

# Copier tout le contenu de l'application Laravel
COPY . .

# Installer les clés Passport (ajouter un montage pour les fichiers persistants)
RUN mkdir -p /var/www/html/storage/oauth && \
    php artisan passport:keys && \
    php artisan passport:install --force


# Configurer les permissions des clés Passport
RUN chmod 600 /var/www/html/storage/oauth/*.key && \
    chown -R www-data:www-data /var/www/html/storage/oauth

# Définir les permissions correctes
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Configurer Apache pour pointer vers le dossier `/public`
RUN sed -i 's#/var/www/html#/var/www/html/public#' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Optimiser Laravel pour la production
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Exposer le port 80
EXPOSE 80

# Lancer Apache
CMD ["apache2-foreground"]
