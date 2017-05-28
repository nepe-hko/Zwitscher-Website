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
        <a href="./login.html">
            <img src="media/bird.png" />
        </a>
        <a href="login.html">FEEDBACK</a>
        <a href="login.html">IMPRESSUM</a>
        <a href="login.html">AGB</a>
    </nav>

    <main>
        <section class="login">
            <h1>Willkommen auf Zwitscher!</h1>
            <a href="./login.html" >
                <img src="media/bird.png" width="100" height="100" />
            </a>

            <form action="./main.html" target="_self">
                <label id="lbl_username">Benutzername:</label>
                <input id="in_username" type="text" name="in_username">

                <label id="lbl_password">Passwort: </label>
                <input id="in_password" type="password" name="in_password">

                <input id="btn_submit" type="submit" value="Anmelden">

                <a href="404.html" id="a_forgotPassword">Passwort vergessen?</a>
                <p id="p_register">
                    Kein Konto? <a href="signup.php">Registrieren</a>
                    Sie sich noch heute!
                </p>
            </form>

            <?php
            require './database/database.php';
			$conn = createDatabaseConnection();

					session_start();
 
					if(isset($_GET['login'])) {
					 $username = $_POST['username'];
					 $password = $_POST['password'];
 
					 $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
					 $result = $statement->execute(array('username' => $username));
					 $user = $statement->fetch();
 
					 //Überprüfung des Passworts
					 if ($user !== false && password_verify($passwort, $user['passwort'])) {
						 $_SESSION['userid'] = $user['id'];
							die('Login erfolgreich. Weiter zur <a href="main.php">Hauptseite</a>');
							} else {
							$errorMessage = "Benutzername oder Passwort war ungültig";
					 }
						if(isset($errorMessage)) {
						 echo $errorMessage;
						}
					}
					?>

        </section>
    </main>

</body>
</html>