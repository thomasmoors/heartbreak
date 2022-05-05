FROM php:fpm-alpine
WORKDIR /app
COPY . /app
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer i
CMD ["php", "src/start.php"]