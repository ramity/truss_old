FROM php:7.2.1-apache

MAINTAINER Lewis Brown "github.com/ramity"

COPY ./config/php.ini /usr/local/etc/php/
COPY ./config/symfony.conf /etc/apache2/sites-available/000-default.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# https://goo.gl/jx1BQa
RUN apt-get update
RUN apt-get install -y openssh-server git

RUN ssh-keygen -A

COPY ./commands /git/commands
COPY ./keys /git/keys

# sshd_config file is edited for enable access key and disable access password
COPY ./config/sshd_config /etc/ssh/sshd_config
COPY start.sh /usr/bin/start.sh

EXPOSE 22 80