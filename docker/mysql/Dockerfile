FROM mysql:5.7

MAINTAINER 'Tim Jespers <tjespers@differentlab.com>'

ENV TZ Europe/Amsterdam

#set time + timezone to CEST
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime \
    && echo $TZ > /etc/timezone

