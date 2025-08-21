# Usa imagem base oficial do PHP com Apache
FROM php:8.2-apache

# Instala dependências necessárias
RUN apt-get update && apt-get install -y \
    git\
    unzip\
    libpq-dev\
    libzip-dev\
    zip\
    nodejs\
    npm\
    && docker-php-ext-install pdo pdo_mysql zip

# Habilita mod_rewrite do Apache
RUN a2enmod rewrite

# Copia arquivos do projeto
COPY . /var/www/html

# Define diretório de trabalho
WORKDIR /var/www/html

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instala dependências e compila assets
RUN composer install --no-dev --optimize-autoloader && npm install && npm run build && php artisan config:cache && php artisan route:cache && php artisan view:cache
    

# Permissões para Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expõe porta
EXPOSE 8080

# Comando para iniciar Laravel
CMD php artisan serve --host=0.0.0.0 --port=8080
