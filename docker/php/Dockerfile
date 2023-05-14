FROM php:8.1-fpm-alpine

RUN apk add --no-cache \
    git \
    curl \
    libzip-dev \
    zip \
    unzip \
    shadow \
    autoconf \
    g++ \
    make \
    linux-headers

# Setup extension
RUN docker-php-ext-install pdo_mysql  \
    zip  \
    bcmath

# Install intl
RUN apk add --no-cache icu-dev \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-enable intl

# Install mbstring
RUN apk add --no-cache oniguruma-dev \
    && docker-php-ext-install -j$(nproc) mbstring \
    && docker-php-ext-enable mbstring

# Setup gd
RUN apk add --no-cache \
    freetype \
    libjpeg-turbo \
    libpng \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd \
        --with-freetype=/usr/include/ \
        --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-enable gd

# Install xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install composer
RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

# Set new UID for user www-data
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

WORKDIR /var/www/html
COPY . .

RUN rm -rf ./storage/logs/laravel*
RUN chmod -R 777 storage

RUN composer install

EXPOSE 9000
CMD ["php-fpm"]
