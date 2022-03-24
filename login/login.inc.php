<?php

include 'login.classes.php';

if (isset($_POST['login-submit'])) {
  $uid = $_POST['login-uid'];
  $pwd = $_POST['login-pwd'];
  $login = new login($uid, $pwd);
  if ($login->checkempty($uid, $pwd) == false) {
    header("Location: ../login.php?error=empty");
    exit();
  }
  elseif ($login->checkuser($uid) == false) {
    header("Location: ../login.php?error=usernotfound");
    exit();
  }
  elseif ($login->checkpwd($uid, $pwd) == false) {
    header("Location: ../login.php?error=invalidpwd");
    exit();
  }

  else {
    $login->login($uid);
  }
}
