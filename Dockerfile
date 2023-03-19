FROM wordpress:latest as withlabels

ENV APACHE_DOCUMENT_ROOT=/home/site/wwwroot/
ENV APP_ROOT=/home/

LABEL org.opencontainers.inage="https://avatars.githubusercontent.com/u/117142615?s=200&v=4"
LABEL org.opencontainers.title="Restoring Pride"
LABEL org.opencontainers.vendor="Restoring Pride.org"
LABEL org.opencontainers.image.vendors="Restoring Pride.org, WordPress"
LABEL org.opencontainers.description="Restoring Pride is a non-profit organization that provides support to the LGBTQ+ community in the form of education, advocacy, and community outreach."
LABEL org.opencontainers.url="https://restoringpride.org"
LABEL org.opencontainers.authors="Restoring Pride"
LABEL org.opencontainers.licenses="MIT"
LABEL org.opencontainers.version="2.0.0"
LABEL org.restoringpride.project.git.url=${GITHUB_REPO_URL}
LABEL org.restoringpride.project.git.commit=${GITHUB_COMMIT}
LABEL org.opencontainers.image.created=${BUILD_DATE}
LABEL org.opencontainers.image.revision=${GITHUB_COMMIT}

FROM withlabels as witholdcontents

VOLUME /usr/src/
VOLUME ${APACHE_DOCUMENT_ROOT}
VOLUME ${APP_ROOT}

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
    echo "source /usr/local/etc/wp-cli/wp-completion.bash" >> ~/.bash_profile; \
    ln -s /usr/local/etc/wp-cli/wp-cli.phar /usr/local/bin/wp; 

SHELL ["/bin/bash", "-c"]
