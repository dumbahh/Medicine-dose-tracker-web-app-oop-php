<?php
include 'login/errors.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <br>
    <div id="signup-form">
    <form action="login/signup.inc.php" method="post">
      <?php
        $error = new errors("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        $error->empty();
        $error->pwdmatch();
        $error->checkuidsignup();
        $error->signupsuccess();
       ?>
      <label>Username</label><br>
      <input type="text" name="uid" placeholder="Username..."><br>
      <label>Password</label><br>
      <input type="text" name="pwd" placeholder="Password..."><br>
      <label>Repeat Password</label><br>
      <input type="text" name="pwd2" placeholder="Repeat..."><br><br>
      <button type="submit" name="signup-submit">Submit</button><br>
      <h5>Already have an account? <a href="login.php">Login!</a></h5>
    </form>

  </div>



    <?php

     ?>
  </body>
</html>
