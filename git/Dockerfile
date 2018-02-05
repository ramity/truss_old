FROM alpine:3.7

MAINTAINER Lewis Brown "github.com/ramity"

RUN apk add --no-cache \
    openssh \
    git

RUN ssh-keygen -A

WORKDIR /git-server/

RUN mkdir /git-server/keys \
  && adduser -D -s /usr/bin/git-shell git \
  && echo git:12345 | chpasswd \
  && mkdir /home/git/.ssh

COPY ../../git/commands /home/git/git-shell-commands
COPY ../../git/keys /git-server/keys

# sshd_config file is edited for enable access key and disable access password
COPY ./config/sshd_config /etc/ssh/sshd_config
COPY start.sh start.sh

EXPOSE 22

CMD ["sh", "start.sh"]