FROM php:8.2-cli

WORKDIR /var/www/html

COPY ./app /var/www/html

RUN apt-get update && apt-get install -y unzip \
    && docker-php-ext-install pdo pdo_mysql

CMD ["php", "-S", "0.0.0.0:8000", "-t", "/var/www/html"]
