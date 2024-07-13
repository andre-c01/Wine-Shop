DROP USER IF EXISTS shoppy@'localhost';
DROP USER IF EXISTS shoppyadmin@'localhost';

CREATE USER 'shoppy'@'localhost' IDENTIFIED BY 'System32';

GRANT INSERT, UPDATE, DELETE, SELECT, REFERENCES 
on wine_shop.* TO 'shoppy'@'localhost' WITH GRANT OPTION;

CREATE USER 'shoppyadmin'@'localhost' IDENTIFIED BY 'System32';

GRANT CREATE, ALTER, DROP, INSERT, UPDATE, DELETE, SELECT, REFERENCES
 on wine_shop.* TO 'shoppyadmin'@'localhost' WITH GRANT OPTION;
