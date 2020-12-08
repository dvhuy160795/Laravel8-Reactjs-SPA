#FROM composer:1.5.1 AS composer
FROM php:7.3-fpm

RUN apt-get update && apt-get install -y vim \
    # Install php ext, dependencies
    && apt-get install -y mariadb-client libzip-dev zip \
    && docker-php-ext-install opcache mysqli pdo_mysql zip pcntl\
    # Install redis.
    && pecl install redis \
    && docker-php-ext-enable redis \
    # Install gd.
    && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr --with-jpeg-dir=/usr --with-png-dir=/usr \
    && docker-php-ext-install -j$(nproc) gd

# debian日本語・日本時間設定
RUN apt-get install -y locales \
    && sed -i -e 's/# ja_JP.UTF-8 UTF-8/ja_JP.UTF-8 UTF-8/' /etc/locale.gen \
    && locale-gen
ENV LANG ja_JP.UTF-8
ENV LC_ALL ja_JP.UTF-8
ENV LANGUAGE ja_JP:ja
ENV TZ Asia/Tokyo

# Install Xdebug.
RUN pecl install -o -f xdebug

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

## Phpunit
RUN curl -sSL https://phar.phpunit.de/phpunit-9.phar -o /usr/local/bin/phpunit \
    && chmod +x /usr/local/bin/phpunit \
    && ln -s /usr/local/bin/phpunit /usr/bin/phpunit

WORKDIR /var/www/html
