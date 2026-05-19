FROM php:8.3-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    nodejs \
    npm \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev

# Extensiones PHP necesarias para Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copiar proyecto
COPY . .

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Instalar dependencias Node
RUN npm install

# Compilar Vite
RUN npm run build

# Cache Laravel
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Puerto Render
EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000