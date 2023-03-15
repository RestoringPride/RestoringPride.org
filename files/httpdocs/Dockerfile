#syntax=docker/dockerfile:experimental
FROM wordpress:latest as base

# copy different files into the image
RUN mkdir -p /home/site/wwwroot/wp-content/uploads/
COPY ./wp-content/themes/** /home/site/wwwroot/wp-content/themes/
COPY ./wp-content/plugins/** /home/site/wwwroot/wp-content/plugins/
COPY ./wp-content/uploads/** /home/site/wwwroot/wp-content/uploads/
