<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="./media/favicon.ico" type="image/vnd.microsoft.icon">
    <title>Zwitscher</title>
    <link rel="stylesheet" href="css/king.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <script src="./validation.js" ></script>

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
            <input type="text" name="tweet" placeholder="Wie fühlst du dich heute? ..." onkeyup="validateTweet(this.value);" />
            <button disabled="true" id="btn_tweet" type="sumbit">Zwitscher</button>
          </form>
        </div>
        <section class="timeline">
            <?php
            require './database/database.php';
            require './tweets.php';
            $conn = createDatabaseConnection();
            $stmt = $conn->query("SELECT usr.Username,  tw.Date,  tw.Content FROM tweets tw JOIN users usr ON tw.UserId = usr.UserId ORDER BY tw.Date DESC;");

                // set the resulting array to associative
                foreach ($stmt as $row) {
                  outputTweet($row["Username"],$row["Date"],$row["Content"]);
                }

             ?>
        </section>
    </main>
</body>
</html>
