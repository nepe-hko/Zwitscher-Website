<html>
<head>
  <title>Login</title>
</head>
<body>
<?php

require './database/database.php';
$conn = createDatabaseConnection();

// Read Variables
$username = $_POST["in_username"]; 
$password = md5($_POST["in_password"]);

// Check, if User exists
$exist = false;
$sql = "SELECT Username FROM users WHERE Username = '$username'";
$usernamecheck = $conn->query($sql);

if ($row = $usernamecheck->fetch()) {
    $exist = true;
}
else {
    $exist = false;
    echo "User existiert nicht! <br>";
    echo "Du wirst weitergeleitet...!";
    header('Refresh: 3 ; login.php');

}

// Check Password
if ($exist) {
  $sql = "SELECT Password From users WHERE Username = '$username'";
  $passwordInDatabase = $conn->query($sql);
  $passwordInDatabase = $passwordInDatabase->fetch();

  if ($passwordInDatabase['Password'] == $password) {
    // Login Successful
    echo "Erfolgreich eingeloggt! <br>";
    echo "Du wirst weitergeleitet...";
    header('Refresh: 3 ; main.php');
  } else {
    // Wrong Password
    echo "Du hast ein falsches Passwort eingegeben! <br>";
    echo "Du wirst weitergeleitet...";
    header('Refresh: 3 ; login.php');
  }
  
}

?>
</body>
</html>