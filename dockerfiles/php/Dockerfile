FROM php:8.3-fpm-alpine3.19

# Install system dependencies
RUN apk add --no-cache \
    bash \
    curl \
    libpng-dev \
    libzip-dev \
    zlib-dev \
    mysql-client

# Install PHP extensions
RUN docker-php-ext-install gd \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install node and npm
RUN apk add --no-cache nodejs npm

# Set working directory
WORKDIR /var/www

EXPOSE 9000
