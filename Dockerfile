# Usar la imagen base de PHP 8.2
FROM php:8.2-fpm-alpine
 
# Actualizar los paquetes y añadir las dependencias necesarias
RUN apk --no-cache upgrade && \
    apk --no-cache add bash git sudo openssh libxml2-dev oniguruma-dev autoconf gcc g++ make npm \
    freetype-dev libjpeg-turbo-dev libpng-dev libssh2-dev
 
# PHP: Actualizar el canal de PECL e instalar las extensiones PHP
RUN pecl channel-update pecl.php.net && \
    pecl install pcov ssh2 swoole && \
    docker-php-ext-enable pcov ssh2 swoole
 
# Configurar e instalar extensiones PHP adicionales
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install mbstring xml pcntl gd zip sockets pdo pdo_mysql bcmath soap && \
    docker-php-ext-enable mbstring xml gd zip pcntl sockets bcmath pdo pdo_mysql soap
 
# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
 
# Establecer el directorio de trabajo
WORKDIR /app
 
# Copiar los archivos del proyecto
COPY . .
 
# Instalar dependencias del proyecto
RUN composer install && \
    composer require laravel/octane spiral/roadrunner
 
# Instalar Yarn y construir los assets del frontend
RUN npm install --global yarn && \
    yarn install && \
    yarn prod
 
# Generar la clave de la aplicación y configurar Octane
RUN php artisan key:generate && \
    php artisan octane:install --server="swoole"
 
# Exponer el puerto 8000 y establecer el comando de inicio
EXPOSE 8000
CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0"]
