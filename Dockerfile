FROM php:8.1-apache

RUN docker-php-ext-install pdo_mysql mysqli
RUN docker-php-ext-enable pdo_mysql mysqli

COPY ./docker/apache/apache2.conf /etc/apache2/apache2.conf
COPY ./docker/php /usr/local/etc/php/

COPY ./app /var/www/html/
