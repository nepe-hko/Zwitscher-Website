<html>
  <head>
    <title>Login</title>
  </head>
  <body>
  <?php
  require './database/database.php';
  $conn = createDatabaseConnection();

  // read variables
  $username = $_POST["in_username"]; 
  $password = md5($_POST["in_password"]);

  // check, if user exists
  $exist = false;
  $sql = "SELECT Username FROM users WHERE Username = '$username'";
  $usernamecheck = $conn->query($sql);

  if ($row = $usernamecheck->fetch()) {
      $exist = true;
  }
  else {
      $exist = false;
      header('Location: login.php?msg=wrong');
  }

  if ($exist) {
    // check password
    $sql = "SELECT * From users WHERE Username = '$username'";
    $passwordInDatabase = $conn->query($sql);
    $passwordInDatabase = $passwordInDatabase->fetch();

    if ($passwordInDatabase['Password'] == $password) {
      // login successful
      $userId = $passwordInDatabase['UserId'];
      $sql = "INSERT INTO sessions (UserId) VALUES ($userId)";
      $conn->query($sql);
      $sql = "SELECT SessionId FROM sessions WHERE UserId = $userId";
      $row = $conn->query($sql)->fetch();
        // set cookie and go to main
      setcookie("session", $row['SessionId']);
      header("Location: main.php");
    }
    // wrong password
    else {
      header('Location: login.php?msg=wrong');
    }
  }
  ?>
  </body>
</html>