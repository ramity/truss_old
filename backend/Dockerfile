FROM php:7.2.1-apache

MAINTAINER Lewis Brown "github.com/ramity"

COPY ./config/php.ini /usr/local/etc/php/php.ini
COPY ./config/symfony.conf /etc/apache2/sites-available/000-default.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# https://goo.gl/jx1BQa
RUN apt-get update
RUN apt-get install -y openssl openssh-server git zip unzip

# install php extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli opcache sockets
RUN docker-php-ext-enable opcache

RUN ssh-keygen -A

RUN adduser --disabled-password --gecos "" git
RUN su git -c "cd ~ && mkdir .ssh && chmod 700 ./.ssh && touch ./.ssh/authorized_keys && chmod 600 ./.ssh/authorized_keys"
RUN chsh git -s $(which git-shell)

# sshd_config file is edited for enable access key and disable access password
COPY ./config/sshd_config /etc/ssh/sshd_config
COPY ./importKeys.sh /usr/bin/importKeys.sh

EXPOSE 22 80
