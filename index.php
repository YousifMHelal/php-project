<?php
require 'config.php';

$is_user = false;

if (isset($_SESSION["id"])) {
  $is_user = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/index.css" />

  <title>Home</title>
</head>

<body>
  <div class="wrapper">
    <div class="nav">
      <div class="logo">
        <img src="assets/hero.png" alt="logo" />
      </div>
      <ul>
        <li><a href="index.php">Home</a></li>
        <?php
        if (!$is_user) {
          echo "<li><a href='signin.php'>Survey</a></li>";
        } else {
          echo "<li><a href='survey.php'>Survey</a></li>";
        }
        ?>
        <li><a href="info.php">info</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
      <?php
      if (!$is_user) {
        echo "<a href='signin.php' class='signin'>sign in</a>";
      } else {
        echo "<a href='logout.php' class='signin'>logout</a>";
      }
      ?>
    </div>
    <div class="container">
      <div class="info">
        <h1>online survey</h1>
        <p>
          Bullying is a widespread issue that involves aggressive behavior aimed at harming others. It has detrimental
          effects on the health and safety of individuals, causing negative psychological and social consequences. Join
          the survey to contribute to finding effective solutions to this problem.
        </p>
        <?php
        if (!$is_user) {
          echo "<a href='signin.php'>Start your survey</a>";
        } else {
          echo "<a href='survey.php'>Start your survey</a>";
        }
        ?>
      </div>
      <div class="imgContainer">
        <img src="assets/bg.png" alt="background" />
      </div>
    </div>
  </div>
</body>

</html>