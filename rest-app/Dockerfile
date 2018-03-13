FROM php:7.1-apache

RUN apt-get update && apt-get install -y libmcrypt-dev mysql-client libmagickwand-dev git --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql zip

RUN a2enmod rewrite

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data

ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

WORKDIR /var/www/html

COPY . ./

RUN curl https://getcomposer.org/download/1.6.3/composer.phar -o ./composer.phar && php composer.phar install --no-dev && rm -v composer.phar
RUN rm apache-config.conf && chown www-data: -R .
RUN mv env.renameme .env && php artisan key:generate && php artisan optimize

EXPOSE 80

HEALTHCHECK --interval=10s --timeout=3s \
  CMD curl -f http://localhost/ || exit 1

