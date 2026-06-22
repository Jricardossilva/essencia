#!/bin/sh
set -e
cd /var/www/html

echo ">> [1/5] preparando .env"
[ -f .env ] || cp .env.example .env

echo ">> [2/5] dependencias (composer)"
[ -f vendor/autoload.php ] || composer install --no-interaction --optimize-autoloader
php artisan package:discover --ansi || true

echo ">> [3/5] APP_KEY"
grep -q '^APP_KEY=base64' .env || php artisan key:generate --force

echo ">> [4/5] aguardando o banco de dados (db:3306)"
until php -r "new PDO('mysql:host=db;port=3306;dbname=essencia','essencia','secret');" 2>/dev/null; do
  sleep 2
done

echo ">> [5/5] migracoes + seed"
php artisan migrate --force --seed || true
php artisan storage:link || true
chown -R www-data:www-data storage bootstrap/cache || true

echo ">> tudo pronto — iniciando Apache em http://localhost:8080"
exec apache2-foreground
