<?php
require 'database.php';
$conn = createDatabaseConnection();
$conn->query("INSERT INTO `users` (`Username`, `Password`) VALUES ('{$_POST["un"]}', '{$_POST["pw"]}')");

 ?>
 <!DOCTYPE HTML>
 <html>
 <head>
     <meta http-equiv="refresh" content="0; url=../main.php">
     <link rel="icon" href="./media/favicon.ico" type="image/vnd.microsoft.icon">
 </head>
     <body>
     </body>
 </html>
