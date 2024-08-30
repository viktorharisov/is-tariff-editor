FROM yiisoftware/yii2-php:8.1-apache


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


COPY . /app
WORKDIR /app
RUN composer install


