FROM php:7.1-apache
RUN /bin/sh -c "pecl install redis"
COPY php.ini /usr/local/etc/php
COPY ./todos-app/ /var/www/html/