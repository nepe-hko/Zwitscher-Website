<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="./media/favicon.ico" type="image/vnd.microsoft.icon">
        <title>Zwitscher | Anmeldung </title>
        <link rel="stylesheet" href="css/king.css" />
        <link rel="stylesheet" href="css/login.css" />
    </head>
    <body>
        <nav>
            <a href="./login.php">
                <img src="media/bird.png" />
            </a>
            <a href="login.php">FEEDBACK</a>
            <a href="login.php">IMPRESSUM</a>
            <a href="login.php">AGB</a>
        </nav>
        <main>
            <section class="login">
                <?php
                    // alerts "registrierung erfolgreich" and "password/username wrong"
                    if(isset($_REQUEST['msg']))
                    {
                        $action = $_REQUEST['msg'];
                        if($action == "ok")
                        {
                            ?>
                            <div class="alert">
                                Registrierung Erfolgreich. Du kannst dich jetzt Einloggen.
                            </div>
                            <?php
                        }
                        if($action == "wrong"){
                            ?>
                            <div class="alert">
                                Bitte überprüfe Benutzername und Passwort.
                            </div>
                            <?php
                        }
                        
                    }
                ?>
                <br>
                <h1>Willkommen auf Zwitscher!</h1>
                <a href="./login.php" >
                    <img src="media/bird.png" width="100" height="100" />
                </a>
                <form method="POST" action="./checkinformation.php" target="_self">
                    <label id="lbl_username">Benutzername:</label>
                    <input id="in_username" type="text" name="in_username">
                    <label id="lbl_password">Passwort: </label>
                    <input id="in_password" type="password" name="in_password">
                    <input id="btn_submit" name=submit type="submit" value="Anmelden">
                    <a href="404.html" id="a_forgotPassword">Passwort vergessen?</a>
                    <p id="p_register">
                        Kein Konto? <a href="signup.php">Registrieren</a>
                        Sie sich noch heute!
                    </p>
                </form>
            </section>
        </main>
    </body>
</html>