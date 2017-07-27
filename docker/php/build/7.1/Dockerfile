FROM php:7.1-fpm
# Install modules
RUN apt-get update && apt-get install -y \
        libicu-dev \
        g++ \
        curl \
        wget \
        python \
        zlibc \
        zlib1g \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libz-dev \
        libmemcached-dev \
        libmemcached11 \
        libmemcachedutil2 \
        build-essential \
        libmcrypt-dev \
        libpng12-dev \
        libpq-dev \
        libmagickwand-dev --no-install-recommends \
        sendmail \
        zlib1g-dev --no-install-recommends && \
        rm -r /var/lib/apt/lists/*

WORKDIR /tmp

RUN wget https://github.com/edenhill/librdkafka/archive/v0.9.5.tar.gz && \
    tar -xvf v0.9.5.tar.gz && \
    cd librdkafka-0.9.5 && \
    ./configure && make && make install && ldconfig && cd /tmp && \
    rm -rf librdkafka-0.9.5 v0.9.5.tar.gz

RUN docker-php-ext-configure mbstring && \
    docker-php-ext-configure opcache && \
    docker-php-ext-configure mcrypt && \
    docker-php-ext-configure tokenizer && \
    docker-php-ext-configure mysqli && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ \
    --with-png-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql

RUN docker-php-ext-install zip pdo_mysql pdo_pgsql\
    bcmath \
    intl

RUN pecl install -o redis \
    apcu \
    mongodb \
    imagick \
    memcached \
    msgpack \
    rdkafka && \
    rm -rf /tmp/pear && \
    echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini && \
    echo "extension=rdkafka.so" > /usr/local/etc/php/conf.d/rdkafka.ini && \
    echo "extension=apcu.so" > /usr/local/etc/php/conf.d/apcu.ini && \
    echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/mongodb.ini && \
    echo "extension=imagick.so" > /usr/local/etc/php/conf.d/imagick.ini && \
    echo "extension=msgpack.so" > /usr/local/etc/php/conf.d/msgpack.ini && \
    echo "extension=memcached.so" > /usr/local/etc/php/conf.d/memcached.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && composer global require --prefer-dist "fxp/composer-asset-plugin:~1.0"

RUN mkdir /var/log/php-fpm && ln -sf /dev/stdout /var/log/php-fpm/access.log && ln -sf /dev/stderr /var/log/php-fpm/error.log
CMD ["php-fpm"]

