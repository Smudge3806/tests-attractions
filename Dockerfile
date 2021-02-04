FROM php:latest
LABEL maintainer="Chris Smith <smudge3806@live.co.uk>"

COPY ./src /app
WORKDIR /app

ENTRYPOINT [ "vendor/bin/phpunit" ]
