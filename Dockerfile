FROM php:8.2-cli

WORKDIR /var/www/html

COPY ./app /var/www/html

RUN apt-get update && apt-get install -y unzip \
    && docker-php-ext-install pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php && \
mv composer.phar /usr/local/bin/composer

CMD ["php", "-S", "0.0.0.0:8000", "-t", "/var/www/html"]
