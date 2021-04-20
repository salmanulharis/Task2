<?php
session_start();

if(isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['email']);
  header("location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.min.css">
  </head>
  <body>
    <div  class="container home">

      <?php if(isset($_SESSION['email'])): ?>

      <div>
        <h1>Hello User!</h1>
        <!-- count down counter -->
        <p id="time-appends">Our service will be ready in <span><label>00 : </label><label id="seconds-counter">10</label></span></p>
      </div>
      <div class="logout">
        <a href="index.php?logout='1'">Logout</a>
      </div>
      <!-- if user logs in, print his information -->
        <h3>Welcome <strong><?php echo $_SESSION['email']; ?></strong></h3>

      <?php endif ?>

      <!-- if user not logged in -->
      <?php

      if(!isset($_SESSION['email'])){
        $_SESSION['msg'] = "You must log in first to view this page";
        echo $_SESSION['msg'];
        // header("location: login.php"); //use if sudden redirect needed
        // to delay the redirection to login page
        header("Refresh:2; url=login.php");
      }

       ?>

    </div>

    <!-- javascripts programe for count down counter -->
    <script src="scripts.min.js"></script>

  </body>

</html>
