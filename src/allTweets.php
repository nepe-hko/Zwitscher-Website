<?php
require './database/database.php';
require './helper/date.php';
// write tweets on page

$startDate = urldecode($_REQUEST["start"]);

if(!validateDate($startDate))
  die("Invalid date parameter");

$conn = createDatabaseConnection();
$stmt = $conn->prepare("SELECT usr.Username,  tw.Date,  tw.Content FROM tweets tw JOIN users usr ON tw.UserId = usr.UserId WHERE tw.Date > :startDate ORDER BY tw.Date DESC;");
$stmt->bindParam(":startDate",$startDate);
$stmt->execute();

$tweets = array();

  foreach ($stmt as $row) {
    $tmpTweet = new \stdClass();
    $tmpTweet->User = $row["Username"];
    $tmpTweet->Date = $row["Date"];
    $tmpTweet->Content = $row["Content"];
    $tweets[] = $tmpTweet;
  }

echo (json_encode($tweets));

?>
