﻿<html>
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
  $sql = "SELECT * From users WHERE Username = '$username'";
  $passwordInDatabase = $conn->query($sql);
  $passwordInDatabase = $passwordInDatabase->fetch();

  if ($passwordInDatabase['Password'] == $password) {
    // Login Successful
    echo "Erfolgreich eingeloggt! <br>";
    $userId = $passwordInDatabase['UserId'];
    $sql = "INSERT INTO sessions (UserId) VALUES ($userId)";
    $conn->query($sql);
    $sql = "SELECT SessionId FROM sessions WHERE UserId = $userId";
    $row = $conn->query($sql)->fetch();

    // login
    //require 'session.php';
    setcookie("session", $row['SessionId']);

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