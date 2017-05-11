<!DOCTYPE html>
<html>
<body>
  <?php
 echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Id</th><th>Username</th><th>Password</th></tr>";

 class TableRows extends RecursiveIteratorIterator {
     function __construct($it) {
         parent::__construct($it, self::LEAVES_ONLY);
     }

     function current() {
         return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
     }

     function beginChildren() {
         echo "<tr>";
     }

     function endChildren() {
         echo "</tr>" . "\n";
     }
 }

 $servername = "localhost";
 $username = "zwitscher";
 $password = "zwitscher";
 $dbname = "db_zwitscher";

 try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT UserId,Username, Password FROM Users");
     $stmt->execute();

     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
         echo $v;
     }
 }
 catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
 }
 echo "</table>";

 echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>TweetId</th><th>Date</th><th>UserId</th><th>Content</th></tr>";

 try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT TweetId,Date,UserId,Content FROM Tweets");
     $stmt->execute();

     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
         echo $v;
     }
 }
 catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
 }
 echo "</table>";

 ?>

</body>
</html>
