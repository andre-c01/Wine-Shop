#!/usr/bin/bash

apt update

mariadb -e "ALTER USER 'root'@'localhost' IDENTIFIED VIA mysql_native_password"

mariadb -e "SET PASSWORD FOR 'root'@'localhost' = PASSWORD('System32')"

mariadb -u root -pSystem32 -e "DROP USER ''@'localhost'"

mariadb -u root -pSystem32 -e "DROP USER ''@'$(hostname)'"

mariadb -u root -pSystem32 -e "DROP DATABASE test"

mariadb -u root -pSystem32 -e "FLUSH PRIVILEGES"

mariadb -u root -pSystem32 -e "UNINSTALL COMPONENT 'file://component_validate_password'"

apt install phpmyadmin -y

mariadb -u root -pSystem32 -e "INSTALL COMPONENT 'file://component_validate_password'"

ln -s /usr/share/phpmyadmin /var/www/phpmyadmin

cp phpmyadmin.conf /etc/nginx/sites-available/phpmyadmin

ln -s /etc/nginx/sites-available/phpmyadmin /etc/nginx/sites-enabled/

systemctl reload nginx


