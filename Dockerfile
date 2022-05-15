FROM php:8.1.0-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -

RUN apt-get -y install nodejs

WORKDIR /var/www

COPY . .

RUN composer install

RUN npm install

RUN npm run prod

COPY ./.env.example ./.env

RUN php artisan key:generate

CMD php artisan serve --host=0.0.0.0 --port=8181

EXPOSE 8181