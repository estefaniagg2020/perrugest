FROM php:7.3-fpm
LABEL maintainer="diego.martinez@gasmobi.com"

ENV PACKAGES \
        wget \
        zip \
        unzip \
        openssl \
        libicu-dev \
        zlib1g-dev \
        curl \
        libzip-dev \
        software-properties-common \
        g++

# Install extra packages
RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install -y $PACKAGES

# Install nodejs
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs

# Cleanup
RUN apt-get autoremove -y
RUN rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install php-cs-fixer
RUN curl -L https://cs.symfony.com/download/php-cs-fixer-v2.phar -o php-cs-fixer
RUN chmod a+x php-cs-fixer
RUN mv php-cs-fixer /usr/local/bin/php-cs-fixer

# Run docker-php-ext-install for available extensions
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql intl zip

# Install opcache
#RUN docker-php-ext-install opcache \
#    && docker-php-ext-enable opcache \
#    && echo "opcache.revalidate_freq=0" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini \
#    && echo "opcache.validate_timestamps=0" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini \
#    && echo "opcache.max_accelerated_files=7963" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini \
#    && echo "opcache.memory_consumption=192" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini \
#    && echo "opcache.interned_strings_buffer=16" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini \
#    && echo "opcache.fast_shutdown=1" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

# Install apcu
#RUN pecl install apcu \
#    && docker-php-ext-enable apcu \
#    && echo "apc.shm_segments=1" >> /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini \
#    && echo "apc.shm_size=1G" >> /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini \
#    && echo "apc.ttl=3600" >> /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini \
#    && echo "apc.user_ttl=7200" >> /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini \
#    && echo "apc.gc_ttl=3600" >> /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini \
#    && echo "apc.max_file_size=1M" >> /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini \
#    && echo "apc.stat=0" >> /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini

# Install xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_enable = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey = \"PHPSTORM\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port = 9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_host = host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_log = \"/tmp/xdebug.log\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.var_display_max_depth = 10" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.var_display_max_children = 256" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.var_display_max_data = 1024" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN touch /tmp/xdebug.log && chmod 777 /tmp/xdebug.log

# Patch for change remote PHP-FPM port to 9001
RUN sed -i -e 's/9000/9001/g' /usr/local/etc/php-fpm.d/zz-docker.conf

# xdebug
EXPOSE 9000
# php-fpm
EXPOSE 9001

# php.ini
ADD php.ini /usr/local/etc/php

RUN usermod -u 1000 www-data
RUN chown www-data:1000 -R /var/www

USER www-data

WORKDIR /var/www

CMD php-fpm -F