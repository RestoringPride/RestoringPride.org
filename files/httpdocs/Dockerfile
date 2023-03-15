FROM wordpress:latest as base

# CMD [ "/bin/bash", "-c" ]

# Install the PHP extensions we need
ADD ./wp-content/themes /home/site/wwwroot/wp-content/themes
ADD ./wp-content/plugins /home/site/wwwroot/wp-content/plugins
ADD ./wp-content/uploads /home/site/wwwroot/wp-content/uploads
COPY ./wp-config.php /home/site/wwwroot/wp-config.php

# Install the PHP extensions we need
RUN apt-get update && apt-get install -y \
	certbot \
	python3-certbot-nginx \
	openssh-server



# RUN rm -rf /home/site/wwwroot/
# RUN cp -r /var/www/html/ /home/site/wwwroot/
