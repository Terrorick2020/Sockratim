FROM php:8.3-apache

RUN a2enmod rewrite
RUN apt-get update && \
    apt-get install -y libmariadb-dev-compat && \
    docker-php-ext-install pdo_mysql

COPY . /var/www/html
COPY ./init.sql /docker-entrypoint-initdb.d/

CMD ["apache2-foreground"]