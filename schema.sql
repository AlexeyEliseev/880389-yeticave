CREATE DATABASE yeticave
 DEFAULT CHARACTER SET utf8
 DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE users (
	id		  INT AUTO_INCREMENT PRIMARY KEY,
	email     CHAR(128) NOT NULL UNIQUE,
	password  CHAR(64) NOT NULL UNIQUE
);

CREATE TABLE categories (
	id     INT AUTO_INCREMENT PRIMARY KEY,
	name   CHAR(128)
);

CREATE TABLE lots (
	id             INT AUTO_INCREMENT PRIMARY KEY, 
	name           CHAR(128),
	cost           INT,
	categorie_id   INT,
	FOREIGN KEY (categorie_id) REFERENCES categories(id)      
);