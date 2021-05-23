# PHP version php:alpine

FROM php:7.3-fpm

LABEL description="Exchange test project"

# Arguments defined in docker-compose.yml
ARG user
ARG uid
ARG group

# Install system dependencies
RUN apt-get update && apt-get install -y \
    htop \
    wget \
    git \
    curl \
    vim \
    mc \
    gcc \
    zip \
    unzip


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user
