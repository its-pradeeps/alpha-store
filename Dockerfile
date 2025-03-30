# Use the official PHP image with Apache
FROM php:7.4-apache

# Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copy project files to the container
COPY ./src /var/www/html

# Set proper permissions
RUN chown -R 777 /var/www/html

# Enable Apache mod_rewrite for pretty URLs
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80
