<?php
session_start();
include '../db.php';
class login extends db {
  protected $uid;
  protected $pwd;

  function __contruct($uid, $pwd) {
    $this->uid = $uid;
    $this->pwd = $pwd;
  }

  public function checkuser($uid) {
    $result;
    $pdo = new db;
    $stmt = $pdo->conn()->prepare("SELECT uid FROM users WHERE uid = ?");
    $stmt->execute([$uid]);
    if(!$stmt->rowCount() > 0){
      $result = false;
  } else {
      $result = true;
  }
  return $result;
  }

  public function checkpwd($uid, $pwd) {
    $result;
    $pdo = new db;
    $select = "SELECT * FROM users WHERE uid=?";
    $stmt = $pdo->conn()->prepare($select);
    $stmt->execute(array($uid));
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!password_verify($pwd, $res['pwd'])) {
      $result = false;
    }
    else {
      $result = true;
    }
    return $result;
  }

  public function checkempty($uid, $pwd) {
    $result;
    if (empty($uid) || empty($pwd)) {
      $result = false;
    }
    else {
      $result = true;
    }
    return $result;
  }

  public function login($uid) {
    header("Location: ../home.php?login=success");
    $_SESSION['uid'] = $uid;
    exit();
  }


}
