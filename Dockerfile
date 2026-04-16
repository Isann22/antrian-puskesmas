# Stage 1: Build Node.js assets
FROM node:20-alpine AS node_build
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Stage 2: PHP Application
FROM php:8.4-fpm

LABEL maintainer="Puskesmas Digital"

# Arguments defined in docker-compose.yml
ARG user=test_app
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    nano \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql mbstring exif pcntl bcmath zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user \
    && mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

# Copy the application source code as root first
COPY . /var/www

# Copy compiled Vite assets from Stage 1
COPY --from=node_build /app/public/build /var/www/public/build

# Set permissions for the user
RUN chown -R $user:$user /var/www

USER $user

# Fix git safe directory warning
RUN git config --global --add safe.directory /var/www

# Install composer dependencies
RUN composer install --optimize-autoloader --no-interaction --no-dev

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
