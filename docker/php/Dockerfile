FROM php:8.0-fpm

RUN apt-get update \
    && apt-get install -y zlib1g-dev mariadb-client vim libzip-dev \
    && apt-get install -y  \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip pdo_mysql \
    && pecl install xdebug

RUN useradd -ms /bin/bash -g www-data next-laravel-user \
    && echo "next-laravel-user:password" | chpasswd
    
RUN chown -R next-laravel-user:www-data /var/www/ \
  && chown -R next-laravel-user:www-data /var/run/ \
  && chown -R next-laravel-user:www-data /var/log/

USER next-laravel-user

# マルチステージビルドでcomposer
COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
