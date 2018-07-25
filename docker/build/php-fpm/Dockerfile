FROM php:7.2-fpm

LABEL maintainer="Nathan Daly <justlikephp@gmail.com>"

# Install developer dependencies
# TODO: Look at what libraries the php:7.2-fpm image installs and ommit these.
RUN apt-get update -yqq && apt-get install -y zlib1g-dev libpq-dev libxml2-dev bison \
    libsqlite3-dev libxml2-dev libicu-dev libfreetype6-dev libmcrypt-dev libreadline-dev \
    libjpeg62-turbo-dev libpng-dev libcurl4-gnutls-dev libbz2-dev libssl-dev nodejs -yqq

# Install PECL extensions
# TODO: Is the stats extension needed for API v3?
RUN pecl install stats-1.0.5 mcrypt-1.0.1 xdebug redis apcu

# Install php extensions
# TODO: Look at what packages the php:7.2-fpm image installs and ommit these.
# openssl cause an error with phpize (maybe add --with-openssl)
# https://github.com/docker-library/php/pull/89/commits/453a9da962ec2d82df4d53ec1c85d96099c1ed5f
RUN docker-php-ext-install pdo_mysql opcache json calendar \
    bcmath mbstring xml zip bz2 curl intl soap gd


# Enable PHP extensions
RUN docker-php-ext-enable mcrypt xdebug redis apcu

# Disable deprecated warnings for the ServiceLocatorAwareInterface.
# See: https://github.com/zendframework/zend-mvc/issues/103
# RUN sed -i "s/;error_reporting =.*/error_reporting = E_ALL & ~E_USER_DEPRECATED/" /usr/local/etc/php/php.ini
COPY php.ini /usr/local/etc/php/

# Configure XDebug
# COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
