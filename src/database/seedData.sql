USE db_zwitscher;

INSERT INTO users (UserId,Username,Password) VALUES (1,'zwitscher','zwitscher');
INSERT INTO users (UserId,Username,Password) VALUES(2,'dbane','dbane');

INSERT INTO tweets(UserId,Date,Content) VALUES(1,'2017-03-12','This is a very important tweet');
INSERT INTO tweets(UserId,Date,Content) VALUES(2,'2017-02-12','Hey there another tweet from me');
