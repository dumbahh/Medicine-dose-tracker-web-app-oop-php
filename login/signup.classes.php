<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include '../db.php';



  class signup extends db {
    protected $uid;
    protected $pwd;
    protected $pwd2;
    protected $hashedpwd;





    public function __contruct($uid, $pwd, $pwd2) {
      $this->uid = $uid;
      $this->pwd = $pwd;
      $this->pwd2 = $pwd2;

    }

    public function pwdmatch($pwd, $pwd2) {
      $result;
      if ($pwd == $pwd2) {
        $result = true;
      }
      else {
        $result = false;
      }
      return $result;
    }
    public function checkuser($uid) {
      $result;
      $pdo = new db;
      $stmt = $pdo->conn()->prepare("SELECT uid FROM users WHERE uid = ?");
      $stmt->execute([$uid]);
      if($stmt->rowCount() > 0){
        $result = false;
    } else {
        $result = true;
    }
    return $result;
    }

    public function checkempty($uid, $pwd, $pwd2) {
      $result;
      if (empty($uid) || empty($pwd) || empty($pwd2)) {
        $result = false;
      }
      else {
        $result = true;
      }
      return $result;
    }

    public function signupuser($uid, $pwd) {
      $result;
      $hashedpwd;
      $pdo = new db;
      $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
      $stmt = $pdo->conn()->prepare("INSERT INTO users (uid, pwd) VALUES (?, ?)");
      $stmt->execute([$uid, $hashedpwd]);
      if (!$stmt->rowCount() > 0) {
        $result = false;
    }
    else {
      $result = true;
    }
    return $result;
    }
  }
