<!DOCTYPE HTML>
<html>
    <head>
        <?php

            require './database/database.php';
            if(isset($_COOKIE["session"]))
            {
                $conn = createDatabaseConnection();
                $sessionId = $_COOKIE["session"];
                $sql = "SELECT * FROM sessions WHERE SessionId = '$sessionId'";
                $row = $conn->query($sql)->fetch();
                $conn = false;
                if($row){
                    // logged in
                    echo "<meta http-equiv=\"refresh\" content=\"0; url=./main.php\">";
                }
            }
            else{
                // logged out
                echo "<meta http-equiv=\"refresh\" content=\"0; url=./login.php\">";
            }
                
        ?>
        <link rel="icon" href="./media/favicon.ico" type="image/vnd.microsoft.icon">
    </head>
    <body>
    </body>
</html>
