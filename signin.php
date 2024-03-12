<?php
require 'config.php';

$status = ' ';

if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    if ($password == $row["password"]) {
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["username"] = $row["username"];
      header("location: index.php");
    } else {
      $status = 'Wrong username or password, try again';
    }
  } else {
    $status = 'User not found';
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/style.css?>=<?php echo time(); ?>" />
  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="login">
      <div class="overlay">
        <div class="profile">
          <span class="material-symbols-outlined"> person </span>
          <h2>sign in</h2>
        </div>
        <form class="form" method="post" autocomplete="off">
          <div class="user">
            <span class="material-symbols-outlined"> mail </span>
            <input type="text" name="email" placeholder="email" required />
          </div>
          <div class="pass">
            <span class="material-symbols-outlined"> lock </span>
            <input type="password" name="password" placeholder="password" required />
          </div>
          <div class="submit">
            <button type="submit" name="submit">login</button>
            <div class="signup">
              <p>Don't have an account?</p>
              <a href="signup.php">Sign up</a>
            </div>
          </div>
          <p class='status'>
            <?php echo $status ?>
          </p>
        </form>
      </div>
    </div>
  </div>
</body>

</html>