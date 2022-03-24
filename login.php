<?php
require_once 'login/errors.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div id="login-form">
      <form action="login/login.inc.php" method="post">
        <label id="login-header">Login</label><br><br>
        <?php
          $error = new errors("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
          $error->empty();
          $error->checkuidlogin();
          $error->checkpwd();
         ?>
        <label>Username</label><br>
        <input type="text" name="login-uid" placeholder="Username..."><br>
        <label>Password</label><br>
        <input type="text" name="login-pwd" placeholder="Password..."><br>
        <button type="submit" name="login-submit">Submit</button>
      </form>
    </div>
  </body>
</html>
