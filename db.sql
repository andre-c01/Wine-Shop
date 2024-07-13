DROP DATABASE IF EXISTS wine_shop;
CREATE DATABASE wine_shop;
USE wine_shop;

CREATE TABLE users(
	id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(48) NOT NULL UNIQUE,
	email VARCHAR(255) NOT NULL,
	passwd VARCHAR(48) NOT NULL,
	token VARCHAR(255)
);

CREATE TABLE categories(
	id INT AUTO_INCREMENT PRIMARY KEY,
	category VARCHAR(48) NOT NULL UNIQUE
);

CREATE TABLE products(
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(48) NOT NULL,
	description VARCHAR(48) NOT NULL,
	quantity INT NOT NULL,
	price DECIMAL(20,2) NOT NULL,
	image VARCHAR(255) NOT NULL,
	category_id INT NOT NULL,

	CONSTRAINT `fk_prdoduct_categories`
	    	FOREIGN KEY (category_id) REFERENCES categories (id)
	    	ON DELETE CASCADE
	    	ON UPDATE RESTRICT
);

CREATE TABLE carts(
	id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT NOT NULL,
	product_id INT NOT NULL,
	quantity INT NOT NULL,

	CONSTRAINT `fk_carts_users`
	    	FOREIGN KEY (user_id) REFERENCES users (id)
	    	ON DELETE CASCADE
	    	ON UPDATE RESTRICT,

	CONSTRAINT `fk_carts_products`
	    	FOREIGN KEY (product_id) REFERENCES products (id)
	    	ON DELETE CASCADE
	    	ON UPDATE RESTRICT
);
