<?php
require 'database.php';

// Read Variables
$usernameRegister = "{$_POST["un"]}";
$passwortHashRegister = md5("{$_POST["pw"]}");

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

// Insert Into Database
if ($available) {
    $sql = "INSERT INTO users (Username, Password) VALUES ('$usernameRegister', '$passwortHashRegister')";
    $conn->query($sql);  
    echo "User erfolgreich angelegt";
}
else {
    echo "Username ist schon vergeben";

    header("../sighnup.php");
}


/*


 
 <!DOCTYPE HTML>
 <html>
 <head>
     <meta http-equiv="refresh" content="0; url=../main.php">
     <link rel="icon" href="./media/favicon.ico" type="image/vnd.microsoft.icon">
 </head>
     <body>
     </body>
 </html>
 */


 ?>
