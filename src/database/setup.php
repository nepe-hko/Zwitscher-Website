<?php
$servername = "localhost";
$username = "zwitscher";
$password = "zwitscher";
$dbname = "db_zwitscher";
$setupDatabase = file_get_contents("./database/db_zwitscher.sql");

try {
        $dbh = new PDO("mysql:host=$servername", $username, $password);

        $dbh->exec($setupDatabase)
        or die(print_r($dbh->errorInfo(), true));

    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }

 ?>
