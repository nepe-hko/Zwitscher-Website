  <html>
  <head>
    <title>Login</title>
  </head>
  <body>
  <?php


	require './database/database.php';
	$conn = createDatabaseConnection();

    $users = $_POST["in_username"]; 
    $password = $_POST["in_password"];



	$okuser = $conn->query("SELECT Username FROM users WHERE Username = '".$_POST['in_username']."'");
	$okpassword = $conn->query("SELECT Password FROM users WHERE Password = '".md5($_POST['in_password'])."'");

    if ($users == $okuser && $password == $okpassword) {
      include "./main.php" ;
    } else {
      echo "Falsche Eingabe." ;
    }
  ?>
  </body>
  </html>