FROM wordpress:latest as base

# CMD [ "/bin/bash", "-c" ]

# Install the PHP extensions we need
ADD ./wp-content/themes /home/site/wwwroot/wp-content/themes
ADD ./wp-content/plugins /home/site/wwwroot/wp-content/plugins
ADD ./wp-content/uploads /home/site/wwwroot/wp-content/uploads
COPY ./wp-config.php /home/site/wwwroot/wp-config.php
RUN type -p curl 2>/dev/null ||  apt install curl -y
RUN curl -fsSL https://cli.github.com/packages/githubcli-archive-keyring.gpg | dd of=/usr/share/keyrings/githubcli-archive-keyring.gpg \
	&& chmod go+r /usr/share/keyrings/githubcli-archive-keyring.gpg \
	&& echo "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/githubcli-archive-keyring.gpg] https://cli.github.com/packages stable main" | tee /etc/apt/sources.list.d/github-cli.list > /dev/null \
	&&  apt update \
	&&  apt install gh -y

# Install the PHP extensions we need
# RUN apt-get update && apt-get install -y \
# 	certbot \
# 	python3-certbot-nginx \
# 	openssh-server

# RUN rm -rf /home/site/wwwroot/
# RUN cp -r /var/www/html/ /home/site/wwwroot/
