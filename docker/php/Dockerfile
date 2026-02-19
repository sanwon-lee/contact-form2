FROM php:8.1-fpm

ARG UID=1000
ARG GID=1000
ARG USER_NAME=myuser
ARG GROUP_NAME=myuser

COPY php.ini /usr/local/etc/php/

RUN apt update \
  && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
  && docker-php-ext-install pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && composer self-update

RUN groupadd -g ${GID} ${GROUP_NAME} \
  && useradd -u ${UID} -g ${GROUP_NAME} -s /bin/bash -m ${USER_NAME} \
  && mkdir -p /var/www \
  && chown -R ${USER_NAME}:${GROUP_NAME} /var/www

USER ${USER_NAME}

WORKDIR /var/www