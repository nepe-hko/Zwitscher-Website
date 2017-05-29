<?php
function createDatabaseConnection()
{

  $servername = "localhost";
  $username = "zwitscher";
  $password = "zwitscher";
  $dbname = "db_zwitscher";

  return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
}

?>
