FROM php:7.4-cli

# Update packages
RUN apt-get update \
	&& apt-get install -y

# Download the mysql pdo extension
ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/
RUN chmod uga+x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions pdo_mysql

# Download composer
RUN cd /tmp
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
RUN  php -r "if (hash_file('sha384', 'composer-setup.php') === '795f976fe0ebd8b75f26a6dd68f78fd3453ce79f32ecb33e7fd087d39bfeb978342fb73ac986cd4f54edd0dc902601dc') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" ;
RUN  php composer-setup.php ;
RUN  php -r "unlink('composer-setup.php');" ;
RUN  cp composer.phar /usr/local/bin/composer ;


# Make sure the application starts on the right script
CMD ["sh", "-c", "./www/startup.sh"]