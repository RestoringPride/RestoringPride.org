FROM wordpress:latest as base

ENV APACHE_DOCUMENT_ROOT /home/site/wwwroot/

# copy different files into the image
RUN mkdir -p ${APACHE_DOCUMENT_ROOT}wp-content/themes/
RUN mkdir -p ${APACHE_DOCUMENT_ROOT}wp-content/plugins/
RUN mkdir -p ${APACHE_DOCUMENT_ROOT}wp-content/uploads/
COPY ./files/httpdocs/wp-content/themes/** ${APACHE_DOCUMENT_ROOT}wp-content/themes/
COPY ./files/httpdocs/wp-content/plugins/** ${APACHE_DOCUMENT_ROOT}wp-content/plugins/
COPY ./files/httpdocs/wp-content/uploads/** ${APACHE_DOCUMENT_ROOT}wp-content/uploads/

COPY docker-compose.yml /home/docker-compose.yml

# nnstall the wordpresss CLI
RUN mkdir -p ${APACHE_DOCUMENT_ROOT}../../wp-cli/; \
	curl https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar > ${APACHE_DOCUMENT_ROOT}../../wp-cli/wp-cli.phar; \
	php ${APACHE_DOCUMENT_ROOT}../../wp-cli/wp-cli.phar --info; \
	chmod +x ${APACHE_DOCUMENT_ROOT}../../wp-cli/wp-cli.phar; \
	mkdir -p /usr/local/etc/wp-cli/; \
	mv ${APACHE_DOCUMENT_ROOT}../../wp-cli/wp-cli.phar /usr/local/etc/wp-cli/; \
	curl https://raw.githubusercontent.com/wp-cli/wp-cli/main/utils/wp-completion.bash -o /usr/local/etc/wp-cli/wp-completion.bash; \
	echo "source /usr/local/etc/wp-cli/wp-completion.bash" >> ~/.bash_profile;
