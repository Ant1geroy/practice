FROM php:7.4-apache

# Обновляем списки пакетов и устанавливаем необходимые зависимости
RUN apt-get update \
    && apt-get install -y \
        libpq-dev \
        libzip-dev \
        zip \
        libxml2-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/include/postgresql/ \
    && docker-php-ext-install mysqli pdo_mysql pgsql pdo_pgsql zip xml

# Копируем файлы проекта в контейнер
COPY ./www/ /var/www/html/

# Устанавливаем дополнительные настройки Apache, если нужно
# RUN a2enmod rewrite

# Указываем рабочую директорию
WORKDIR /var/www/html