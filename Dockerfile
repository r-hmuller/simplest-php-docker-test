FROM php:7.3-apache

COPY . /app

COPY .conf/apache.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /app && a2enmod rewrite