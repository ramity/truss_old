FROM debian:latest

MAINTAINER Lewis Brown "github.com/ramity"

RUN apt-get update
RUN apt-get install -y openssl openssh-server git zip unzip

WORKDIR ~

ENTRYPOINT ["tail", "-f", "/dev/null"]
