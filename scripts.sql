create database social;
	create table users(
		id int PRIMARY KEY AUTO_INCREMENT,
		name varchar(255),
		pseudo varchar(255) UNIQUE,
		email varchar(255) UNIQUE,
		 password varchar(255),
		 active enum('0', '1') DEFAULT '0',
		 date_de_creation datetime DEFAULT now(),
		 ville varchar(255),
		 pays varchar(255),
		 sexe enum('H', 'F'),
		 twittter varchar(255),
		 github varchar(255),
		 disponible_pour_emploi enum('0', '1') DEFAULT '0',
		 biographie text
		);


	create table code(
		id int(11) PRIMARY KEY AUTO_INCREMENT,
		code TEXT
		);
