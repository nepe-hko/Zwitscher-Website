<?php
require './database/database.php';
$conn = createDatabaseConnection();

$sessionId = $_COOKIE["session"];
$sql = "SELECT UserId FROM sessions WHERE SessionId = ':session'";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":session",$sessionId);
$stmt->execute();
$userID = $stmt->fetch();
$userID = $userID['UserId'];
$stmt = $conn->prepare("INSERT INTO tweets(UserId,Date,Content) VALUES('$userID',now(),':tweetText');");
$stmt->bindParam(":tweetText",$_POST["tweet"]);
$stmt->execute();
header("Location: main.php");
 ?>
