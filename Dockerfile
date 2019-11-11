# Origin image
FROM dockage/alpine-nginx-php-fpm:latest
RUN apk update && apk add php5-json
COPY ./src/* /var/www/
