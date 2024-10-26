FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    apt-utils \
    libonig-dev \
    netcat-traditional

RUN docker-php-ext-install zip mbstring exif pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY . /var/www

USER $USER

EXPOSE 9000

CMD ["php-fpm"]
