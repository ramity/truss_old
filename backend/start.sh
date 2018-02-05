#!/bin/sh

# If there is some public key in keys folder
# then it copies its contain in authorized_keys file
if [ "$(ls -A /git/keys/)" ]; then
  cat /git/keys/*.pub > ~/.ssh/authorized_keys
  chown -R .ssh
  chmod 700 .ssh
  chmod -R 600 .ssh/*
fi

# Checking permissions and fixing SGID bit in repos folder
# More info: https://github.com/jkarlosb/git-server-docker/issues/1
if [ "$(ls -A /git/repos/)" ]; then
  cd /git/repos
  chown -R $USER:$USER .
  chmod -R ug+rwX .
  find . -type d -exec chmod g+s '{}' +
fi

# -D flag avoids executing sshd as a daemon
/usr/sbin/sshd -D