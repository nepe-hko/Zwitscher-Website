--DELETE FROM mysql.user WHERE User = 'zwitscher';
CREATE USER 'zwitscher'@'%' IDENTIFIED BY 'zwitscher';
GRANT ALL PRIVILEGES ON *.* TO 'zwitscher'@'%';
FLUSH PRIVILEGES ;
