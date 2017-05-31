drop database if exists `db_zwitscher`;
create database `db_zwitscher` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE db_zwitscher;

CREATE TABLE Users(
  UserId INT NOT NULL AUTO_INCREMENT,
  Username VARCHAR(255) NOT NULL UNIQUE ,
  Password VARCHAR(255) NOT NULL ,
  PRIMARY KEY (UserId)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE Tweets(
  TweetId INT NOT NULL AUTO_INCREMENT,
  Content VARCHAR(180),
  Date DATETIME NOT NULL ,
  UserId INT,

  PRIMARY KEY (TweetId),
  FOREIGN KEY (UserId) REFERENCES Users(UserId)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE Sessions(
  SessionId char(36),
  UserId INT,

  PRIMARY KEY (SessionId),
  FOREIGN KEY (UserId) REFERENCES Users(UserId)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TRIGGER create_guid BEFORE INSERT ON Sessions
 FOR EACH ROW BEGIN
SET NEW.SessionId = UUID();
END;
