CREATE TABLE class(
	Id int AUTO_INCREMENT,
	className VARCHAR(30) NOT NULL,
	PRIMARY KEY (Id)	
);
INSERT INTO priston.class values (1,"fighter");
INSERT INTO priston.class values (2,"mechanician");
INSERT INTO priston.class values (3,"archer");
INSERT INTO priston.class values (4,"pikeman");
INSERT INTO priston.class values (5,"atalanta");
INSERT INTO priston.class values (6,"knight");
INSERT INTO priston.class values (7,"magician");
INSERT INTO priston.class values (8,"priestess");

CREATE TABLE rank(
	Id int AUTO_INCREMENT,
	charName VARCHAR(30) NOT NULL,
	charLevel int,
	Id_class int,	
	PRIMARY KEY (Id),
	CONSTRAINT fk_IdClass FOREIGN KEY (Id_class)
	REFERENCES class(Id)
);
