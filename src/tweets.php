<?php
function outputTweet($username,$date, $content)
{
  echo "<article class='tweet'>";
  echo "<div class='tweet-header'>";
  echo "<img src='media/user.png' />";

  echo ("<p class='tweet-username'>{$username}</p>");
  echo ("<p class='tweet-date'>{$date}</p>");

  echo "</div> <div class='tweet-content'>";
  echo ("<p>{$content}</p>");
  echo "</div>";
  echo "</article>";
}

 ?>
