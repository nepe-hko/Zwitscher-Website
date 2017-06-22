<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="./media/favicon.ico" type="image/vnd.microsoft.icon">
        <title> Zwitscher | Registrieren </title>
        <link rel="stylesheet" href="css/king.css" />
        <link rel="stylesheet" href="css/signup.css" />
        <script src="./javascript/validation.js" ></script>
    </head>
    <body>
        <?php
        include("navbar.php");
        ?>
        <main>
            <section class="signup">
                <h1>
                    Willkommen auf Zwitscher! Wir sind glücklich, dass DU da bist!!
                </h1>
                <?php
                    // alerts "passwörter stimmen nicht überein" und "benutzername vergeben"
                    if(isset($_REQUEST['msg'])){
                        $action = $_REQUEST['msg'];
                        if($action == "password"){
                            ?>
                            <div class="alert">
                                Die Passwörter stimmen nicht überein.
                            </div>
                            <?php
                        }
                        else if($action == "user"){
                            ?>
                            <div class="alert">
                                Der Benutzername ist bereits vergeben.
                            </div>
                            <?php
                        }
                    }
                ?>
                <form action="database/createUser.php" method="post">
                    <label>Benutzername</label>
                    <input type="text" name="un" id="in_username" onkeyup="validateSignup();"/>

                    <label>Password</label>
                    <input type="password" name="pw" id="in_password" onkeyup="validateSignup();"/>

                    <label>Passwort wiederholen</label>
                    <input type="password" name="pw2" id="in_passwordRepeat" onkeyup="validateSignup();"/>

                    <button type="submit" id="btn_signup" disabled="true" >
                        Registrieren
                    </button>

                    <p id="p_agb">
                        Durch deine Anmeldung auf Zwitscher geht deine Seele in den Besitz des Teufels über. Eine Zustimmung zu unseren <a href="404.html">AGBs</a> ist dadurch nicht mehr erforderlich.
                    </p>
                </form>
            </section>
        </main>
    </body>
</html>
