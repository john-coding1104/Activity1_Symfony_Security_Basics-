FROM php:8.2-cli

RUN apt-get update \
  && apt-get install -y --no-install-recommends \
    git \
    unzip \
    libzip-dev \
    zlib1g-dev \
    default-mysql-client \
  && docker-php-ext-install pdo pdo_mysql zip \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/*

# copy composer from official composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# default command is just php; when running tasks we'll override the command
CMD ["php", "-a"]
