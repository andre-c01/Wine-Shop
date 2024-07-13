#!/usr/bin/bash

apt update

apt install phpmyadmin -y

mariadb -e "UPDATE mariadb.user SET Password = PASSWORD('CHANGEME') WHERE User = 'root'"

mariadb -e "DROP USER ''@'localhost'"

mariadb -e "DROP USER ''@'$(hostname)'"

mariadb -e "DROP DATABASE test"

mariadb -e "FLUSH PRIVILEGES"




# copy nginx conf


