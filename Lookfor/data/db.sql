use shareyourlife;
DROP TABLE IF EXISTS images;
DROP TABLE IF EXISTS users;
CREATE Table Users (
  id        INT NOT NULL AUTO_INCREMENT,
  username Varchar(64) not null,
  firstName VARCHAR(64)  NOT NULL,
  lastName  VARCHAR(64)  NOT NULL,
  email     VARCHAR(128) NOT NULL,
  password  VARCHAR(128)  NOT NULL,
  PRIMARY KEY  (id)
);

CREATE TABLE images(
  id 		int not null AUTO_INCREMENT,
  dateiname varchar(64) not null,
  userid 	int,
  tags 		longtext not null,
  pfad	varchar(64) not null,
  PRIMARY KEY (id),
  FOREIGN Key (userid) REFERENCES Users(id) on Delete CASCADE
);