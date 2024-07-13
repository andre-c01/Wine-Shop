CREATE USER 'shoppy'@'localhost' IDENTIFIED BY 'System32';

GRANT INSERT, UPDATE, DELETE, SELECT, REFERENCES 
on wine_shop.* TO 'shoppy'@'localhost' WITH GRANT OPTION;
