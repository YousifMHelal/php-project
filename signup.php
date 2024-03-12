<?php
require 'config.php';
$status = '';
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $duplicate = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
  if (mysqli_num_rows($duplicate) > 0) {
    $status = 'This email is already exist';
  } else if (strlen($password) < 6) {
    $status = 'your password is too short';
  } else {
    $query = "INSERT INTO users VALUES ('', '$username', '$email', '$password')";
    mysqli_query($con, $query);
    header("location: signin.php");
  }
}
;

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
  <title>Sign Up</title>
</head>

<body>
  <div class="container">
    <div class="login">
      <div class="overlay">
        <div class="profile">
          <span class="material-symbols-outlined"> person </span>
          <h2>sign Up</h2>
        </div>
        <form class="form" method="post" autocomplete="off">
          <div class="name">
            <span class="material-symbols-outlined"> person </span>
            <input type="text" name="username" placeholder="Username" required />
          </div>
          <div class="user">
            <span class="material-symbols-outlined"> email </span>
            <input type="text" name="email" placeholder="Email" required />
          </div>
          <div class="pass">
            <span class="material-symbols-outlined"> lock </span>
            <input type="password" name="password" placeholder="password" required />
          </div>
          <div class="submit">
            <button type="submit" name="submit">Submit</button>
            <div class="signup">
              <p>Already have an account?</p>
              <a href="signin.php">Sign in</a>
            </div>
          </div>

          <p class='status' style="color:red; font-size:14px; margin-top: 10px;">
            <?php echo $status ?>
          </p>
        </form>
      </div>
    </div>
  </div>
</body>

</html>