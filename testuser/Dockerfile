FROM debian:latest

MAINTAINER Lewis Brown "github.com/ramity"

RUN apt-get -y update && apt-get install -y openssh-client

WORKDIR ~

ENTRYPOINT ["tail", "-f", "/dev/null"]
