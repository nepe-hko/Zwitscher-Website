drop database if exists `db_zwitscher`;
create database `db_zwitscher`;

USE db_zwitscher;

CREATE TABLE Users(
  UserId INT NOT NULL AUTO_INCREMENT,
  Username VARCHAR(255) NOT NULL UNIQUE ,
  Password VARCHAR(255) NOT NULL ,
  PRIMARY KEY (UserId)
);

CREATE TABLE Tweets(
  TweetId INT NOT NULL AUTO_INCREMENT,
  Content VARCHAR(180),
  Date DATETIME NOT NULL ,
  UserId INT,

  PRIMARY KEY (TweetId),
  FOREIGN KEY (UserId) REFERENCES Users(UserId)
);
