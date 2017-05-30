<?php
require './database/database.php';
$conn = createDatabaseConnection();

$sessionId = $_COOKIE["session"];
$sql = "SELECT UserId FROM sessions WHERE SessionId = '$sessionId'";
$userID = $conn->query($sql)->fetch();
$userID = $userID['UserId'];
$conn->query("INSERT INTO tweets(UserId,Date,Content) VALUES('$userID',now(),'{$_POST["tweet"]}');");
header("Location: main.php");
 ?>