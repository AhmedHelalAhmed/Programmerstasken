FROM php:8.0.0-apache

RUN apt-get update -yqq && \
  apt-get install -y apt-utils zip unzip && \
  apt-get install -y nano && \
  apt-get install -y git && \
  apt-get install -y libzip-dev && \
  a2enmod rewrite && \
  docker-php-ext-configure zip && \
  docker-php-ext-install zip && \
  rm -rf /var/lib/apt/lists/*



RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer



WORKDIR /var/www/html

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

EXPOSE 80
