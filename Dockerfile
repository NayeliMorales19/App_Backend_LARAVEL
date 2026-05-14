FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN chmod -R 777 storage bootstrap/cache

# 🔥 LIMPIEZA CRÍTICA
RUN php artisan config:clear
RUN php artisan cache:clear

EXPOSE 10000

# 🔥 NO usar serve en producción real
CMD php artisan config:cache && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000

RUN php -r "echo getenv('DB_CONNECTION');"
