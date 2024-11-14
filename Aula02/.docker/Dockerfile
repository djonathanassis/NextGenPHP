FROM php:8.3-fpm-alpine

RUN apk update \ 
    && apk add --no-cache postgresql-dev build-base autoconf linux-headers \
    && docker-php-ext-install pdo_pgsql opcache \
    && pecl install xdebug \
    && docker-php-ext-enable pdo_pgsql opcache xdebug \
    && apk del build-base autoconf linux-headers \
    && apk cache clean  