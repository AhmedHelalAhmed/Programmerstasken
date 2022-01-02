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


# Installation of NVM, NPM and packages
RUN rm /bin/sh && ln -s /bin/bash /bin/sh


WORKDIR /var/www/html

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

EXPOSE 80
