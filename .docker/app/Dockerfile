FROM php:8.1.0-fpm-alpine

RUN apk add --no-cache \
    wget \
    bash \
    php8-tokenizer \
    php8-dom \
    php8-xml \
    php8-gd \
    php8-xmlreader \
    php8-xmlwriter \
    php8-simplexml \
    php8-sockets \
    php8-fileinfo \
    postgresql-dev \
    composer

RUN apk add --no-cache mysql-client msmtp perl wget procps shadow libzip libpng libjpeg-turbo libwebp freetype icu

RUN apk add --no-cache --virtual build-essentials \
    icu-dev icu-libs zlib-dev g++ make automake autoconf libzip-dev \
    libpng-dev libwebp-dev libjpeg-turbo-dev freetype-dev && \
    docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install gd && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install intl && \
    docker-php-ext-install opcache && \
    docker-php-ext-install exif && \
    docker-php-ext-install zip && \
    docker-php-ext-install pgsql && \
    docker-php-ext-install pdo_pgsql && \
    docker-php-ext-install sockets && \
    apk del build-essentials && rm -rf /usr/src/php*
#######################################
#        PREPARE PHP.INI CONFIG       #
#######################################

COPY ./.docker/app/php.ini /usr/local/etc/php/

#######################################
RUN mkdir /app/
COPY ./controle-financeiro-app /app/
WORKDIR /var/www/html/

#RUN composer update

EXPOSE 9000
ENTRYPOINT ["php-fpm"]
