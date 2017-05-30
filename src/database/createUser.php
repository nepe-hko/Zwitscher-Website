<?php
require 'database.php';

// read variables
$usernameRegister = "{$_POST["un"]}";
$passwordHashRegister = md5("{$_POST["pw"]}");
$passwordHashRegister2 = md5("{$_POST["pw2"]}");

// connect to database
$conn = createDatabaseConnection();

// check username availability 
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

// check, if passwords are the same
if ($passwordHashRegister != $passwordHashRegister2) {
    header('Location: ../signup.php?msg=password');
}

// insert into database
if ($available && ($passwordHashRegister == $passwordHashRegister2)) {
    $sql = "INSERT INTO users (Username, Password) VALUES ('$usernameRegister', '$passwordHashRegister')";
    $conn->query($sql);  
    echo "User erfolgreich angelegt <br>";
    echo "Du wirst weitergeleitet...";
    header('Location: ../login.php?msg=ok');
}
?>
