<?php
require 'database.php';

// Read Variables
$usernameRegister = "{$_POST["un"]}";
$passwordHashRegister = md5("{$_POST["pw"]}");
$passwordHashRegister2 = md5("{$_POST["pw2"]}");

// Connect to Database
$conn = createDatabaseConnection();

// Check Username availability 
$available = false;
$sql = "SELECT Username FROM users WHERE Username = '$usernameRegister'";
$usernamecheck = $conn->query($sql);

if ($usernamecheck->fetch()) {
    $available = false;
    header('Location: ../signup.php?msg=user');
    exit;
}
else {
    $available = true;
}

// Check, if Passwords are the same
if ($passwordHashRegister != $passwordHashRegister2) {
    header('Location: ../signup.php?msg=password');
}

// Insert Into Database
if ($available && ($passwordHashRegister == $passwordHashRegister2)) {
    $sql = "INSERT INTO users (Username, Password) VALUES ('$usernameRegister', '$passwordHashRegister')";
    $conn->query($sql);  
    echo "User erfolgreich angelegt <br>";
    echo "Du wirst weitergeleitet...";
    header('Location: ../login.php?msg=ok');
}
 ?>
