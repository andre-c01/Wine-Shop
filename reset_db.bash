#!/usr/bin/bash

mariadb < ./db.sql
mariadb < ./db_data.sql
mariadb < ./db_user.sql