#!/bin/sh

cd /var/www || exit

php artisan cache:clear
php artisan route:cache

php artisan migrate

/usr/bin/supervisord -c /etc/supervisord.conf