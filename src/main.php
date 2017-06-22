<?php
    include "session.php";
    // logout
    if(isset($_REQUEST['action'])){
        $action = $_REQUEST['action'];
        if($action == "logout"){
            // delete cookie and go to index
            $conn = createDatabaseConnection();
            $sessionId = $_COOKIE["session"];
            $sql = "DELETE FROM sessions WHERE SessionId = '$sessionId'";
            $conn->query($sql);
            setcookie("session", "", time() -3600);
            header('Location: index.php');
        }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="icon" href="./media/favicon.ico" type="image/vnd.microsoft.icon">
        <title>Zwitscher</title>
        <link rel="stylesheet" href="css/king.css"/>
        <link rel="stylesheet" href="css/main.css"/>
        <script src="./javascript/validation.js" ></script>
        <script src="./javascript/main.js" ></script>
    </head>
    <body onload="startPolling()" onunload="stopPolling()">
        <nav>
            <a href="./main.php">
                <img src="media/bird.png" width="50" height="50" />
            </a>
            <a href="./main.php?action=logout" id="a_logout">Logout</a>
            <label id="lbl_loggedInUser">
                <?php
                    // write username in navbar
                    $conn = createDatabaseConnection();
                    $sql = "SELECT Username From users
                            WHERE UserID = (SELECT UserId FROM sessions WHERE SessionId = '$sessionId')";
                    $username = $conn->query($sql)->fetch();
                    echo "<b>";
                    echo $username['Username'];
                    echo "</b>";
                ?>
            </label>
        </nav>
        <main>
            <div class="input">
            <form id="form_tweet" action="postTweet.php" method="post">
                <textarea form="form_tweet" name="tweet" placeholder="Wie fühlst du dich heute? ..." onkeyup="validateTweet(this.value);"></textarea>
                <button disabled="true" id="btn_tweet" type="sumbit">Zwitscher</button>
            </form>
            </div>
            <section class="timeline" id="timeline">
                <!-- <?php
                // write tweets on page
                require './tweets.php';
                $conn = createDatabaseConnection();
                $stmt = $conn->query("SELECT usr.Username,  tw.Date,  tw.Content FROM tweets tw JOIN users usr ON tw.UserId = usr.UserId ORDER BY tw.Date DESC;");

                    // set the resulting array to associative
                    foreach ($stmt as $row) {
                    outputTweet($row["Username"],$row["Date"],$row["Content"]);
                    }

                ?> -->
            </section>
        </main>
    </body>
</html>
