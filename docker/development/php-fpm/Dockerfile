FROM php:7.4-fpm-alpine

RUN apk update && apk add git openssh-client unzip

RUN apk add postgresql-dev libzip-dev freetype-dev libjpeg-turbo-dev libpng-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install -j4 pgsql pdo_pgsql bcmath zip gd

RUN rm -rf /tmp/* /var/cache/apk/*

# RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini
COPY ./development/php/conf.d /usr/local/etc/php/conf.d
COPY ./development/php-fpm/conf.d /usr/local/etc/php/conf.d

WORKDIR /app
