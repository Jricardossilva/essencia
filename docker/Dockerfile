FROM php:8.3-apache

# Extensões PHP necessárias para Laravel + MySQL
RUN apt-get update && apt-get install -y --no-install-recommends \
        git unzip libzip-dev libpng-dev libonig-dev libicu-dev \
    && docker-php-ext-install pdo_mysql mbstring gd intl bcmath zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Apache: habilita rewrite e aponta o DocumentRoot para /public
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri 's!<Directory /var/www/>!<Directory ${APACHE_DOCUMENT_ROOT}/>!' /etc/apache2/apache2.conf \
    && printf '<Directory %s>\n  AllowOverride All\n  Require all granted\n</Directory>\n' "$APACHE_DOCUMENT_ROOT" > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . /var/www/html

# Instala dependências (na sua máquina há acesso à internet/packagist)
RUN composer install --no-interaction --no-scripts --optimize-autoloader || true

COPY docker/entrypoint.sh /usr/local/bin/entrypoint
RUN chmod +x /usr/local/bin/entrypoint
ENTRYPOINT ["entrypoint"]
