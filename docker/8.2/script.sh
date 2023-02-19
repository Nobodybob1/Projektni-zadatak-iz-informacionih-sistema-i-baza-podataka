#!/bin/bash

/usr/bin/php -d variables_order=EGPCS /var/www/html/artisan serve --host=0.0.0.0 --port=80 &

sleep 5


/usr/bin/php /var/www/html/artisan migrate:fresh
/usr/bin/php -d variables_order=EGPCS /var/www/html/artisan db:seed --verbose > output.txt