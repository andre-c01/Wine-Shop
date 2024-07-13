#!/usr/bin/bash

apt update

apt install nginx mariadb-server php-fpm php-pdo git nano curl php-mysql -y

systemctl enable nginx mariadb --now

cp wine_shop.conf /etc/nginx/sites-available/default

mariadb < ./db.sql
mariadb < ./db_user.sql
mariadb < ./db_data.sql

chmod -R 777 ./

mkdir -p /var/www/wine_shop/

cp -r ./* /var/www/wine_shop/

systemctl restart nginx mariadb



echo "done"