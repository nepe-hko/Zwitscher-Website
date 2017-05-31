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
  $sql = "SELECT * FROM users WHERE Username = '$username'";
  $usernamecheck = $conn->query($sql);

  $row = $usernamecheck->fetch();
    // check password

  if ($row['Password'] == $password) {
    // login successful
    $userId = $row['UserId'];
    $sql = "INSERT INTO sessions (UserId) VALUES ($userId)";
    $conn->query($sql);
    $sql = "SELECT SessionId FROM sessions WHERE UserId = $userId";
    $row = $conn->query($sql)->fetch();
      // set cookie and go to main
    setcookie("session", $row['SessionId']);
    header("Location: main.php");
  }
  else {
      $exist = false;
      header('Location: login.php?msg=wrong');
  }
  ?>
  </body>
</html>
