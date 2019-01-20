FROM php:7.2.1-apache

MAINTAINER Lewis Brown "github.com/ramity"

# Copy config from host
COPY ./config/php.ini /usr/local/etc/php/php.ini
COPY ./config/symfony.conf /etc/apache2/sites-available/000-default.conf

# Update base packages
RUN apt-get update

# Download ssh-server
RUN apt-get install -y openssh-server

# Download composer and required deps
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get install -y git
RUN apt-get install -y zip
RUN apt-get install -y unzip
RUN apt-get install -y zlib1g-dev

# Install php extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli opcache sockets zip
RUN docker-php-ext-enable opcache
RUN apt-get install -y zlib1g-dev
RUN apt-get install -y libicu-dev
RUN apt-get install -y g++
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Git server steps
RUN adduser --disabled-password --gecos "" git
USER git
RUN mkdir ~/.ssh
RUN chmod 700 ~/.ssh
RUN touch ~/.ssh/authorized_keys
RUN chmod 600 ~/.ssh/authorized_keys
RUN ssh-keygen -A
USER root
RUN usermod -s $(which git-shell) git

WORKDIR /var/www/symfony

# sshd_config file is edited for enable access key and disable access password
COPY ./config/sshd_config /etc/ssh/sshd_config

EXPOSE 22 80
CMD a2enmod rewrite; service ssh start; apache2-foreground
