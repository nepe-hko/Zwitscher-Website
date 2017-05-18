<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="./media/favicon.ico" type="image/vnd.microsoft.icon">
    <title>Zwitscher</title>
    <link rel="stylesheet" href="css/king.css"/>
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>
    <nav>
        <a href="./main.html">
            <img src="media/bird.png" width="50" height="50" />
        </a>
        <a href="./login.html" id="a_logout">Logout</a>

        <label id="lbl_loggedInUser">Hallo: Username</label>
    </nav>


    <main>
        <div class="input">
          <form action="postTweet.php" method="post">
            <input type="text" name="tweet" placeholder="Wie fühlst du dich heute? ..."></input>
            <button type="sumbit">Zwitscher</button>
          </form>
        </div>
        <section class="timeline">
            <?php
            require './database/database.php';
            $conn = createDatabaseConnection();
            $stmt = $conn->query("SELECT usr.Username,  tw.Date,  tw.Content FROM tweets tw JOIN users usr ON tw.UserId = usr.UserId;");

                // set the resulting array to associative
                foreach ($stmt as $row) {
                  echo "<article class='tweet'>";
                  echo "<div class='tweet-header'>";
                  echo "<img src='media/user.png' />";

                  echo ("<p>{$row["Username"]}</p>");
                  echo ("<p>{$row["Date"]}</p>");

                  echo "</div> <div class='tweet-content'>";
                  echo ("<p>{$row["Content"]}</p>");
                  echo "</div>";
                  echo "</article>";
                }

             ?>
        </section>
    </main>
</body>
</html>
