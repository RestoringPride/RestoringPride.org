#syntax=docker/dockerfile:experimental
FROM wordpress:latest as base

# copy different files into the image
RUN mkdir -p /var/www/html/wp-content/uploads/
COPY ./wp-content/themes/** /var/www/html/wp-content/themes/
COPY ./wp-content/plugins/** /var/www/html/wp-content/plugins/
COPY ./wp-content/uploads/** /var/www/html/wp-content/uploads/
