# ベース
FROM php:8.4-fpm-bullseye AS base

# 開発ステージ
FROM base AS dev

COPY ./infra/api/php.ini /usr/local/etc/php/php.ini
COPY ./infra/api/www.conf /usr/local/etc/php-fpm.d/zzz-www.conf

COPY ./api /var/www/html

RUN apt-get update \
    && apt-get install -y \
    build-essential \
    git \
    zip \
    unzip \
    vim \
    curl \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev && \
    pecl install redis && \
    docker-php-ext-enable redis
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pdo_mysql mysqli exif
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

RUN groupadd -g 1000 laravel \
    && useradd laravel -m -u 1000 -g laravel

COPY ./api/composer.json /var/www/html/composer.json
RUN composer install

# RUN chown -R laravel:laravel /var/www/html && \
#     chmod -R 755 /var/www/html/storage && \
#     chmod -R 755 /var/www/html/bootstrap
	
USER laravel
WORKDIR /var/www/html

VOLUME ["/var/run/php-fpm"]
CMD ["php-fpm", "-R"]
