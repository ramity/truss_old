FROM debian:latest

MAINTAINER Lewis Brown "github.com/ramity"

RUN apt-get update
RUN apt-get install -y openssl
RUN apt-get install -y openssh-client
RUN apt-get install -y git
RUN apt-get install -y zip
RUN apt-get install -y unzip

WORKDIR ~

ENTRYPOINT ["tail", "-f", "/dev/null"]
