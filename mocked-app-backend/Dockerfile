FROM php:7.3.27-fpm-alpine3.13

WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- \
--install-dir=/usr/bin --filename=composer

COPY composer* .

RUN composer install

COPY . .

RUN php artisan package:discover

RUN php artisan key:generate

EXPOSE 9000

CMD [ "php-fpm" ]

