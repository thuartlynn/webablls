#!/bin/bash

#============PARAMETER DEFINE================
WROKDIR=/web
#============ FUNCTION START ================
echo -e "\033[31m====================================\033[0m"
echo -e "\033[31m=   PHP FPM INITIAL START          =\033[0m"
echo -e "\033[31m====================================\033[0m"
echo -e "\033[32mCheck Vendor folder\033[0m"     
composer install 
if [ -f $WROKDIR/.env ]; then
echo -e "\033[32mCopy .env.example\033[0m"
rm -f $WROKDIR/.env     
fi
cp $WROKDIR/.env.example $WROKDIR/.env

php artisan key:generate
php artisan config:clear