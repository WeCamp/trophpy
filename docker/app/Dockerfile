FROM ubuntu:16.04

MAINTAINER 'Tim Jespers <tjespers@differentlab.com>'

RUN apt-get clean \
	&& apt-get update \
	&& apt-get install locales \
	&& locale-gen nl_NL.UTF-8

ENV LANG nl_NL.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL nl_NL.UTF-8
ENV TZ Europe/Amsterdam

RUN apt-get update \
	&& apt-get install -y nginx zip unzip git software-properties-common supervisor curl sqlite3 \
	&& LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php \
	&& apt-get update \
	#Install PHP
	&& apt-get install -y php7.1-fpm php7.1-cli php7.1-mcrypt php7.1-gd php7.1-mysql \
	   php7.1-mbstring php7.1-xml php7.1-curl php7.1-xdebug php7.1-sqlite php7.1-pdosqlite \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && mkdir /run/php \
    #Perform cleanup
    && apt-get remove -y --purge software-properties-common curl \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && echo "daemon off;" >> /etc/nginx/nginx.conf \
    && ln -sf /dev/stdout /var/log/nginx/acces.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log \
    && ln -snf /usr/share/zoneinfo/$TZ /etc/localtime \
    && echo $TZ > /etc/timezone

COPY config/nginx.conf /etc/nginx/sites-available/default

COPY config/php-fpm.conf /etc/php/7.1/fpm/php-fpm.conf

EXPOSE 80

COPY config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

CMD ["/usr/bin/supervisord"]

RUN chown -R www-data: /var/www/html