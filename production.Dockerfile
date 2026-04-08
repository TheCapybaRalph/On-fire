ARG VERSION=php84

FROM laravelphp/vapor:php84

# System dependencies
RUN apk --update add \
    ffmpeg \
    postgresql-client \
    postgresql-dev \
    gmp gmp-dev \
    libzip-dev zip

# PHP extensions
RUN docker-php-ext-install \
    gmp \
    pdo_pgsql \
    pgsql \
    zip


COPY . /var/task
