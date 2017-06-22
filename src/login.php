<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="./media/favicon.ico" type="image/vnd.microsoft.icon">
        <title>Zwitscher | Anmeldung </title>
        <link rel="stylesheet" href="css/king.css" />
        <link rel="stylesheet" href="css/login.css" />
        <script src="./javascript/validation.js" ></script>
    </head>
    <body>
    <?php
        include("navbar.php");
    ?>

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
                    <input id="in_username" type="text" name="in_username" onkeyup="validateLogin();">

                    <label id="lbl_password">Passwort: </label>
                    <input id="in_password" type="password" name="in_password" onkeyup="validateLogin();">

                    <input id="btn_submit" disabled=true name=submit type="submit" value="Anmelden">

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
