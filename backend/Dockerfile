FROM php:7.2.1-apache

MAINTAINER Lewis Brown "github.com/ramity"

COPY ./config/php.ini /usr/local/etc/php/
COPY ./config/symfony.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 80