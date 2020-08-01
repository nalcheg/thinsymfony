FROM php:7.4-cli-alpine

RUN apk update && apk add git openssh-client unzip

RUN apk add postgresql-dev libzip-dev freetype-dev libjpeg-turbo-dev libpng-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install -j4 pgsql pdo_pgsql bcmath zip gd

RUN rm -rf /tmp/* /var/cache/apk/*

# RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini
COPY ./development/php/conf.d /usr/local/etc/php/conf.d

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet


ARG USER_ID
ARG GROUP_ID

RUN sed -i "s/82/$USER_ID/g" /etc/passwd
RUN sed -i "s/82/$GROUP_ID/g" /etc/group
RUN chown $USER_ID:$GROUP_ID -R /home/www-data/

USER $USER_ID:$GROUP_ID

RUN composer global require hirak/prestissimo --no-plugins --no-scripts \
    && rm -rf ~/.composer/cache

WORKDIR /app
