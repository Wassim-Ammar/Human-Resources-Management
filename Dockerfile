FROM php:8.1-fpm

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql 

RUN npm install

# COPY . .

# EXPOSE 9000

# # Start the PHP-FPM server
# CMD ["php-fpm"]
