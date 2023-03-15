FROM wordpress:latest as base

WORKDIR = "./files/httpdocs"

# copy different files into the image
RUN mkdir -p /home/site/wwwroot/wp-content/themes/
RUN mkdir -p /home/site/wwwroot/wp-content/plugins/
RUN mkdir -p /home/site/wwwroot/wp-content/uploads/
COPY ./wp-content/themes/** /home/site/wwwroot/wp-content/themes/
COPY ./wp-content/plugins/** /home/site/wwwroot/wp-content/plugins/
COPY ./wp-content/uploads/** /home/site/wwwroot/wp-content/uploads/

WORKDIR "."
COPY ./docker-compose.yml /home/docker-compose.yml

# nnstall the wordpresss CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar; \
	php wp-cli.phar --info; \
	chmod +x wp-cli.phar; \
	sudo mv wp-cli.phar /usr/local/bin/wp; \
	mkdir -p /home/wp-cli/; \
	curl https://raw.githubusercontent.com/wp-cli/wp-cli/main/utils/wp-completion.bash -o /usr/local/bin/wp/wp-completion.bash; \
	echo "source /usr/local/bin/wp/wp-completion.bash" >> ~/.bash_profile;
