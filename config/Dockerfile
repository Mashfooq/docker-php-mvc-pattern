# FROM php:8.1-fpm-alpine

# WORKDIR /var/www/html

# COPY . /var/www/html

# EXPOSE 9000

# CMD ["php", "-S", "0.0.0.0:9000"]



FROM php:8.1-fpm-alpine

RUN apk --update add --no-cache postgresql-client postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql 

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php'); \
if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') \
{ echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL; \
system('php composer-setup.php --install-dir=/usr/local/bin --filename=composer'); \
unlink('composer-setup.php');"

WORKDIR /var/www/html

# COPY . /var/www/html

EXPOSE 9001

CMD ["php", "-S", "0.0.0.0:9001"]







# FROM alpine:3.17

# # Update package repository index


# # Install Nginx
# RUN apk --no-cache add nginx

# # Configure Nginx
# COPY nginx.conf /etc/nginx/conf.d/

# # Set up PHP-FPM
# COPY php-fpm.conf /usr/local/etc/php-fpm.d/

# WORKDIR /var/www/html

# COPY . /var/www/html

# EXPOSE 80

# CMD ["sh", "-c", "nginx -g 'daemon off;' & php-fpm"]
