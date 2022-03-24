<?php

class errors {
  protected $url;

  public function __construct($url) {
    $this->url = $url;
  }

  public function empty() {
    $key = "?error=empty";
    if (strpos($this->url, $key) == true) {
      echo "<h5 class=error>" . "Please fill in all of the form!" . "</h5>";
    }
    /*else {

    }*/
  }

  public function pwdmatch() {
    $key = "?error=pwdmatch";
    if (strpos($this->url, $key) == false) {

    }
    else {
      echo "<h5 class=error>" . "Passwords do not match." . "</h5>";
    }
  }

  public function checkuidsignup() {
    $key = "?error=uidtaken";
    if (strpos($this->url, $key) == false) {

    }
    else {
      echo "<h5 class=error>" . "Username is already taken." . "</h5>";
    }
  }

  public function signupsuccess() {
    $key = "?signup=good";
    if (strpos($this->url, $key) == false) {

    }
    else {
      echo "<h5 class=error>" . "Successfuly signed up!" . "</h5>";
    }
  }
 // login



  public function checkuidlogin() {
    $key = "?error=usernotfound";
    if (strpos($this->url, $key) == false) {

    }
    else {
      echo "<h5 class=error>" . "Username not found." . "</h5>";
    }
  }

  public function checkpwd() {
    $key = "?error=invalidpwd";
    if (strpos($this->url, $key) == false) {

    }
    else {
      echo "<h5 class=error>" . "Invalid password." . "</h5>";
    }
  }

  public function loginsuccess() {
    $key = "?login=success";
    $url = "localhost/mywww/project/medicine/home.php";
    if (strpos($url, $key) == false) {
      header("Location: login.php?error=dumbass");
      exit();
    }
    else {
      echo "<h5 class=error>" . "Successfuly Logged in!" . "</h5>";
    }
  }

  




}
