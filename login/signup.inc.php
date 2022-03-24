<?php

include 'signup.classes.php';

 if (isset($_POST['signup-submit'])) {
   $uid = $_POST['uid'];
   $pwd = $_POST['pwd'];
   $pwd2 = $_POST['pwd2'];
   $signup = new signup($uid, $pwd, $pwd2);
   if ($signup->checkempty($uid, $pwd, $pwd2) == false) {
     header("Location: ../index.php?error=empty");
     exit();
   }
   elseif ($signup->pwdmatch($pwd, $pwd2) == false) {
     header("Location: ../index.php?error=pwdmatch");
     exit();
   }
   elseif ($signup->checkuser($uid) == false) {
     header("Location: ../index.php?error=uidtaken");
     exit();
   }
   else {
     $signup->signupuser($uid, $pwd);
     header("Location: ../index.php?signup=good");
     exit();
   }




 }
