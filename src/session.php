<?php
require './database/database.php';
if(isset($_COOKIE["session"]))
{
    $conn = createDatabaseConnection();
    $sessionId = $_COOKIE["session"];
    $sql = "SELECT * FROM sessions WHERE SessionId = :sessionId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":sessionId",$sessionId);
     $stmt->execute();
     $row = $stmt->fetch();
    $conn = false;
    if(!$row)
    {
        unset($_COOKIE['session']);
        setcookie("session", "", time() -3600);

        header('Location:index.php');
    }
}
else
{
    header('Location:index.php');
}

?>
