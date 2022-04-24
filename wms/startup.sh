#! /bin/bash

echo "--> Processing the startup.sh:"
cd /www;

echo "----> Composer setup and db migrations"
composer install;
php artisan migrate

echo "----> Loading Data"
php artisan data:load

echo "----> Starting to serve"
php artisan serve --host 0.0.0.0