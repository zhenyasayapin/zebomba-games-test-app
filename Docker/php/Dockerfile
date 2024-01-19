FROM php:7.4-fpm
WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt-get update && \
    apt-get install -y unzip libicu-dev && \
    docker-php-ext-install pdo pdo_mysql intl

# RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS
# RUN apk add --update linux-headers
RUN pecl install xdebug-3.1.6
RUN docker-php-ext-enable xdebug
# RUN apk del -f .build-deps
