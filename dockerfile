# Etapa 1: build do Laravel (Composer + NPM + Artisan)
FROM php:8.2-cli AS build

# Instalar dependências de sistema + extensões PHP necessárias para Laravel
RUN apt-get update && apt-get install -y \
    unzip git curl libicu-dev libonig-dev libzip-dev zip nodejs npm \
    && docker-php-ext-install intl mbstring bcmath zip pdo pdo_mysql

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar código
COPY . .

# Instalar dependências PHP
RUN composer install --no-dev --optimize-autoloader

# Instalar dependências JS e compilar assets com Vite
RUN npm install && npm run build

# Cache do Laravel
RUN php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache

# Etapa 2: imagem final (runtime)
FROM php:8.2-cli

# Instalar extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    libicu-dev libonig-dev libzip-dev zip unzip \
    && docker-php-ext-install intl mbstring bcmath zip pdo pdo_mysql

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar aplicação já preparada da fase de build
COPY --from=build /var/www/html .

# Expor porta 8080 (usada no Railway)
EXPOSE 8080

# Comando de start do Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
