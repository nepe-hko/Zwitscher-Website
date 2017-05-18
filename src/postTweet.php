<?php
require './database/database.php';
$conn = createDatabaseConnection();
$conn->query("INSERT INTO tweets(UserId,Date,Content) VALUES(1,now(),'{$_POST["tweet"]}');")

 ?>
 <!DOCTYPE HTML>
 <html>
 <head>
     <meta http-equiv="refresh" content="0; url=./main.php">
     <link rel="icon" href="./media/favicon.ico" type="image/vnd.microsoft.icon">
 </head>
     <body>
     </body>
 </html>
