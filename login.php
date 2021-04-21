<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Farro:wght@300;400;500;700&family=Lato:wght@300;400;700;900&family=Open+Sans:wght@300;400;600;700;800&family=Roboto:wght@100;300;500;700;900&display=swap" rel="stylesheet">
  </head>
  <body>
    <!-- if user not logged in -->
    <?php
    if(isset($_SESSION['msg'])){
      echo '<script>alert("You must log in first to view this page")</script>';
    }
     ?>

    <div class="container main">

      <div class="container inside">
        <!-- main heading and social media link with icon -->
        <div class="container part-1">
          <div class="login-heading"><h1>Login</h1></div>
          <div class="icons">
            <a id="facebook"><i class="fab fa-facebook-f"></i></a>
            <a id="twitter"><i class="fab fa-twitter"></i></a>
          </div>

          <!-- form to fill and submit the mail and password -->
          <form class="login-form" action="login.php" method="post" onsubmit="return ValidateEmail()">

            <p>or use your account</p>
            <div class="login-text">
              <input id="email" type="text" name="email" value="" placeholder="Email">
              <input id="password" type="password" name="password" value="" placeholder="Password">
            </div>
            <p>New User? <span><a href="registration.php" class="link register">Register</a></span></p>
            <!-- <input class="btn btn-pink" type="submit" name="login_user" value="Log in"> -->
            <button class="btn btn-pink" type="submit" name="login_user"> Log in </button>
          </form>

        </div>

        <div class="container part-2">
        </div>

      </div>
    </div>
    <script type="text/javascript">
      function ValidateEmail()
      {
      var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      if(email.value.match(mailformat))
      {
      return true;
      }
      else
      {
      alert("You have entered an invalid email address!");
      return false;
      }
      }


    </script>
  </body>
</html>
