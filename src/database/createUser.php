<?php
require 'database.php';

// Read Variables
$usernameRegister = "{$_POST["un"]}";
$passwortHashRegister = md5("{$_POST["pw"]}");
$passwortHashRegister2 = md5("{$_POST["pw2"]}");

// Connect to Database
$conn = createDatabaseConnection();

// Check Username availability 
$available = false;
$sql = "SELECT Username FROM users WHERE Username = '$usernameRegister'";
$usernamecheck = $conn->query($sql);

if ($row = $usernamecheck->fetch()) {
    $available = false;
}
else {
    $available = true;
}

if(!$available)
{
    header('Location: ../signup.php?msg=user');
}

// Check, if Passwords are the same
if ($passwortHashRegister != $passwortHashRegister2) {
    header('Location: ../signup.php?msg=password');
}


// Insert Into Database
if ($available && ($passwortHashRegister == $passwortHashRegister2)) {
    $sql = "INSERT INTO users (Username, Password) VALUES ('$usernameRegister', '$passwortHashRegister')";
    $conn->query($sql);  
    echo "User erfolgreich angelegt <br>";
    echo "Du wirst weitergeleitet...";
    header('Location: ../main.php');
}
 ?>
