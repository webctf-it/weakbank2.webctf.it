FROM alpine:latest

# copy crontabs for root user
COPY cronjobs /etc/crontabs/root
COPY script.sh /

# start crond with log level 8 in foreground, output to stderr
CMD ["crond", "-f", "-d", "8"]
