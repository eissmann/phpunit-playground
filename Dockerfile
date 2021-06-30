FROM php:8.0-fpm
WORKDIR "/application"

RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"

RUN cp ./composer.phar /usr/local/bin/composer

RUN apt-get update && \
    apt-get install -y libicu-dev && \
    docker-php-ext-install intl

RUN apt-get -y install zip unzip libzip-dev && \
    pecl install zip

RUN chown www-data:www-data /var/www -R

RUN usermod -u 1000 www-data

USER www-data

EXPOSE 9000