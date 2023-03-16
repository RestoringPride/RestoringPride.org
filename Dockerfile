FROM wordpress:latest as witholdcontents

ENV APACHE_DOCUMENT_ROOT /home/site/wwwroot/
ENV APP_ROOT /home/

# ADD ./files/httpdocs/wp-content/themes/ ${APACHE_DOCUMENT_ROOT}wp-content/themes/
# ADD ./files/httpdocs/wp-content/plugins/ ${APACHE_DOCUMENT_ROOT}wp-content/plugins/
# ADD ./files/httpdocs/wp-content/uploads/ ${APACHE_DOCUMENT_ROOT}wp-content/uploads/

ADD ./files/httpdocs/wp-content/themes/ /usr/src/themes/
ADD ./files/httpdocs/wp-content/plugins/ /usr/src/plugins/
ADD ./files/httpdocs/wp-content/uploads/ /usr/src/uploads/

# copy different files into the image
RUN mkdir -p ${APACHE_DOCUMENT_ROOT}wp-content/themes/
RUN mkdir -p ${APACHE_DOCUMENT_ROOT}wp-content/plugins/
RUN mkdir -p ${APACHE_DOCUMENT_ROOT}wp-content/uploads/
RUN cp -RL /usr/src/themes/ ${APACHE_DOCUMENT_ROOT}wp-content/
RUN cp -RL /usr/src/plugins/ ${APACHE_DOCUMENT_ROOT}wp-content/
RUN cp -RL /usr/src/uploads/ ${APACHE_DOCUMENT_ROOT}wp-content/

FROM witholdcontents as withdockercompose

COPY docker-compose.yml ${APP_ROOT}docker-compose.yml

FROM withdockercompose as withwpcli

# nnstall the wordpresss CLI
RUN mkdir -p ${APP_ROOT}wp-cli/; \
	curl https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar > ${APP_ROOT}wp-cli/wp-cli.phar; \
	php ${APP_ROOT}wp-cli/wp-cli.phar --info; \
	chmod +x ${APP_ROOT}wp-cli/wp-cli.phar; \
	mkdir -p /usr/local/etc/wp-cli/; \
	mv ${APP_ROOT}wp-cli/wp-cli.phar /usr/local/etc/wp-cli/; \
	curl https://raw.githubusercontent.com/wp-cli/wp-cli/main/utils/wp-completion.bash -o /usr/local/etc/wp-cli/wp-completion.bash; \
	echo "source /usr/local/etc/wp-cli/wp-completion.bash" >> ~/.bash_profile;
