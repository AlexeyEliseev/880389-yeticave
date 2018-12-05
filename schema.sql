CREATE DATABASE yeticave
 DEFAULT CHARACTER SET utf8
 DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE users (
	id		  			INT AUTO_INCREMENT PRIMARY KEY,
	registrationdate	DATE,
	email     			CHAR(128) NOT NULL UNIQUE,
	password  			CHAR(64) NOT NULL,
	avatar				CHAR(128),
	info				CHAR(128),
);

CREATE TABLE categories (
	id     INT AUTO_INCREMENT PRIMARY KEY,
	name   CHAR(128)
);

CREATE TABLE lots (
	id             INT AUTO_INCREMENT PRIMARY KEY,
	createdate     DATE,
	lotname        CHAR(64),
	description    CHAR(128),
	image		   CHAR(128),
	cost           INT,
	enddate		   DATE,
	ratestep 	   INT,

	user_id 	   INT,
	winner_id	   INT,
	categorie_id   INT,
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (winner_id) REFERENCES users(id)
	FOREIGN KEY (categorie_id) REFERENCES categories(id)      
);

CREATE TABLE rates (
	id             INT AUTO_INCREMENT PRIMARY KEY,
	ratedate       DATE, 
	ratecost       INT,

	user_id   	   INT,
	lot_id		   INT,

	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (lot_id) REFERENCES lots(id)      
);