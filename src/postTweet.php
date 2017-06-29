<?php
require './database/database.php';
$conn = createDatabaseConnection();

$postJson = json_decode(file_get_contents('php://input'),true);
$sessionId = $_COOKIE["session"];
$sql = "SELECT UserId FROM sessions WHERE SessionId = :session";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":session",$sessionId);
$stmt->execute();
$userID = $stmt->fetch();
$userID = $userID['UserId'];
$stmt = $conn->prepare("INSERT INTO tweets(UserId,Date,Content) VALUES('$userID',now(),:tweetText);");
$stmt->bindParam(":tweetText",$postJson["tweet"]);
$stmt->execute();
header("Location: main.php");
 ?>
